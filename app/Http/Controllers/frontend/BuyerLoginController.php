<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}