<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('gaji');
            $table->string('nip')->unique();
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('address')->nullable();
            $table->string('picture')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->integer('is_kepala_unit')->default(0);
            $table->integer('is_tim_keuangan')->default(0);
            $table->integer('is_unit')->default(0);
            $table->integer('is_operator')->default(0);
            $table->integer('is_pbj')->default(0);
            $table->integer('is_ppk')->default(0);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
