<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spj extends Model
{
    use HasFactory;

    protected $table ="spjs";
    protected $fillable = [
        'program', 'kro', 'kegiatan',
        'rencana_output', 'komponen', 'akun', 'periode', 'tanggal_kegiatan',
        'jenis_spj', 'bendahara', 'ppk', 'status' ,'user_id', 'tanggal_transfer', 'keterangan', 'total', 'total_pajak', 'total_bruto'
    ];

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tabel()
    {
        return $this->hasMany(TabelSpj::class);
    }

    public function hitungTotal()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total = $tabelSpjs->sum('jumlah_diterima');
        return $total + ($lastElement ? $lastElement->jumlah_diterima : 0);
    }

    public function hitungBruto()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total = $tabelSpjs->sum('jumlah_bruto');
        return $total + ($lastElement ? $lastElement->jumlah_bruto : 0);
    }

    public function hitungPajak()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total = $tabelSpjs->sum('pajak');
        return $total + ($lastElement ? $lastElement->pajak : 0);
    }

}
