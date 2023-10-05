<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\Unit\UnitController;
use App\Http\Controllers\Dashboard\Administrator\UsersController;
use App\Http\Controllers\Dashboard\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Administrator\MenuSubmenuController;

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
    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');
    Route::patch('/dashboard/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard/administrator/users', [UsersController::class, 'index'])->name('users.index');

    Route::get('/dashboard/administrator/menu-submenu', [MenuSubmenuController::class, 'index'])->name('menusubmenu.index');

    Route::get('/dashboard/unit', [UnitController::class, 'index'])->name('unit.index');
});

require __DIR__.'/auth.php';
