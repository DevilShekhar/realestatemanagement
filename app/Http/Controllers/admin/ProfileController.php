<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show logged-in user's profile
     */
    public function index()
    {
        $user = Auth::user();

        return view('admin.profile.index', compact('user'));
    }

    /**
     * Update logged-in user's profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string|max:30',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'pincode' => 'nullable|string|max:10',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Profile Photo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            // Delete old profile photo
            if (
                $user->profile_photo &&
                Storage::disk('public')->exists($user->profile_photo)
            ) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Store new photo in SAME path as UserController
            $profilePhoto = $request->file('profile_photo')
                ->store('profile-photos', 'public');

            $user->profile_photo = $profilePhoto;
        }

        /*
        |--------------------------------------------------------------------------
        | Update Only Editable Fields
        |--------------------------------------------------------------------------
        */

        $user->name = $validated['name'];
        $user->gender = $validated['gender'] ?? null;
        $user->birth_date = $validated['birth_date'] ?? null;
        $user->address = $validated['address'] ?? null;
        $user->city = $validated['city'] ?? null;
        $user->state = $validated['state'] ?? null;
        $user->pincode = $validated['pincode'] ?? null;

        $user->save();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profile updated successfully.');
    }
}