<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'unique:users,email',
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
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'],
            'gender' => $validated['gender'],
            'status' => 1,
            'password' => Hash::make($validated['password']),
        ]);

        // Assign Seller role
        $user->assignRole('seller');

        return redirect()
            ->route('seller.register')
            ->with('success', 'Seller registration completed successfully.');
    }
}