<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPengadaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokumen_id',
        'memo',
        'kak',
        'undangan',
        'perencanaan_pengadaan',
        'identifikasi_kebutuhan',
        'ldp_dan_spesifikasi',
        'ikp',
        'pengadaan_langsung',
        'ssuk_sskk',
        'dok_penawaran_pakta_formulir',
        'pelaksana',
    ];

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id');
    }
}
