<?php

namespace Database\Seeders;

use App\Models\Submenu;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a sample admin submenus
        Submenu::insert([
            [
                'menu_id' => 2,
                'name' => 'Users',
                'url' => Str::slug('Users'),
                'icon' => 'bi bi-people-fill'
            ],
            [
                'menu_id' => 2,
                'name' => 'Menu & Submenu',
                'url' => Str::slug('Menu & Submenu'),
                'icon' => 'bi bi-menu-button-wide-fill'
            ]
        ]);
           
    }
}
