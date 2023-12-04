<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenPengadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_pengadaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokumen_id')->constrained()->onDelete('cascade');
            $table->string('dokumen_memo');
            $table->string('dokumen_kak');
            $table->string('dokumen_identifikasi_kebutuhan');
            $table->string('dokumen_perencanaan_pengadaan');
            $table->string('dokumen_hps');
            $table->string('dokumen_nota_dinas');
            $table->string('dokumen_undangan');
            $table->string('dokumen_ssuk_sskk');
            $table->string('dokumen_ikp');
            $table->string('dokumen_ldp_dan_spesifikasi');
            $table->string('dokumen_penawaran_pakta_formulir');
            $table->string('dokumen_surat_permintaan');
            $table->string('dokumen_pengadaan_langsung');
            $table->string('pelaksana');
            $table->double('harga_anggaran'); //untuk dibawah atau di atas 50 juta
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_pengadaans');
    }
}
