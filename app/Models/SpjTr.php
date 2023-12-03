<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpjTr extends Model
{
    use HasFactory;

    protected $table ="spj_trs";

    protected $fillable = [
        'program', 'kro', 'kegiatan','judul',
        'rencana_output', 'komponen', 'akun', 'bulan', 'tanggal_kegiatan',
        'jenis_spj', 'bendahara', 'ppk', 'status' ,'user_id', 'tanggal_transfer', 'keterangan', 'total_transpor_per_hari', 'total_jumlah_kegiatan', 'total_jumlah_yang_dibayarkan'
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
        return $this->hasMany(TabelSpjTr::class, 'spj_id', 'id');
    }


    public function hitungTransporPerHari()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total_transpor_per_hari = $tabelSpjs->sum('transpor_per_hari');
        return $total_transpor_per_hari + ($lastElement ? $lastElement->transpor_per_hari : 0);
    }

    public function hitungJumlahKegiatan()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total_jumlah_kegiatan = $tabelSpjs->sum('jumlah_kegiatan');
        return $total_jumlah_kegiatan + ($lastElement ? $lastElement->jumlah_kegiatan : 0);
    }

    public function hitungJumlahYangDibayarkan()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total_jumlah_yang_dibayarkan = $tabelSpjs->sum('jumlah_yang_dibayarkan');
        return $total_jumlah_yang_dibayarkan + ($lastElement ? $lastElement->jumlah_yang_dibayarkan : 0);
    }
}
