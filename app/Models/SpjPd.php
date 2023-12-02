<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpjPd extends Model
{
    use HasFactory;

    protected $table ="spj_pds";
    protected $fillable = [
        'user_id','judul','program', 'kegiatan', 'kro','komponen', 'akun', 'jenis_spj','bendahara','ppk','tanggal_tugas',
        'total_uang_harian', 'total_transport', 'total_bandara', 'total_biaya_hotel',
        'total_jumlah_biaya', 'total_uang_muka', 'total_kekurangan', 'status', 'keterangan','tanggal_transfer'
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
        return $this->hasMany(TabelSpjPd::class, 'spj_id', 'id');
    }

    public function totalUangHarian()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total_uang_harian = $tabelSpjs->sum('uang_harian');
        return $total_uang_harian + ($lastElement ? $lastElement->uang_harian : 0);
    }

    public function totalTransport()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total_transport = $tabelSpjs->sum('transport');
        return $total_transport + ($lastElement ? $lastElement->transport : 0);
    }

    public function totalBandara()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total_bandara = $tabelSpjs->sum('bandara');
        return $total_bandara + ($lastElement ? $lastElement->bandara : 0);
    }

    public function totalBiayaHotel()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total_biaya_hotel = $tabelSpjs->sum('biaya_hotel');
        return $total_biaya_hotel + ($lastElement ? $lastElement->biaya_hotel : 0);
    }

    public function totalJumlah_Biaya()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total_jumlah_biaya = $tabelSpjs->sum('jumlah_biaya');
        return $total_jumlah_biaya + ($lastElement ? $lastElement->jumlah_biaya : 0);
    }

    public function totalUangMuka()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total_uang_muka = $tabelSpjs->sum('uang_muka');
        return $total_uang_muka + ($lastElement ? $lastElement->uang_muka : 0);
    }

    public function totalKekurangan()
    {
        $tabelSpjs = $this->tabel()->get();
        $lastElement = $tabelSpjs->last();
        $total_kekurangan = $tabelSpjs->sum('kekurangan');
        return $total_kekurangan + ($lastElement ? $lastElement->kekurangan : 0);
    }
}
