<?php

namespace Database\Seeders;

use App\Models\Submenu;
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
                'url' => 'users',
                'icon' => 'fa-solid fa-user'
            ],
            [
                'menu_id' => 2,
                'name' => 'Menu & Submenu',
                'url' => 'menu-submenu',
                'icon' => 'fa-solid fa-user'
            ]
        ]);        
    }
}
