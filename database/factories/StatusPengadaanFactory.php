<?php

namespace Database\Factories;

use App\Models\Pengadaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusPengadaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pengadaan_id' => $this->faker->unique()->numberBetween(1, Pengadaan::count()),
        ];
    }
}
