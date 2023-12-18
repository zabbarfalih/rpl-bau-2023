<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name' => 'Unit',
            ],
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'PBJ',
            ],
            [
                'name' => 'PPK',
            ],
            [
                'name' => 'Tim Keuangan',
            ],
            [
                'name' => 'Pegawai',
            ],
            [
                'name' => 'Operator',
            ],
            [
                'name' => 'Pimpinan',
            ],
        ]);              
    }
}
