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
        $spjMenuId = Menu::where('name', 'SPJ')->first()->id;
        $skpMenuId = Menu::where('name', 'SKP')->first()->id;
        $tkuMenuId = Menu::where('name', 'Tim Keuangan')->first()->id;
        
        Submenu::insert([
            [
                'menu_id' => $administratorMenuId,
                'name' => 'Pegawai',
                'url' => Str::slug('Pegawai'),
                'icon' => 'bi bi-people-fill',
            ],
            [
                'menu_id' => $unitMenuId,
                'name' => 'Pengajuan',
                'url' => Str::slug('Pengajuan'),
                'icon' => 'bi bi-menu-button-wide-fill',
            ],

            [
                'menu_id' => $pbjMenuId,
                'name' => 'Updating Status',
                'url' => Str::slug('Updating Status'),
                'icon' => 'bi bi-menu-button-wide-fill',
            ],

            [
                'menu_id' => $ppkMenuId,
                'name' => 'Updating Status',
                'url' => Str::slug('Updating Status'),
                'icon' => 'bi bi-menu-button-wide-fill',
            ],
            [
                'menu_id' => $spjMenuId,
                'name' => 'Pengajuan SPJ Honor Dosen',
                'url' => Str::slug('Pengajuan SPJ'),
                'icon' => 'bi bi-file-earmark-text-fill',
            ],
            [
                'menu_id' => $spjMenuId,
                'name' => 'Pengajuan SPJ Translok',
                'url' => Str::slug('Pengajuan SPJ Tarnslok'),
                'icon' => 'bi bi-file-earmark-text-fill',
            ],
            [
                'menu_id' => $spjMenuId,
                'name' => 'Pengajuan SPJ Perjalanan Dinas',
                'url' => Str::slug('Pengajuan SPJ Perjalanan Dinas'),
                'icon' => 'bi bi-file-earmark-text-fill',
            ],
            [
                'menu_id' => $spjMenuId,
                'name' => 'Info Pengajuan SPJ',
                'url' => Str::slug('Info Pengajuan SPJ'),
                'icon' => 'bi bi-info-square-fill',
            ],
            [
                'menu_id' => $skpMenuId,
                'name' => 'Pengajuan SKP',
                'url' => Str::slug('Pengajuan SKP'),
                'icon' => 'bi bi-file-earmark-text-fill',
            ],
            [
                'menu_id' => $skpMenuId,
                'name' => 'Info Pengajuan SKP',
                'url' => Str::slug('Info Pengajuan SKP'),
                'icon' => 'bi bi-info-square-fill',
            ],
            [
                'menu_id' => $tkuMenuId,
                'name' => 'Konfirmasi SPJ',
                'url' => Str::slug('Konfirmasi SPJ'),
                'icon' => 'bi bi-menu-button-wide-fill',
            ],
            [
                'menu_id' => $tkuMenuId,
                'name' => 'Konfirmasi SKP',
                'url' => Str::slug('Konfirmasi SKP'),
                'icon' => 'bi bi-menu-button-wide-fill',
            ]
        ]);
           
    }
}
