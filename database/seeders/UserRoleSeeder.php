<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        // Menetapkan peran 'Admin' untuk pengguna tertentu
        $user = User::where('email', 'admin1@example.com')->first();
        $adminRole = Role::where('name', 'Admin')->first();
        $pbjRole = Role::where('name', 'PBJ')->first();
        $ppkRole = Role::where('name', 'PPK')->first();
        $unitRole = Role::where('name', 'Unit')->first();

        if ($user && $adminRole && $pbjRole && $ppkRole && $unitRole) {
            $user->roles()->syncWithoutDetaching($adminRole);
            $user->roles()->syncWithoutDetaching($pbjRole);
            $user->roles()->syncWithoutDetaching($ppkRole);
            $user->roles()->syncWithoutDetaching($unitRole);
        }

        // Mendapatkan ID peran untuk 'Unit'
        $unitRoleId = Role::where('name', 'Unit')->pluck('id')->first();

        // Mendapatkan semua ID peran selain 'Unit' dan 'Admin'
        $roleIds = Role::where('name', '!=', 'Unit')
            ->pluck('id')
            ->toArray();

        // Mengambil seluruh pengguna kecuali pengguna dengan email 'admin@example.com'
        $users = User::where('email', '!=', 'admin1@example.com')->get();

        foreach ($users as $user) {
            // Menetapkan peran 'Unit' ke setiap pengguna
            $user->roles()->syncWithoutDetaching($unitRoleId);

            // Memilih satu peran lain secara acak hanya jika ID pengguna tidak dapat dibagi dengan 7
            if ($user->id % 7 != 0) {
                // Memilih satu peran lain secara acak
                $randomRoleId = $roleIds[array_rand($roleIds)];

                // Menetapkan peran acak tersebut ke pengguna
                $user->roles()->syncWithoutDetaching($randomRoleId);
            }
        }
    }
}
