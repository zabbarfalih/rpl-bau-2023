<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a sample admin menus
        Menu::insert([
            [
                'name' => 'Dashboard',
                'on_sidebar' => true,
                'url' => Str::slug('Dashboard'),
                'icon' => 'bi bi-grid',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Profil',
                'on_sidebar' => false,
                'url' => Str::slug('Profil'),
                'icon' => 'bi bi-person',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pengaturan',
                'on_sidebar' => false,
                'url' => Str::slug('Pengaturan'),
                'icon' => 'bi bi-gear',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Administrator',
                'on_sidebar' => true,
                'url' => Str::slug('Administrator'),
                'icon' => 'bi bi-person-gear',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Unit',
                'on_sidebar' => true,
                'url' => Str::slug('Unit'),
                'icon' => 'bi bi-person-add',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'PBJ',
                'on_sidebar' => true,
                'url' => Str::slug('PBJ'),
                'icon' => 'bi bi-person-up',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'PPK',
                'on_sidebar' => true,
                'url' => Str::slug('PPK'),
                'icon' => 'bi bi-person-up',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kepala BAU',
                'on_sidebar' => true,
                'url' => Str::slug('Kepala BAU'),
                'icon' => 'bi bi-person-check',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'SPJ',
                'on_sidebar' => true,
                'url' => Str::slug('SPJ'),
                'icon' => 'bi bi-person-up',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'SKP',
                'on_sidebar' => true,
                'url' => Str::slug('SKP'),
                'icon' => 'bi bi-person-up',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);              
    }
}
