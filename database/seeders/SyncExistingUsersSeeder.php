<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class SyncExistingUsersSeeder extends Seeder
{
    /**
     * Sync existing users' role field to the roles pivot table.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            if ($user->role) {
                // Find the role by slug or name
                $role = Role::where('slug', $user->role)
                    ->orWhere('name', $user->role)
                    ->first();

                if ($role) {
                    // Sync the role to the pivot table
                    $user->roles()->syncWithoutDetaching([$role->id]);
                    $this->command->info("Synced role for user: {$user->email} -> {$role->name}");
                } else {
                    $this->command->warn("No role found for: {$user->email} with role field: {$user->role}");
                }
            }
        }

        $this->command->info('Finished syncing existing users!');
    }
}
