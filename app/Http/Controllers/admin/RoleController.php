<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')
            ->where('guard_name', 'web')
            ->latest()
            ->paginate(10);

        return view(
            'admin.roles.index',
            compact('roles')
        );
    }

    public function create()
    {
        $permissions = Permission::where(
            'guard_name',
            'web'
        )
        ->orderBy('name')
        ->get();

        return view(
            'admin.roles.create',
            compact('permissions')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:100',
                'unique:roles,name',
            ],

            'permissions' => [
                'nullable',
                'array',
            ],

            'permissions.*' => [
                'exists:permissions,id',
            ],
        ]);

        $role = Role::create([
            'name' => $validated['name'],
            'guard_name' => 'web',
        ]);

        if (!empty($validated['permissions'])) {

            $permissions = Permission::whereIn(
                'id',
                $validated['permissions']
            )->get();

            $role->syncPermissions($permissions);
        }

        return redirect()
            ->route('roles.index')
            ->with(
                'success',
                'Role created successfully.'
            );
    }

    public function show(Role $role)
    {
        $role->load('permissions');

        return view(
            'admin.roles.show',
            compact('role')
        );
    }

    public function edit(Role $role)
    {
        $permissions = Permission::where(
            'guard_name',
            'web'
        )
        ->orderBy('name')
        ->get();

        $role->load('permissions');

        return view(
            'admin.roles.edit',
            compact(
                'role',
                'permissions'
            )
        );
    }

    public function update(
        Request $request,
        Role $role
    ) {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:100',
                'unique:roles,name,' . $role->id,
            ],

            'permissions' => [
                'nullable',
                'array',
            ],

            'permissions.*' => [
                'exists:permissions,id',
            ],
        ]);

        $role->update([
            'name' => $validated['name'],
        ]);

        $permissions = Permission::whereIn(
            'id',
            $validated['permissions'] ?? []
        )->get();

        $role->syncPermissions($permissions);

        return redirect()
            ->route('roles.index')
            ->with(
                'success',
                'Role updated successfully.'
            );
    }

    public function destroy(Role $role)
    {
        /*
        |--------------------------------------------------------------------------
        | Prevent deleting system roles
        |--------------------------------------------------------------------------
        */

        if (
            in_array(
                $role->name,
                [
                    'super-admin',
                    'admin',
                    'agent',
                    'buyer',
                    'seller',
                ]
            )
        ) {
            return back()->with(
                'error',
                'System roles cannot be deleted.'
            );
        }

        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with(
                'success',
                'Role deleted successfully.'
            );
    }
}