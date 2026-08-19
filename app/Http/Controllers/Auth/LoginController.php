<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     */
    protected $redirectTo = '/dashboard';

    /**
     * Allowed roles for default login.
     */
    protected $allowedRoles = [
        'super-admin',
        'admin',
        'agent',
    ];

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Handle login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Attempt Login
        |--------------------------------------------------------------------------
        */

        if (Auth::attempt(
            ['email' => $credentials['email'],'password' => $credentials['password'],'status' => 1,],$request->boolean('remember'))) 
            {
            $user = Auth::user();
            /*
            |--------------------------------------------------------------------------
            | Check User Role
            |--------------------------------------------------------------------------
            */
            if (! $user->hasAnyRole($this->allowedRoles)) {
                Auth::logout();
                return back()
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => 'You are not authorized to login from this page.',
                    ]);
            }
            /*
            |--------------------------------------------------------------------------
            | Regenerate Session
            |--------------------------------------------------------------------------
            */
            $request->session()->regenerate();
            return redirect()->intended($this->redirectTo);
        }

        /*
        |--------------------------------------------------------------------------
        | Invalid Credentials
        |--------------------------------------------------------------------------
        */
        return back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'The provided email or password is incorrect.',
            ]);
    }
}