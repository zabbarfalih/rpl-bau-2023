<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpjPdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spj_pds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('judul');
            $table->string('program');
            $table->string('kegiatan');
            $table->string('kro');
            $table->string('komponen');
            $table->string('akun');
            $table->bigInteger('total')->nullable();
            $table->bigInteger('total_biaya_uang_harian')->nullable();
            $table->bigInteger('total_biaya_transport')->nullable();
            $table->bigInteger('total_taksi_bendahara')->nullable();
            $table->bigInteger('total_biaya_hotel')->nullable();
            $table->bigInteger('total_jumlah_biaya')->nullable();
            $table->bigInteger('total_uang_muka')->nullable();
            $table->bigInteger('total_kekurangan')->nullable();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spj_pds');
    }
}
