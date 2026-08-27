<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BuyerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.buyer.login');
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
                    'user_type' => 'buyer',
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
            ->withErrors([
                'email' => 'Invalid buyer email or password.',
            ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('buyer.login');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirectUrl(url('/buyer/google/callback'))->redirect();
    }

    /**
     * Handle Google callback.
     */
    public function handleGoogleCallback()
    {
        try {

            $googleUser = Socialite::driver('google')->redirectUrl(url('/buyer/google/callback'))->user();
            // Find buyer using Google ID
            $user = User::where('google_id', $googleUser->getId())->where('user_type', 'buyer')->first();
            // If Google ID doesn't exist, check email
            if (!$user) {
                $user = User::where('email', $googleUser->getEmail())->where('user_type', 'buyer')->first();
            }
            /*
            |--------------------------------------------------------------------------
            | Existing Buyer
            |--------------------------------------------------------------------------
            */
            if ($user) {
                // Check account status
                if ((int) $user->status !== 1) {
                    return redirect()->route('buyer.login')->withErrors(['email' => 'Your buyer account is inactive.',]);
                }
                // Update Google information
                $user->update(['google_id' => $googleUser->getId(),'email_verified_at' => $user->email_verified_at ?? now(),]);
            }
            /*
            |--------------------------------------------------------------------------
            | New Buyer
            |--------------------------------------------------------------------------
            */
            else {
                $user = User::create([
                    'name' => $googleUser->getName() ?: 'Google Buyer',
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'user_type' => 'buyer',
                    'status' => 1,
                    'password' => Hash::make(Str::random(40)),
                    'email_verified_at' => now(),
                ]);
                // Assign Spatie buyer role
                $user->assignRole('buyer');
            }
            /*
            |--------------------------------------------------------------------------
            | Login Buyer
            |--------------------------------------------------------------------------
            */
            Auth::login($user, true);
            request()->session()->regenerate();
            return redirect()->route('dashboard');
        } catch (\Throwable $e) {
            report($e);
            return redirect()->route('buyer.login')->withErrors(['email' => 'Unable to login with Google. Please try again.',]);
        }
    }
}