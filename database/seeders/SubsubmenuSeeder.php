<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Subsubmenu;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubsubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminMenuId = Menu::where('name', 'Administrator')->first()->id;
        $unitMenuId = Menu::where('name', 'Unit')->first()->id;
        $pbjMenuId = Menu::where('name', 'PBJ')->first()->id;
        $ppkMenuId = Menu::where('name', 'PPK')->first()->id;

        $pegawaiAdminSubmenuId = Submenu::where('name', 'Pegawai')
        ->where('menu_id', $adminMenuId)
        ->first()->id;
        $pengajuanUnitSubmenuId = Submenu::where('name', 'Pengajuan')
        ->where('menu_id', $unitMenuId)
        ->first()->id;
        $pengajuanPBJSubmenuId = Submenu::where('name', 'Updating Status')
        ->where('menu_id', $pbjMenuId)
        ->first()->id;
        $pengajuanPPKSubmenuId = Submenu::where('name', 'Updating Status')
        ->where('menu_id', $ppkMenuId)
        ->first()->id;


        
        Subsubmenu::insert([
            [
                'submenu_id' => $pegawaiAdminSubmenuId,
                'name' => 'Tambah Pegawai',
                'url' => Str::slug('Tambah Pegawai'),
            ],
            [
                'submenu_id' => $pengajuanUnitSubmenuId,
                'name' => 'Tambah Pengajuan',
                'url' => Str::slug('Tambah Pengajuan'),
            ],
            [
                'submenu_id' => $pengajuanUnitSubmenuId,
                'name' => 'Detail',
                'url' => Str::slug('Detail'),
            ],
            [
                'submenu_id' => $pengajuanPBJSubmenuId,
                'name' => 'Detail',
                'url' => Str::slug('Detail'),
            ],
            [
                'submenu_id' => $pengajuanPPKSubmenuId,
                'name' => 'Detail',
                'url' => Str::slug('Detail'),
            ],
        ]);
           
    }
}
