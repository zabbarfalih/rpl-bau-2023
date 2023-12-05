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
        // Create a sample admin menu
        Menu::insert([
            [
                'name' => 'Dashboard',
                'on_sidebar' => true,
                'url' => Str::slug('Dashboard'),
                'icon' => 'bi bi-grid',
            ],
            [
                'name' => 'Profil',
                'on_sidebar' => false,
                'url' => Str::slug('Profil'),
                'icon' => 'bi bi-person',
            ],
            [
                'name' => 'Pengaturan',
                'on_sidebar' => false,
                'url' => Str::slug('Pengaturan'),
                'icon' => 'bi bi-gear',
            ],
            [
                'name' => 'Administrator',
                'on_sidebar' => true,
                'url' => Str::slug('Administrator'),
                'icon' => 'bi bi-person-gear',
            ],
            [
                'name' => 'Unit',
                'on_sidebar' => true,
                'url' => Str::slug('Unit'),
                'icon' => 'bi bi-person-add',
            ],
            [
                'name' => 'PBJ',
                'on_sidebar' => true,
                'url' => Str::slug('PBJ'),
                'icon' => 'bi bi-person-up',
            ],
            [
                'name' => 'PPK',
                'on_sidebar' => true,
                'url' => Str::slug('PPK'),
                'icon' => 'bi bi-person-up',
            ],
            [
                'name' => 'SPJ',
                'on_sidebar' => true,
                'url' => Str::slug('SPJ'),
                'icon' => 'bi bi-person-up',
            ],
            [
                'name' => 'SKP',
                'on_sidebar' => true,
                'url' => Str::slug('SKP'),
                'icon' => 'bi bi-person-up',
            ],
            [
                'name' => 'Tim Keuangan',
                'on_sidebar' => true,
                'url' => Str::slug('Tim Keuangan'),
                'icon' => 'bi bi-person-check',
            ]
        ]);              
    }
}
