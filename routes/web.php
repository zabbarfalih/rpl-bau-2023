<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Profil\ProfilController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\SPJController;
use App\Http\Controllers\Dashboard\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Administrator\PegawaiController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\TabelSpjController;
use App\Http\Controllers\Dashboard\Pengadaan\Unit\PengajuanController;
use App\Http\Controllers\Dashboard\Keuangan\SKP\PengajuanSkpController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\PengajuanSpjController;
use App\Http\Controllers\Dashboard\Keuangan\SKP\InfoPengajuanSKPController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\InfoPengajuanSpjController;
use App\Http\Controllers\Dashboard\Pengadaan\Unit\DraftPengajuanController;
use App\Http\Controllers\Dashboard\Keuangan\SKP\DetailPengajuanSkpController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\DetailPengajuanSpjController;
use App\Http\Controllers\Dashboard\Pengadaan\PBJ\UpdatingStatusPBJController;
use App\Http\Controllers\Dashboard\Pengadaan\PPK\UpdatingStatusPPKController;
use App\Http\Controllers\Dashboard\Keuangan\TimKeuangan\KonfirmasiSkpController;
use App\Http\Controllers\Dashboard\Keuangan\TimKeuangan\KonfirmasiSPjController;
use App\Http\Controllers\Dashboard\Keuangan\TimKeuangan\DetailSpjController;



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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profil.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profil.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profil.destroy');
// });

Route::middleware(['auth', 'formatUserName'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home.index');

    // Profil
    Route::get('/dashboard/profil', [ProfilController::class, 'edit'])
        ->name('profil.edit');
    Route::put('/dashboard/profil', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('/dashboard/profil', [ProfilController::class, 'destroy'])->name('profil.destroy');

    // Unit
    Route::get('/dashboard/unit/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/dashboard/unit/pengajuan/details', [PengajuanController::class, 'details'])->name('pengajuan.details');
    Route::get('/dashboard/unit/pengajuan/tambah-pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.add');

    // SPJ
    Route::resource('/dashboard/spj/pengajuan-spj', SpjController::class)->middleware('auth');
    Route::get('/dashboard/spj/pengajuan-spj', [SpjController::class, 'create'])->name('spj.create');
    Route::resource('/dashboard/spj/info-pengajuan-spj', InfoPengajuanSpjController::class)->middleware('auth');
    Route::get('/dashboard/spj/info-pengajuan-spj/{spj}', 'InfoPengajuanSpjController@show')->middleware('revalidate');
    Route::get('/spjtemplatedownload', [InfoPengajuanSpjController::class, 'spjtemplatedownload'])->name('spjtemplatedownload');
    Route::get('/dashboard/spj/info-pengajuan-spj/detail', [DetailPengajuanSpjController::class, 'index'])->name('spj.detail');
    Route::post('/importspjnew', [TabelSpjController::class,'spjimportexcel'])->name('importspjnew')->middleware('auth');
    Route::delete('/dashboard/spj/info-pengajuan-spj/hapus-spj/{spj}', [SpjController::class, 'hapusSpj']);
    Route::delete('/dashboard/spj/info-pengajuan-spj/hapus-unggahan/{spj}', [SpjController::class, 'hapusUnggahan']);

    // SKP
    Route::get('/dashboard/skp/info-pengajuan-skp', [InfoPengajuanSKPController::class, 'index'])->name('skp.index');
    Route::get('/dashboard/skp/pengajuan-skp', [PengajuanSkpController::class, 'create'])->name('skp.create');
    Route::get('/dashboard/skp/info-pengajuan-skp/detail', [DetailPengajuanSkpController::class, 'index'])->name('skp.detail');

    // Tim Keuangan
    Route::get('/dashboard/tim-keuangan/konfirmasi-spj', [KonfirmasiSPjController::class, 'index'])->name('konfirmasipengajuanspj.index');
    Route::get('/dashboard/tim-keuangan/konfirmasi-spj/detail-spj', [KonfirmasiSPjController::class, 'detail'])->name('konfirmasipengajuanspj.detail');
    Route::get('/dashboard/tim-keuangan/konfirmasi-spj/{spj}', [KonfirmasiSPjController::class,'show'])->middleware('auth')->name('konfirmasi-spj.show');
    Route::post('/setujui-spj/{spj}', [DetailSpjController::class, 'changeStatusSetuju']);
    Route::post('/tolak-spj/{spj}', [DetailSpjController::class, 'changeStatusTolak']);
    Route::post('/transfer-spj/{spj}', [DetailSpjController::class, 'konfirmasiTransferSpj']);
    Route::get('/download-spj-pdf/{spj}', [DetailSpjController::class, 'donwloadPdfSpj']);


    Route::get('/dashboard/tim-keuangan/konfirmasi-skp', [KonfirmasiSKpController::class, 'index'])->name('konfirmasipengajuanskp.index');
    Route::get('/dashboard/tim-keuangan/konfirmasi-skp/detail-skp', [KonfirmasiSKpController::class, 'detail'])->name('konfirmasipengajuanskp.detail');
});

Route::middleware(['admin', 'formatUserName'])->group(function () {
    // Administrator
    Route::get('/dashboard/administrator/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/dashboard/administrator/pegawai/tambah', [PegawaiController::class, 'create'])->name('pegawai.add');
});

Route::middleware(['pbj', 'formatUserName'])->group(function () {
    // PBJ
    Route::get('/dashboard/pbj/updating-status', [UpdatingStatusPBJController::class, 'index'])->name('updatingstatuspbj.index');
    Route::get('/dashboard/pbj/updating-status/details/{id}', [UpdatingStatusPBJController::class, 'details'])->name('updatingstatuspbj.details');
    Route::get('/dashboard/pbj/updating-status/download/{nama_dokumen}/{id}', [UpdatingStatusPBJController::class, 'download'])->name('updatingstatuspbj.download');
    Route::get('/dashboard/pbj/updating-status/upload-files', [UpdatingStatusPBJController::class, 'uploadFiles'])->name('updatingstatuspbj.upload-files');
});

Route::middleware(['ppk', 'formatUserName'])->group(function () {
    // PPK
    Route::get('/dashboard/ppk/updating-status', [UpdatingStatusPPKController::class, 'index'])->name('updatingstatusppk.index');
    Route::get('/dashboard/ppk/updating-status/details/{id}', [UpdatingStatusPPKController::class, 'details'])->name('updatingstatusppk.details');
    Route::get('/dashboard/ppk/updating-status/download/{nama_dokumen}/{id}', [UpdatingStatusPPKController::class, 'download'])->name('updatingstatusppk.download');
    Route::get('/dashboard/ppk/updating-status/upload-files', [UpdatingStatusPPKController::class, 'uploadFiles'])->name('updatingstatusppk.upload-files');

});


require __DIR__ . '/auth.php';
