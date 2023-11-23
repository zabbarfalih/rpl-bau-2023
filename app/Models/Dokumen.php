<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $table = "dokumen";
    protected $fillable = [
        'user_id',
        'nama_pengadaan',
        'tanggal_pengajuan',
        'status',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penolakan()
    {
        return $this->hasOne(Penolakan::class);
    }
}
