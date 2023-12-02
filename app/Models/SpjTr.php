<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpjTr extends Model
{
    use HasFactory;

    protected $table ="spj_trs";

    protected $fillable = [
        'program', 'kro', 'kegiatan',
        'rencana_output', 'komponen', 'akun', 'bulan', 'tanggal_kegiatan',
        'jenis_spj', 'bendahara', 'ppk', 'status' ,'user_id', 'tanggal_transfer', 'keterangan', 'total', 'total_jumlah_kegiatan', 'total_jumlah_yang_dibayarkan'
    ];

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
