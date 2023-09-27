<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardHomeController;
use App\Http\Controllers\Dashboard\DashboardProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'formatUserName'])->group(function () {
    Route::get('/dashboard', [DashboardHomeController::class, 'index'])->name('home.index');
    Route::get('/dashboard/profile', [DashboardProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/dashboard/profile', [DashboardProfileController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profile', [DashboardProfileController::class, 'destroy'])->name('profile.destroy');
});


// Require the auth.php fortify routes file
require __DIR__.'/auth.php';