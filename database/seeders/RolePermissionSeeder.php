<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]
            ->forgetCachedPermissions();

        /*
        |--------------------------------------------------------------------------
        | Permissions
        |--------------------------------------------------------------------------
        */

        $permissions = [

            // Dashboard
            'view dashboard',

            // Users
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Customers
            'view customers',
            'create customers',
            'edit customers',
            'delete customers',

            // Agents
            'view agents',
            'create agents',
            'edit agents',
            'delete agents',
            'approve agents',

            // Properties
            'view properties',
            'create properties',
            'edit properties',
            'delete properties',

            // Own Properties
            'view own properties',
            'create own properties',
            'edit own properties',
            'delete own properties',

            // Property Approval
            'view property approvals',
            'approve properties',
            'reject properties',
            'request property modification',
            'override property approval',
            'delete fraudulent property',

            // Property Images
            'upload property images',
            'delete property images',

            // Property Documents
            'upload property documents',
            'delete property documents',

            // Categories
            'view categories',
            'create categories',
            'edit categories',
            'delete categories',

            // Amenities
            'view amenities',
            'create amenities',
            'edit amenities',
            'delete amenities',

            // Cities
            'view cities',
            'create cities',
            'edit cities',
            'delete cities',

            // States
            'view states',
            'create states',
            'edit states',
            'delete states',

            // Wishlist
            'view wishlist',
            'add wishlist',
            'remove wishlist',

            // Enquiries
            'view enquiries',
            'create enquiries',
            'edit enquiries',
            'delete enquiries',
            'manage enquiries',
            'respond enquiries',

            // Visits
            'view visits',
            'book visits',
            'manage visits',
            'update visit outcome',

            // Agent
            'view assigned properties',
            'manage assigned properties',
            'view assigned buyers',

            // Transactions
            'manage transactions',

            // Reports
            'view reports',
            'generate reports',
            'view commission report',

            // Notifications
            'view notifications',
            'manage notifications',

            // Roles
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',

            // Permissions
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',

            // System
            'system settings',
            'manage email templates',
            'manage sms settings',
            'backup system',
            'view audit logs',
        ];

        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */

        $superAdmin = Role::firstOrCreate([
            'name' => 'super-admin',
            'guard_name' => 'web',
        ]);

        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $agent = Role::firstOrCreate([
            'name' => 'agent',
            'guard_name' => 'web',
        ]);

        $buyer = Role::firstOrCreate([
            'name' => 'buyer',
            'guard_name' => 'web',
        ]);

        $seller = Role::firstOrCreate([
            'name' => 'seller',
            'guard_name' => 'web',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SUPER ADMIN
        |--------------------------------------------------------------------------
        */

        $superAdmin->syncPermissions(
            Permission::all()
        );

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        $admin->syncPermissions([

            'view dashboard',

            'view users',
            'create users',
            'edit users',
            'delete users',

            'view customers',
            'create customers',
            'edit customers',
            'delete customers',

            'view agents',
            'create agents',
            'edit agents',
            'delete agents',
            'approve agents',

            'view properties',
            'edit properties',
            'delete properties',

            'view property approvals',
            'approve properties',
            'reject properties',
            'request property modification',

            'view categories',
            'create categories',
            'edit categories',
            'delete categories',

            'view amenities',
            'create amenities',
            'edit amenities',
            'delete amenities',

            'view cities',
            'create cities',
            'edit cities',
            'delete cities',

            'view states',
            'create states',
            'edit states',
            'delete states',

            'view enquiries',
            'manage enquiries',

            'view visits',
            'manage visits',

            'view reports',
            'generate reports',

            'view notifications',
            'manage notifications',
        ]);

        /*
        |--------------------------------------------------------------------------
        | AGENT
        |--------------------------------------------------------------------------
        */

        $agent->syncPermissions([

            'view dashboard',

            'view assigned properties',
            'manage assigned properties',

            'view assigned buyers',

            'view enquiries',
            'manage enquiries',
            'respond enquiries',

            'view visits',
            'manage visits',
            'update visit outcome',

            'manage transactions',

            'view commission report',

            'view notifications',
        ]);

        /*
        |--------------------------------------------------------------------------
        | BUYER
        |--------------------------------------------------------------------------
        */

        $buyer->syncPermissions([

            'view dashboard',

            'view properties',

            'view wishlist',
            'add wishlist',
            'remove wishlist',

            'create enquiries',
            'view enquiries',

            'book visits',
            'view visits',

            'view notifications',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SELLER
        |--------------------------------------------------------------------------
        */

        $seller->syncPermissions([

            'view dashboard',

            'view properties',

            'view own properties',
            'create own properties',
            'edit own properties',
            'delete own properties',

            'upload property images',
            'delete property images',

            'upload property documents',
            'delete property documents',

            'view enquiries',
            'respond enquiries',

            'view visits',

            'view notifications',
        ]);

        app()[PermissionRegistrar::class]
            ->forgetCachedPermissions();
    }
}