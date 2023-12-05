<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penolakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengadaan_id',
        'user_id',
        'alasan_penolakan',
        'tanggal_penolakan',
    ];

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
