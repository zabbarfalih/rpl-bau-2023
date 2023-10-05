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
                'menu_id' => 4,
                'name' => 'Pegawai',
                'url' => Str::slug('Users'),
                'icon' => 'bi bi-people-fill'
            ],
            [
                'menu_id' => 4,
                'name' => 'Menu & Submenu',
                'url' => Str::slug('Menu & Submenu'),
                'icon' => 'bi bi-menu-button-wide-fill'
            ]
        ]);
           
    }
}
