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
            $table->string('memo');
            $table->string('kak');
            $table->string('undangan');
            $table->string('perencanaan_pengadaan');
            $table->string('identifikasi_kebutuhan');
            $table->string('ldp_dan_spesifikasi');
            $table->string('ikp');
            $table->string('pengadaan_langsung');
            $table->string('ssuk_sskk');
            $table->string('dok_penawaran_pakta_formulir');
            $table->string('pelaksana');
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
