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
            'show properties',
            'get search properties',

            // Own Properties
            'view own properties',
            'create own properties',
            'edit own properties',
            'delete own properties',

            // Property Approval
            'view property',
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
            'view countries',
            'create countries',
            'edit countries',
            'delete countries',

            // Cities
            'view cities',
            'create cities',
            'edit cities',
            'delete cities',

            // Areas
            'view areas',
            'create areas',
            'edit areas',
            'delete areas',

            //States
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

            //image
            'media gallery'
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
        app()[PermissionRegistrar::class]
            ->forgetCachedPermissions();
    }
}
