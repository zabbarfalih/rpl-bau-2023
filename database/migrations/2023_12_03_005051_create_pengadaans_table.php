<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengadaansTable extends Migration
{

    /**
     * Accessor untuk mengubah format tanggal 'created_at'.
     *
     * @return string
     */
    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('d m Y');
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // database/migrations/xxxx_xx_xx_create_pengadaans_table.php

        Schema::create('pengadaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama_pengadaan');
            $table->date('tanggal_pengadaan');
            $table->enum('status', [
                'Diajukan',
                'Diterima PPK',
                'Ditolak',
                'Revisi',
                'Diproses',
                'Dilaksanakan',
                'Selesai',
                'Diserahkan'
            ]);
            $table->foreignId('role_id')->constrained('roles')->nullable();
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
        Schema::dropIfExists('pengadaans');
    }
}
