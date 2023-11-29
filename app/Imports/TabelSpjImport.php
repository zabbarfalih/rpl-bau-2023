<?php

namespace App\Imports;

use App\Models\TabelSpj;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class TabelSpjImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (empty(array_filter($row))) {
            return null;
        }

        $spj_idFromForm = request('spj_id');

        return new TabelSpj([
            //
            'user_id' => auth()->id(),
            'spj_id' => $spj_idFromForm,
            'nama_dosen' => $row[1] ?? null, 
            'golongan' => $row[2] ?? null,
            'rate_honor' => $row[3] ?? null,
            'sks_wajib' => $row[4] ?? null,
            'sks_hadir' => $row[5] ?? null,
            'sks_dibayar' => $row[6] ?? null,
            'jumlah_bruto' => $row[7] ?? null,
            'pajak' => $row[8] ?? null,
            'jumlah_diterima' => $row[9] ?? null,
            'nomor_rekening' => $row[10] ?? null,
            'nama_rekening' => $row[11] ?? null
        ]);
    }

    public function startRow(): int
    {
        // Specify the starting row (e.g., row 3)
        return 3;
    }
}
