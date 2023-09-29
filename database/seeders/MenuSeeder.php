<?php

namespace Database\Seeders;

use App\Models\Menu;
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
                'url' => 'dashboard',
                'icon' => 'fa-solid fa-user',
            ],
            [
                'name' => 'Administrator',
                'has_submenu' => true,
                'url' => 'administrator',
                'icon' => 'fa-solid fa-user',
            ]
        ]);              
    }
}
