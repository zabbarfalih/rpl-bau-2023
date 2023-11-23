<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penolakan;
use App\Models\Dokumen;

class PenolakanSeeder extends Seeder
{
    public function run()
    {
        // Get all Dokumen IDs
        $dokumenIds = Dokumen::pluck('id')->toArray();

        foreach ($dokumenIds as $dokumenId) {
            Penolakan::factory()->create([
                'dokumen_id' => $dokumenId,
            ]);
        }
    }
}
