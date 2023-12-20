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

                    // Check additional columns for extra roles
                    if ($user->is_kepala_unit) {
                        $this->assignAdditionalRole($user, 'Pimpinan');
                    }

                    if ($user->is_tim_keuangan) {
                        $this->assignAdditionalRole($user, 'Tim Keuangan');
                    }

                    if ($user->is_unit) {
                        $this->assignAdditionalRole($user, 'Unit');
                    }

                    if ($user->is_operator) {
                        $this->assignAdditionalRole($user, 'Operator');
                    }
                }
            }
        } catch (ModelNotFoundException $e) {
            $this->command->error('Model not found: ' . $e->getMessage());
        }
    }

    private function assignAdditionalRole($user, $roleName)
    {
        // Find or create the additional role
        $additionalRole = Role::firstOrCreate(['name' => $roleName]);

        // Assign the additional role to the user
        $user->roles()->syncWithoutDetaching($additionalRole->id);
    }
}