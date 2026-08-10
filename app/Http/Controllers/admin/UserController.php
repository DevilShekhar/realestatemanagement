<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->latest()->paginate(20);
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::where('guard_name','web')->get();
        return view('admin.users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|string|max:20|unique:users,mobile',
            'gender' => 'nullable|string|max:30',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'pincode' => 'nullable|string|max:10',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|exists:roles,name',
        ]);

        $profilePhoto = null;

        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo')
                ->store('profile-photos', 'public');
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'],
            'gender' => $validated['gender'] ?? null,
            'birth_date' => $validated['birth_date'] ?? null,
            'address' => $validated['address'] ?? null,
            'city' => $validated['city'] ?? null,
            'state' => $validated['state'] ?? null,
            'pincode' => $validated['pincode'] ?? null,
            'profile_photo' => $profilePhoto,
            'status' => $validated['status'],
            'password' => Hash::make($validated['password']),
        ]);
        $user->assignRole($validated['role']);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::where('guard_name','web')->get();
        $user->load('roles');
        return view('admin.users.edit',compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $user->id,
            ],
            'mobile' => [
                'required',
                'string',
                'max:20',
                'unique:users,mobile,' . $user->id,
            ],
            'gender' => 'nullable|string|max:30',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'pincode' => 'nullable|string|max:10',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
            'password' => 'nullable|confirmed|min:8',
            'role' => 'required|exists:roles,name',
        ]);
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'],
            'gender' => $validated['gender'] ?? null,
            'birth_date' => $validated['birth_date'] ?? null,
            'address' => $validated['address'] ?? null,
            'city' => $validated['city'] ?? null,
            'state' => $validated['state'] ?? null,
            'pincode' => $validated['pincode'] ?? null,
            'status' => $validated['status'],
        ]);
        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo')
                ->store('profile-photos', 'public');
            $user->update([
                'profile_photo' => $profilePhoto,
            ]);
        }
        if (!empty($validated['password'])) {
            $user->update([
                'password' => Hash::make($validated['password']),
            ]);
        }
        $user->syncRoles([
            $validated['role'],
        ]);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        /*
        |--------------------------------------------------------------------------
        | Prevent deleting Super Admin
        |--------------------------------------------------------------------------
        */
        if ($user->hasRole('super-admin')) {
            return back()->with(
                'error',
                'Super Admin cannot be deleted.'
            );
        }
        $user->delete();
        return back()->with('success','User deleted successfully.');
    }
}