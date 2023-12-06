<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Profil\ProfilController;

use App\Http\Controllers\Dashboard\Keuangan\SPJ\SPJController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\SpjPdController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\SpjTrController;


use App\Http\Controllers\Dashboard\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Administrator\PegawaiController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\TabelSpjController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\TabelSpjTrController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\TabelSpjPdController;
use App\Http\Controllers\Dashboard\Pengadaan\Unit\PengajuanController;
use App\Http\Controllers\Dashboard\Keuangan\SKP\PengajuanSkpController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\PengajuanSpjController;
use App\Http\Controllers\Dashboard\Keuangan\SKP\InfoPengajuanSKPController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\InfoPengajuanSpjController;
use App\Http\Controllers\Dashboard\Pengadaan\Unit\DraftPengajuanController;
use App\Http\Controllers\Dashboard\Keuangan\TimKeuangan\DetailSpjController;
use App\Http\Controllers\Dashboard\Keuangan\SKP\DetailPengajuanSkpController;
use App\Http\Controllers\Dashboard\Keuangan\SPJ\DetailPengajuanSpjController;
use App\Http\Controllers\Dashboard\Pengadaan\PBJ\UpdatingStatusPBJController;
use App\Http\Controllers\Dashboard\Pengadaan\PPK\UpdatingStatusPPKController;
use App\Http\Controllers\Dashboard\Keuangan\TimKeuangan\KonfirmasiSkpController;
use App\Http\Controllers\Dashboard\Pengadaan\DokumenController;
use App\Http\Controllers\Dashboard\Keuangan\TimKeuangan\KonfirmasiSPjController;

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

    // SPJ Honor Dosen
    Route::resource('/spj/pengajuan-spj', SpjController::class)->middleware('auth');
    Route::get('/spj/pengajuan-spj', [SpjController::class, 'create'])->name('spj.create');
    Route::resource('/spj/info-pengajuan-spj', InfoPengajuanSpjController::class)->middleware('auth');
    Route::get('/spj/info-pengajuan-spj/{spj}', [InfoPengajuanSpjController::class, 'show'])->name('info-pengajuan-spj.show');
    Route::get('/spjtemplatedownload', [InfoPengajuanSpjController::class, 'spjtemplatedownload'])->name('spjtemplatedownload');
    Route::get('/spj/info-pengajuan-spj/detail', [DetailPengajuanSpjController::class, 'index'])->name('spj.detail');
    Route::post('/importspjnew', [TabelSpjController::class,'spjimportexcel'])->name('importspjnew')->middleware('auth');
    Route::delete('/spj/info-pengajuan-spj/hapus-spj/{spj}', [SpjController::class, 'hapusSpj']);
    Route::delete('/spj/info-pengajuan-spj/hapus-unggahan/{spj}', [SpjController::class, 'hapusUnggahan']);

    // SPJ Translok
    Route::resource('/spj/pengajuan-translok', SpjTrController::class)->middleware('auth');
    Route::get('/spj/pengajuan-translok', [SpjTrController::class, 'create'])->name('spj-tr.create');
    Route::post('/spj/pengajuan-translok', [SpjTrController::class, 'store'])->name('spj-tr.store');
    Route::get('/spj/info-pengajuan-spjtr/{spj}', [InfoPengajuanSpjController::class, 'showtr'])->name('info-pengajuan-spjtr.show');
    Route::post('/importspjtrnew', [TabelSpjTrController::class,'spjimportexcel'])->name('importspjtrnew')->middleware('auth');
    Route::get('/spjtrtemplatedownload', [InfoPengajuanSpjController::class, 'spjtrtemplatedownload'])->name('spjtrtemplatedownload');
    Route::delete('/spj/info-pengajuan-spjtr/hapus-spj/{spj}', [SpjController::class, 'hapusSpjTr']);
    Route::delete('/spj/info-pengajuan-spjtr/hapus-unggahan/{spj}', [SpjController::class, 'hapusUnggahanTr']);

    // SPJ Perjalanan Dinas
    Route::resource('/spj/pengajuan-perjalanan-dinas', SpjPdController::class)->middleware('auth');
    Route::get('/spj/pengajuan-perjalanan-dinas', [SpjPdController::class, 'create'])->name('spj-pd.create');   
    Route::post('/spj/pengajuan-perjalanan-dinas', [SpjPdController::class, 'store'])->name('spj-pd.store');   
    Route::get('/spj/info-pengajuan-spjpd/{spj}', [InfoPengajuanSpjController::class, 'showpd'])->name('info-pengajuan-spjpd.show');
    Route::post('/importspjpdnew', [TabelSpjPdController::class,'spjimportexcel'])->name('importspjpdnew')->middleware('auth');
    Route::get('/spjpdtemplatedownload', [InfoPengajuanSpjController::class, 'spjpdtemplatedownload'])->name('spjpdtemplatedownload');
    Route::delete('/spj/info-pengajuan-spjpd/hapus-unggahan/{spj}', [SpjController::class, 'hapusUnggahanPd']);
    Route::delete('/spj/info-pengajuan-spjpd/hapus-spj/{spj}', [SpjController::class, 'hapusSpjPd']);

    // SKP
    Route::get('/skp/info-pengajuan-skp', [InfoPengajuanSKPController::class, 'index'])->name('skp.index');
    Route::get('/skp/pengajuan-skp', [PengajuanSkpController::class, 'create'])->name('skp.create');
    Route::get('/skp/info-pengajuan-skp/detail', [DetailPengajuanSkpController::class, 'index'])->name('skp.detail');

    // Tim Keuangan

    Route::get('/tim-keuangan/konfirmasi-spj', [KonfirmasiSPjController::class, 'index'])->name('konfirmasipengajuanspj.index');
    Route::get('/tim-keuangan/konfirmasi-spj/detail-spj', [KonfirmasiSPjController::class, 'detail'])->name('konfirmasipengajuanspj.detail');
    Route::get('/tim-keuangan/konfirmasi-spj/{spj}', [KonfirmasiSPjController::class,'show'])->middleware('auth')->name('konfirmasi-spj.show');
    Route::post('/setujui-spj/{spj}', [DetailSpjController::class, 'changeStatusSetuju']);
    Route::post('/tolak-spj/{spj}', [DetailSpjController::class, 'changeStatusTolak']);
    Route::post('/transfer-spj/{spj}', [DetailSpjController::class, 'konfirmasiTransferSpj']);
    Route::get('/download-spj-pdf/{spj}', [DetailSpjController::class, 'donwloadPdfSpj']);

    Route::get('/tim-keuangan/konfirmasi-spjtr/{spj}', [KonfirmasiSPjController::class,'showtr'])->middleware('auth')->name('konfirmasi-spjtr.show');
    Route::post('/tim-keuangan/konfirmasi-spjtr/setujui-spj/{spj}', [DetailSpjController::class, 'changeStatusSetujuTr']);
    Route::post('/tim-keuangan/konfirmasi-spjtr/tolak-spj/{spj}', [DetailSpjController::class, 'changeStatusTolakTr']);
    Route::post('/tim-keuangan/konfirmasi-spjtr/transfer-spj/{spj}', [DetailSpjController::class, 'konfirmasiTransferSpjTr']);
    Route::get('/tim-keuangan/konfirmasi-spjtr/download-spj-pdf/{spj}', [DetailSpjController::class, 'donwloadPdfSpjTr']);

    Route::get('/tim-keuangan/konfirmasi-spjpd/{spj}', [KonfirmasiSPjController::class,'showpd'])->middleware('auth')->name('konfirmasi-spjpd.show');
    Route::post('/tim-keuangan/konfirmasi-spjpd/setujui-spj/{spj}', [DetailSpjController::class, 'changeStatusSetujuPd']);
    Route::post('/tim-keuangan/konfirmasi-spjpd/tolak-spj/{spj}', [DetailSpjController::class, 'changeStatusTolakPd']);
    Route::post('/tim-keuangan/konfirmasi-spjpd/transfer-spj/{spj}', [DetailSpjController::class, 'konfirmasiTransferSpjPd']);
    Route::get('/tim-keuangan/konfirmasi-spjpd/download-spj-pdf/{spj}', [DetailSpjController::class, 'donwloadPdfSpjPd']);



    Route::get('/dashboard/tim-keuangan/konfirmasi-skp', [KonfirmasiSKpController::class, 'index'])->name('konfirmasipengajuanskp.index');
    Route::get('/dashboard/tim-keuangan/konfirmasi-skp/detail-skp', [KonfirmasiSKpController::class, 'detail'])->name('konfirmasipengajuanskp.detail');
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

Route::middleware(['can:admin', 'formatUserName'])->prefix('/dashboard/administrator/pegawai')->name('admin.')->group(function () {
    // Administrator
    Route::get('/', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/tambah', [PegawaiController::class, 'create'])->name('pegawai.add');
});

Route::middleware(['can:pbj', 'formatUserName'])->group(function () {
    // PBJ
    Route::get('/dashboard/pbj/updating-status', [UpdatingStatusPBJController::class, 'index'])->name('updatingstatuspbj.index');
    Route::get('/dashboard/pbj/updating-status/details/{id}', [UpdatingStatusPBJController::class, 'details'])->name('updatingstatuspbj.details');
    Route::get('/dashboard/pbj/updating-status/download/{nama_dokumen}/{id}', [UpdatingStatusPBJController::class, 'download'])->name('updatingstatuspbj.download');
    Route::get('/dashboard/pbj/updating-status/upload-files', [UpdatingStatusPBJController::class, 'uploadFiles'])->name('updatingstatuspbj.upload-files');
});

Route::middleware(['can:ppk', 'formatUserName'])->prefix('dashboard')->group(function () {
    // PPK
    Route::get('/dashboard/ppk/updating-status', [UpdatingStatusPPKController::class, 'index'])->name('updatingstatusppk.index');
    Route::get('/dashboard/ppk/updating-status/details/{id}', [UpdatingStatusPPKController::class, 'details'])->name('updatingstatusppk.details');
    Route::get('/dashboard/ppk/updating-status/download/{nama_dokumen}/{id}', [UpdatingStatusPPKController::class, 'download'])->name('updatingstatusppk.download');
    Route::get('/dashboard/ppk/updating-status/upload-files', [UpdatingStatusPPKController::class, 'uploadFiles'])->name('updatingstatusppk.upload-files');
    Route::post('/upload-dokumen', [DokumenController::class, 'uploadDokumen'])->name('upload.dokumen');
});


require __DIR__ . '/auth.php';
