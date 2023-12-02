<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpjPd extends Model
{
    use HasFactory;

    protected $table ="spj_pds";
    protected $fillable = [
        'user_id','judul','program', 'kegiatan', 'kro','komponen', 'akun', 
        'total', 'total_biaya_uang_harian', 'total_biaya_transport', 'total_taksi_bendahara', 'total_biaya_hotel',
        'total_jumlah_biaya', 'total_uang_muka', 'total_kekurangan', 'status'
    ];

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
