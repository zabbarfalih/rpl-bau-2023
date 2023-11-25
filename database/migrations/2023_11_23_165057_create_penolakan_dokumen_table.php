<?php

// In the migration file (e.g., database/migrations/2023_11_23_create_penolakan_dokumen_table.php)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenolakanDokumenTable extends Migration
{
    public function up()
    {
        Schema::create('penolakan_dokumen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idDokumen')->constrained('dokumen'); // Assuming 'dokumen' is the name of the related table
            $table->text('alasan_penolakan');
            $table->boolean('revisi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penolakan_dokumen');
    }
}

