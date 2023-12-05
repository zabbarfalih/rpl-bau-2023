<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Profil\ProfilController;

use App\Http\Controllers\Dashboard\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Administrator\PegawaiController;
use App\Http\Controllers\Dashboard\Pengadaan\Unit\PengajuanController;
use App\Http\Controllers\Dashboard\Keuangan\SKP\PengajuanSkpController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\PengajuanSpjController;
use App\Http\Controllers\Dashboard\Keuangan\SKP\InfoPengajuanSKPController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\InfoPengajuanSPJController;
use App\Http\Controllers\Dashboard\Pengadaan\Unit\DraftPengajuanController;
use App\Http\Controllers\Dashboard\Keuangan\SKP\DetailPengajuanSkpController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\DetailPengajuanSpjController;
use App\Http\Controllers\Dashboard\Pengadaan\PBJ\UpdatingStatusPBJController;
use App\Http\Controllers\Dashboard\Pengadaan\PPK\UpdatingStatusPPKController;
use App\Http\Controllers\Dashboard\Keuangan\TimKeuangan\KonfirmasiSPjController;
use App\Http\Controllers\Dashboard\Keuangan\TimKeuangan\KonfirmasiSkpController;
use App\Http\Controllers\Dashboard\Pengadaan\TemplateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth', 'formatUserName'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home.index');
    // Profil
    Route::controller(ProfilController::class)->name('profil.')->group(function () {
        Route::get('/profil', 'edit')->name('edit');
        Route::put('/profil', 'update')->name('update');
        Route::delete('/profil', 'destroy')->name('destroy');
    });

    // SPJ
    Route::get('/spj/info-pengajuan-spj', [InfoPengajuanSPJController::class, 'index'])->name('spj.index');
    Route::get('/spj/pengajuan-spj', [PengajuanSpjController::class, 'create'])->name('spj.create');
    Route::get('/spj/info-pengajuan-spj/detail', [DetailPengajuanSpjController::class, 'index'])->name('spj.detail');

    // SKP
    Route::get('/skp/info-pengajuan-skp', [InfoPengajuanSKPController::class, 'index'])->name('skp.index');
    Route::get('/skp/pengajuan-skp', [PengajuanSkpController::class, 'create'])->name('skp.create');
    Route::get('/skp/info-pengajuan-skp/detail', [DetailPengajuanSkpController::class, 'index'])->name('skp.detail');

    // Tim Keuangan
    Route::get('/tim-keuangan/konfirmasi-spj', [KonfirmasiSPjController::class, 'index'])->name('konfirmasipengajuanspj.index');
    Route::get('/tim-keuangan/konfirmasi-skp', [KonfirmasiSKpController::class, 'index'])->name('konfirmasipengajuanskp.index');
    Route::get('/tim-keuangan/konfirmasi-spj/detail-spj', [KonfirmasiSPjController::class, 'detail'])->name('konfirmasipengajuanspj.detail');
    Route::get('/tim-keuangan/konfirmasi-skp/detail-skp', [KonfirmasiSKpController::class, 'detail'])->name('konfirmasipengajuanskp.detail');
});

// Unit
Route::middleware(['formatUserName'])->prefix('dashboard/unit')->name('unit.')->group(function () {
    Route::controller(PengajuanController::class)->group(function () {
        Route::get('/pengajuan', 'index')->name('pengajuan.index');
        Route::get('/pengajuan/{id}/details', 'details')->name('pengajuan.details');
        Route::get('/pengajuan/tambah-pengajuan', 'create')->name('pengajuan.add');
        Route::post('/pengajuan/kirim-form', 'kirimForm')->name('pengajuan.kirim-form');
    
        // Unit -> download template
        Route::get('/download-template/{filename}', 'downloadTemplate')->name('template.download');
    });
});

Route::middleware(['can:admin', 'formatUserName'])->group(function () {
    // Administrator
    Route::get('/dashboard/administrator/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/dashboard/administrator/pegawai/tambah', [PegawaiController::class, 'create'])->name('pegawai.add');
});

// Pengadaan - PBJ
Route::middleware(['can:pbj', 'formatUserName'])->prefix('dashboard/pbj')->name('updatingstatuspbj.')->group(function () {
    Route::controller(UpdatingStatusPBJController::class)->group(function () {
        Route::get('updating-status', 'index')->name('index');
        Route::get('updating-status/details/{id}', 'details')->name('details');
        Route::get('updating-status/download/{nama_dokumen}/{id}', 'download')->name('download');
        Route::get('updating-status/upload-files', 'uploadFiles')->name('upload-files');
    });
});

// Pengadaan - PPK
Route::middleware(['can:ppk', 'formatUserName'])->prefix('dashboard/ppk')->name('updatingstatusppk.')->group(function () {
    Route::controller(UpdatingStatusPPKController::class)->group(function () {
        Route::get('updating-status', 'index')->name('index');
        Route::get('updating-status/details/{id}', 'details')->name('details');
        Route::get('updating-status/download/{nama_dokumen}/{id}', 'download')->name('download');
        Route::get('updating-status/upload-files', 'uploadFiles')->name('upload-files');
    });
});

require __DIR__ . '/auth.php';
