<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'View Users', 'description' => 'Can view user list and details'],
            ['name' => 'Create Users', 'description' => 'Can create new users'],
            ['name' => 'Edit Users', 'description' => 'Can edit user information'],
            ['name' => 'Delete Users', 'description' => 'Can delete users'],
            
            ['name' => 'View Categories', 'description' => 'Can view categories'],
            ['name' => 'Create Categories', 'description' => 'Can create new categories'],
            ['name' => 'Edit Categories', 'description' => 'Can edit categories'],
            ['name' => 'Delete Categories', 'description' => 'Can delete categories'],
            
            ['name' => 'View Orders', 'description' => 'Can view orders'],
            ['name' => 'Create Orders', 'description' => 'Can create new orders'],
            ['name' => 'Edit Orders', 'description' => 'Can edit orders'],
            ['name' => 'Delete Orders', 'description' => 'Can delete orders'],
            
            ['name' => 'View Roles', 'description' => 'Can view roles and permissions'],
            ['name' => 'Create Roles', 'description' => 'Can create new roles'],
            ['name' => 'Edit Roles', 'description' => 'Can edit roles and assign permissions'],
            ['name' => 'Delete Roles', 'description' => 'Can delete roles'],
            
            ['name' => 'View Reports', 'description' => 'Can view financial reports'],
            ['name' => 'View Financials', 'description' => 'Can view financial data'],
            ['name' => 'Manage Settings', 'description' => 'Can manage application settings'],
            
            ['name' => 'View Route Optimization', 'description' => 'Can view route optimization'],
            ['name' => 'View Pickups', 'description' => 'Can view pickups and deliveries'],
            ['name' => 'View Tailors', 'description' => 'Can view tailors list'],
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'slug' => Str::slug($permission['name']),
                'description' => $permission['description'],
            ]);
        }
    }
}
