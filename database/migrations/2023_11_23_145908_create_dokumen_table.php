<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenTable extends Migration
{
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_pengadaan');
            $table->date('tanggal_pengajuan');
            $table->enum('status', ['Diajukan', 'Diterima PPK', 'Ditolak', 'Revisi', 'Diproses', 'Dilaksanakan', 'Selesai', 'Diserahkan']);
            $table->string('memo')->nullable();
            $table->string('kak')->nullable();
            $table->string('undangan')->nullable();
            $table->string('perencanaan_pengadaan')->nullable();
            $table->string('identifikasi_kebutuhan')->nullable();
            $table->string('ldp_dan_spesifikasi')->nullable();
            $table->string('ikp')->nullable();
            $table->string('pengadaan_langsung')->nullable();
            $table->string('ssuk_sskk')->nullable();
            $table->string('dok_penawaran_pakta_formulir')->nullable();
            $table->string('bast')->nullable();
            $table->string('permintaan')->nullable();
            $table->boolean('pelaksana');
            $table->string('detail_dok_kontrak')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
}
