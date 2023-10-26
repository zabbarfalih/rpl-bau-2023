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
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'formatUserName'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home.index');

    // Profil
    Route::get('/dashboard/profil', [ProfilController::class, 'edit'])
    ->name('profile.edit');
    Route::patch('/dashboard/profil', [ProfilController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profil', [ProfilController::class, 'destroy'])->name('profile.destroy');

    // Pengaturan
    Route::get('/dashboard/pengaturan', [PengaturanController::class, 'edit'])->name('pengaturan.edit');

    // Administrator
    Route::get('/dashboard/administrator/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/dashboard/administrator/pegawai/tambah', [PegawaiController::class, 'create'])->name('pegawai.create');

    Route::get('/dashboard/administrator/menu-submenu', [MenuSubmenuController::class, 'index'])->name('menusubmenu.index');

    // Unit
    Route::get('/dashboard/unit/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/dashboard/unit/pengajuan/tambah-pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');

    Route::get('/dashboard/unit/draft-pengajuan', [DraftPengajuanController::class, 'index'])->name('draftpengajuan.index');

    // PBJ
    Route::get('/dashboard/pbj/updating-status', [UpdatingStatusPBJController::class, 'index'])->name('updatingstatuspbj.index');
    
    // PPK
    Route::get('/dashboard/ppk/updating-status', [UpdatingStatusPPKController::class, 'index'])->name('updatingstatusppk.index');
    
    // Kepala BAU
    Route::get('/dashboard/kepala-bau/konfirmasi-pengajuan', [KonfirmasiPengajuanController::class, 'index'])->name('konfirmasipengajuan.index');
});

require __DIR__.'/auth.php';
