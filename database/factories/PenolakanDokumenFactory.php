<?php
// database/factories/PenolakanDokumenFactory.php

namespace Database\Factories;
use App\Models\Dokumens;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;
use App\Models\PenolakanDokumen;

class PenolakanDokumenFactory extends Factory{
    protected $model = Penolakan::class;

    public function definition(){
    return [
        'idDokumen' => function () {
            return \App\Models\Dokumens::factory()->create()->id; // Menggunakan factory Dokumen untuk menghasilkan idDokumen
        },
        'alasan_penolakan' => $faker->sentence,
        'revisi' => $faker->boolean,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
    }
};
