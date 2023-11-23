<?php

namespace Database\Factories;

use App\Models\Penolakan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenolakanFactory extends Factory
{
    protected $model = Penolakan::class;

    public function definition()
    {
        return [
            'dokumen_id' => function () {
                return \App\Models\Dokumen::factory()->create()->id;
            },
            'alasan_penolakan' => $this->faker->paragraph,
            'revisi' => $this->faker->boolean,
        ];
    }
}
