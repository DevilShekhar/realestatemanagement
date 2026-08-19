<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SellerRegistrationController extends Controller
{
    /**
     * Show seller registration page.
     */
    public function create()
    {
        return view('frontend.seller.register');
    }

    /**
     * Store seller registration.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',

                // Email must be unique only among sellers.
                Rule::unique('users', 'email')
                    ->where(function ($query) {
                        return $query->where('user_type', 'seller');
                    }),
            ],

            'mobile' => [
                'required',
                'string',
                'max:20',
                'unique:users,mobile',
            ],

            'gender' => [
                'required',
                'string',
                'max:30',
            ],

            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ], [
            'email.unique' => 'This email is already registered as a seller.',
            'mobile.unique' => 'This mobile number is already registered.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'user_type' => 'seller',
            'mobile' => $validated['mobile'],
            'gender' => $validated['gender'],
            'status' => 1,
            'password' => Hash::make($validated['password']),
        ]);

        // Assign Seller role
        $user->assignRole('seller');

        return redirect()
            ->route('seller.login')
            ->with(
                'success',
                'Seller registration completed successfully. Please login.'
            );
    }
}