<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Profil\ProfilController;
use App\Http\Controllers\Dashboard\Unit\PengajuanController;
use App\Http\Controllers\Dashboard\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Unit\DraftPengajuanController;
use App\Http\Controllers\Dashboard\Administrator\PegawaiController;
use App\Http\Controllers\Dashboard\PBJ\UpdatingStatusPBJController;
use App\Http\Controllers\Dashboard\Pengaturan\PengaturanController;
use App\Http\Controllers\Dashboard\PPK\UpdatingStatusPPKController;
use App\Http\Controllers\Dashboard\Administrator\MenuSubmenuController;
use App\Http\Controllers\Dashboard\KepalaBAU\KonfirmasiPengajuanController;
use App\Http\Controllers\Dashboard\SPJ\PengajuanSpjController;
use App\Http\Controllers\Dashboard\SPJ\InfoPengajuanSPJController;
use App\Http\Controllers\Dashboard\SPJ\DetailPengajuanSpjController;
use App\Http\Controllers\Dashboard\SKP\PengajuanSkpController;
use App\Http\Controllers\Dashboard\SKP\DetailPengajuanSkpController;
use App\Http\Controllers\Dashboard\SKP\InfoPengajuanSKPController;
use App\Http\Controllers\Dashboard\TimKeuangan\DetailSpjController;
use App\Http\Controllers\Dashboard\TimKeuangan\DetailSkpController;
use App\Http\Controllers\Dashboard\TimKeuangan\KonfirmasiSpjController;
use App\Http\Controllers\Dashboard\TimKeuangan\KonfirmasiSkpController;

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

    // Pengaturan
    Route::get('/dashboard/pengaturan', [PengaturanController::class, 'edit'])->name('pengaturan.edit');

    // Administrator
    Route::get('/dashboard/administrator/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/dashboard/administrator/pegawai/tambah', [PegawaiController::class, 'create'])->name('pegawai.create');

    Route::get('/dashboard/administrator/menu-submenu', [MenuSubmenuController::class, 'index'])->name('menusubmenu.index');

    // Unit
    Route::get('/dashboard/unit/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/dashboard/unit/pengajuan/tambah-pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.add');

    Route::get('/dashboard/unit/draft-pengajuan', [DraftPengajuanController::class, 'index'])->name('draftpengajuan.index');

    // PBJ
    Route::get('/dashboard/pbj/updating-status', [UpdatingStatusPBJController::class, 'index'])->name('updatingstatuspbj.index');

    // PPK
    Route::get('/dashboard/ppk/updating-status', [UpdatingStatusPPKController::class, 'index'])->name('updatingstatusppk.index');

    // Kepala BAU
    Route::get('/dashboard/kepala-bau/konfirmasi-pengajuan', [KonfirmasiPengajuanController::class, 'index'])->name('konfirmasipengajuan.index');

    // SPJ
    Route::get('/dashboard/spj/info-pengajuan-spj', [InfoPengajuanSPJController::class, 'index'])->name('infopengajuanspj.index');
    Route::get('/dashboard/spj/pengajuan-spj', [PengajuanSpjController::class, 'create'])->name('infopengajuanspj.create');
    Route::get('/dashboard/spj/info-pengajuan-spj/detail', [DetailPengajuanSpjController::class, 'index'])->name('detailpengajuanspj.detail');

    // SKP
    Route::get('/dashboard/skp/info-pengajuan-skp', [InfoPengajuanSKPController::class, 'index'])->name('infopengajuanskp.index');
    Route::get('/dashboard/skp/info-pengajuan-skp/detail', [DetailPengajuanSkpController::class, 'index'])->name('detailpengajuanskp.detail');
    Route::get('/dashboard/skp/pengajuan-skp', [PengajuanSkpController::class, 'create'])->name('infpengajuanskp.create');

    // Tim Keuangan
    Route::get('/dashboard/tim-keuangan/konfirmasi-spj', [KonfirmasiSPjController::class, 'index'])->name('konfirmasipengajuanspj.index');
    Route::get('/dashboard/tim-keuangan/konfirmasi-skp', [KonfirmasiSKpController::class, 'index'])->name('konfirmasipengajuanskp.index');
    Route::get('/dashboard/tim-keuangan/konfirmasi-spj/detail-spj', [DetailSpjController::class, 'index'])->name('konfirmasipengajuanspj.detail');
    Route::get('/dashboard/tim-keuangan/konfirmasi-skp/detail-skp', [DetailSkpController::class, 'index'])->name('konfirmasipengajuanskp.detail');
});

require __DIR__ . '/auth.php';
