<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin Role
        $adminRole = Role::firstOrCreate(
            ['slug' => 'admin'],
            [
                'name' => 'admin',
                'description' => 'Administrator with full access'
            ]
        );

        // Create Manager Role
        $managerRole = Role::firstOrCreate(
            ['slug' => 'manager'],
            [
                'name' => 'manager',
                'description' => 'Manager with limited access'
            ]
        );

        // Create User Role
        $userRole = Role::firstOrCreate(
            ['slug' => 'user'],
            [
                'name' => 'user',
                'description' => 'Regular user with basic access'
            ]
        );

        // Assign all permissions to Admin role
        $allPermissions = Permission::all();
        $adminRole->permissions()->sync($allPermissions->pluck('id'));

        // Assign specific permissions to Manager role
        $managerPermissions = Permission::whereIn('slug', [
            'view-users',
            'view-categories',
            'create-categories',
            'edit-categories',
            'view-orders',
            'create-orders',
            'edit-orders',
        ])->pluck('id');
        $managerRole->permissions()->sync($managerPermissions);

        // User role has no special permissions (can be assigned manually)
        $userRole->permissions()->sync([]);
    }
}
