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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardHomeController::class, 'index'])->name('home.index');
    Route::get('/dashboard/profile', [DashboardProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/dashboard/profile', [DashboardProfileController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profile', [DashboardProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
