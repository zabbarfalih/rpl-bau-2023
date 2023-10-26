<?php

namespace Database\Seeders;

use App\Models\Menu;
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
        $administratorMenuId = Menu::where('name', 'Administrator')->first()->id;
        $unitMenuId = Menu::where('name', 'Unit')->first()->id;
        $pbjMenuId = Menu::where('name', 'PBJ')->first()->id;
        $ppkMenuId = Menu::where('name', 'PPK')->first()->id;
        $bauMenuId = Menu::where('name', 'Kepala BAU')->first()->id;
        
        Submenu::insert([
            [
                'menu_id' => $administratorMenuId,
                'name' => 'Pegawai',
                'url' => Str::slug('Pegawai'),
                'icon' => 'bi bi-people-fill',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'menu_id' => $administratorMenuId,
                'name' => 'Menu & Submenu',
                'url' => Str::slug('Menu & Submenu'),
                'icon' => 'bi bi-menu-button-wide-fill',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'menu_id' => $unitMenuId,
                'name' => 'Pengajuan',
                'url' => Str::slug('Pengajuan'),
                'icon' => 'bi bi-menu-button-wide-fill',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'menu_id' => $unitMenuId,
                'name' => 'Draft Pengajuan',
                'url' => Str::slug('Draft Pengajuan'),
                'icon' => 'bi bi-menu-button-wide-fill',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'menu_id' => $pbjMenuId,
                'name' => 'Updating Status',
                'url' => Str::slug('Updating Status'),
                'icon' => 'bi bi-menu-button-wide-fill',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'menu_id' => $ppkMenuId,
                'name' => 'Updating Status',
                'url' => Str::slug('Updating Status'),
                'icon' => 'bi bi-menu-button-wide-fill',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'menu_id' => $bauMenuId,
                'name' => 'Konfirmasi Pengajuan',
                'url' => Str::slug('Konfirmasi Pengajuan'),
                'icon' => 'bi bi-menu-button-wide-fill',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
           
    }
}
