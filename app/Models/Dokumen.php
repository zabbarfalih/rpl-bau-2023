<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pengadaan_id',
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }

    public function dokumenPengajuans()
    {
        return $this->hasMany(DokumenPengadaan::class);
    }
}
