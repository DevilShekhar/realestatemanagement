<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::where(
            'guard_name',
            'web'
        )
        ->orderBy('name')
        ->paginate(20);

        return view(
            'admin.permissions.index',
            compact('permissions')
        );
    }

    public function create()
    {
        return view(
            'admin.permissions.create'
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:100',
                'unique:permissions,name',
            ],
        ]);

        Permission::create([
            'name' => $validated['name'],
            'guard_name' => 'web',
        ]);

        return redirect()
            ->route('admin.permissions.index')
            ->with(
                'success',
                'Permission created successfully.'
            );
    }

    public function edit(Permission $permission)
    {
        return view(
            'admin.permissions.edit',
            compact('permission')
        );
    }

    public function update(
        Request $request,
        Permission $permission
    ) {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:100',
                'unique:permissions,name,' . $permission->id,
            ],
        ]);

        $permission->update([
            'name' => $validated['name'],
        ]);

        return redirect()
            ->route('admin.permissions.index')
            ->with(
                'success',
                'Permission updated successfully.'
            );
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back()->with(
            'success',
            'Permission deleted successfully.'
        );
    }
}