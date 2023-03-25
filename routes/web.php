<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenyuluhController;
use App\Http\Controllers\KontrasepsiController;

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

Route::get('/', [HomeController::class, 'index']);






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/edit_utama', function () {
        return view('edit/edit_utama');
    });
    Route::get('/edit_program',  [ProgramController::class, 'index']);
    Route::post('/edit_program',  [ProgramController::class, 'create']);
    Route::get('/delete_program/{id}',  [ProgramController::class, 'delete']);
    Route::get('/tampilkan_program/{id}',  [ProgramController::class, 'tampilkan']);
    Route::post('/update_program/{id}',  [ProgramController::class, 'update']);

    Route::get('/edit_penyuluh',  [PenyuluhController::class, 'index']);
    Route::post('/edit_penyuluh',  [PenyuluhController::class, 'create']);
    Route::get('/delete_penyuluh/{id}',  [PenyuluhController::class, 'delete']);

    Route::get('/edit_pengguna',  [PenggunaController::class, 'index']);
    Route::get('/tambah_pengguna',  [PenggunaController::class, 'index2']);
    Route::post('/tambah_pengguna',  [PenggunaController::class, 'create']);
    Route::get('/delete_pengguna/{id}',  [PenggunaController::class, 'delete']);
    Route::get('/export_pengguna',  [PenggunaController::class, 'export']);
    Route::get('/tampilkan_pengguna/{id}',  [PenggunaController::class, 'tampilkan']);
    Route::post('/update_pengguna/{id}',  [PenggunaController::class, 'update']);
});



require __DIR__.'/auth.php';
