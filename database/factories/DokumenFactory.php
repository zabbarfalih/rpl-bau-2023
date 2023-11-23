<?php

namespace Database\Factories;

use App\Models\Dokumen;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DokumenFactory extends Factory
{
    protected $model = Dokumen::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return User::all()->random()->id;
            },
            'nama_pengadaan' => $this->faker->sentence,
            'tanggal_pengajuan' => $this->faker->date,
            'status' => $this->faker->randomElement(['Diajukan', 'Diterima PPK', 'Ditolak', 'Revisi', 'Diproses', 'Dilaksanakan', 'Selesai', 'Diserahkan']),
            'memo' => $this->faker->sentence,
            'kak' => $this->faker->sentence,
            'undangan' => $this->faker->sentence,
            'perencanaan_pengadaan' => $this->faker->sentence,
            'identifikasi_kebutuhan' => $this->faker->sentence,
            'ldp_dan_spesifikasi' => $this->faker->sentence,
            'ikp' => $this->faker->sentence,
            'pengadaan_langsung' => $this->faker->sentence,
            'ssuk_sskk' => $this->faker->sentence,
            'dok_penawaran_pakta_formulir' => $this->faker->sentence,
            'bast' => $this->faker->sentence,
            'permintaan' => $this->faker->sentence,
            'pelaksana' => $this->faker->boolean,
            'detail_dok_kontrak' => $this->faker->sentence,
        ];
    }
}
