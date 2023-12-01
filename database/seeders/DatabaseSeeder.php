<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(submenueeder::class);
        $this->call(Subsubmenueeder::class);
        $this->call(DokumenSeeder::class);
        $this->call(PenolakanSeeder::class);
    }
}
