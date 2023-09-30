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
                'has_submenu' => false,
                'url' => Str::slug('Dashboard'),
                'icon' => 'bi bi-grid',
            ],
            [
                'name' => 'Administrator',
                'has_submenu' => true,
                'url' => Str::slug('Administrator'),
                'icon' => 'bi bi-person-fill-gear',
            ],
            [
                'name' => 'Unit',
                'has_submenu' => false,
                'url' => Str::slug('Unit'),
                'icon' => 'bi bi-person-fill-gear',
            ]
        ]);              
    }
}
