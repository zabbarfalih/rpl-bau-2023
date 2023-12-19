<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        try {
            // Get all distinct roles from the users table
            $roles = User::distinct()->pluck('role')->filter();

            foreach ($roles as $roleName) {
                // Find or create the role
                $role = Role::firstOrCreate(['name' => $roleName]);

                // Assign the role to all users with the same role name
                $usersWithRole = User::where('role', $roleName)->get();

                foreach ($usersWithRole as $user) {
                    $user->roles()->syncWithoutDetaching($role->id);
                }
            }
        } catch (ModelNotFoundException $e) {
            $this->command->error('Model not found: ' . $e->getMessage());
        }
    }
}