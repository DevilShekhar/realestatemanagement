<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SellerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.seller.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember = $request->boolean('remember');
        if (
            Auth::attempt(
                [
                    'email' => $credentials['email'],
                    'password' => $credentials['password'],
                    'user_type' => 'seller',
                    'status' => 1,
                ],
                $remember
            )
        ) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Invalid seller email or password.',]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('seller.login');
    }
     /**
     * Redirect seller to Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirectUrl(url('/seller/google/callback'))->redirect();
    }

    /**
     * Handle Google callback.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->redirectUrl(url('/seller/google/callback'))->user();
            /*
            |--------------------------------------------------------------------------
            | Find Seller By Google ID
            |--------------------------------------------------------------------------
            */
            $user = User::where('google_id', $googleUser->getId())->where('user_type', 'seller')->first();
            /*
            |--------------------------------------------------------------------------
            | If Google ID Doesn't Exist, Check Email
            |--------------------------------------------------------------------------
            */
            if (!$user) {
                $user = User::where('email', $googleUser->getEmail())->where('user_type', 'seller')->first();
            }
            /*
            |--------------------------------------------------------------------------
            | Existing Seller
            |--------------------------------------------------------------------------
            */
            if ($user) {
                if ((int) $user->status !== 1) {
                    return redirect()
                        ->route('seller.login')
                        ->withErrors(['email' => 'Your seller account is inactive.',]);
                }
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => $user->email_verified_at ?? now(),
                ]);
            }
            /*
            |--------------------------------------------------------------------------
            | New Seller
            |--------------------------------------------------------------------------
            */
            else {
                $user = User::create([
                    'name' => $googleUser->getName() ?: 'Google Seller',
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'user_type' => 'seller',
                    'status' => 1,
                    'password' => Hash::make(Str::random(40)),
                    'email_verified_at' => now(),
                ]);
                // Spatie seller role
                $user->assignRole('seller');
            }

            /*
            |--------------------------------------------------------------------------
            | Login Seller
            |--------------------------------------------------------------------------
            */

            Auth::login($user, true);
            request()->session()->regenerate();
            return redirect()->route('dashboard');
        } catch (\Throwable $e) {
            report($e);
            return redirect()->route('seller.login')->withErrors(['email' => 'Unable to login with Google. Please try again.',]);
        }
    }
}