<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DokumenSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Seed your data into the "Dokumen" table
        foreach (range(1, 10) as $index) {
            DB::table('dokumen')->insert([
                'user_id' => $faker->numberBetween(1, 5),
                'nama_pengadaan' => $faker->sentence,
                'tanggal_pengajuan' => $faker->date,
                'status' => $faker->randomElement(['Diajukan', 'Diterima PPK', 'Ditolak', 'Revisi', 'Diproses', 'Dilaksanakan', 'Selesai', 'Diserahkan']),
                'memo' => $faker->optional()->text,
                'kak' => $faker->optional()->text,
                'undangan' => $faker->optional()->text,
                'perencanaan_pengadaan' => $faker->optional()->text,
                'identifikasi_kebutuhan' => $faker->optional()->text,
                'ldp_dan_spesifikasi' => $faker->optional()->text,
                'ikp' => $faker->optional()->text,
                'pengadaan_langsung' => $faker->optional()->text,
                'ssuk_sskk' => $faker->optional()->text,
                'dok_penawaran_pakta_formulir' => $faker->optional()->text,
                'pelaksana' => $faker->boolean,
                'created_at' => $faker->dateTimeThisMonth,
                'updated_at' => $faker->dateTimeThisMonth,
            ]);
        }
    }
}
