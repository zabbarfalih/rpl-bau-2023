<?php
// database/seeders/PenolakanDokumenSeeder.php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\PenolakanDokumen;

class PenolakanDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat 20 instance PenolakanDokumen menggunakan factory
        PenolakanDokumen::factory(20)->create();
    }
}
