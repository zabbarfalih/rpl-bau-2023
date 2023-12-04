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
            'dokumen_id' => Dokumen::factory(),
            'dokumen_memo' => $this->faker->randomElement,
            'dokumen_kak'=> $this->faker->randomElement,
            'dokumen_identifikasi_kebutuhan'=> $this->faker->randomElement,
            'dokumen_perencanaan_pengadaan' => $this->faker->randomElement,
            'dokumen_hps' => $this->faker->randomElement,
            'dokumen_nota_dinas' => $this->faker->randomElement,
            'dokumen_undangan' => $this->faker->randomElement,
            'dokumen_ssuk_sskk' => $this->faker->randomElement,
            'dokumen_ikp' => $this->faker->randomElement,
            'dokumen_ldp_dan_spesifikasi' => $this->faker->randomElement,
            'dokumen_penawaran_pakta_formulir' => $this->faker->randomElement,
            'dokumen_surat_permintaan' => $this->faker->randomElement,
            'dokumen_pengadaan_langsung' => $this->faker->randomElement,
            'pelaksana' => $this->faker->randomElement,
            'harga_anggaran' => $this->faker->randomFloat(2, 100000, 2000000000),
        ];
    }
}
