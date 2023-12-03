<?php

namespace Database\Factories;

use App\Models\Dokumen;
use App\Models\Pengadaan;
use App\Models\DokumenPengadaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class DokumenPengadaanFactory extends Factory
{
    protected $model = DokumenPengadaan::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dokumen_id' => Dokumen::inRandomOrder()->first()->id,
            'memo' => $this->faker->randomElement,
            'kak'=> $this->faker->randomElement,
            'undangan'=> $this->faker->randomElement,
            'perencanaan_pengadaan' => $this->faker->randomElement,
            'identifikasi_kebutuhan' => $this->faker->randomElement,
            'ldp_dan_spesifikasi' => $this->faker->randomElement,
            'ikp' => $this->faker->randomElement,
            'pengadaan_langsung' => $this->faker->randomElement,
            'ssuk_sskk' => $this->faker->randomElement,
            'dok_penawaran_pakta_formulir' => $this->faker->randomElement,
            'pelaksana' => $this->faker->randomElement,
        ];
    }
}
