<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penolakan extends Model
{
    use HasFactory;
    protected $table = "penolakan";
    protected $fillable = [
        'dokumen_id',
        'alasan_penolakan',
        'revisi',
    ];

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class);
    }
}
