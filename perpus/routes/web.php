<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Halaman Awal
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});


/*
|--------------------------------------------------------------------------
| Autentikasi
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| Halaman Utama Setelah Login
|--------------------------------------------------------------------------
*/
Route::get('/perpus', [PerpusController::class, 'index'])
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| CRUD Buku, Anggota, Pinjam
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Buku
    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/buku/add', [BukuController::class, 'add']);
    Route::post('/buku/save', [BukuController::class, 'save']);
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
    Route::get('/buku/delete/{id}', [BukuController::class, 'delete']);

    // Anggota
    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::get('/anggota/add', [AnggotaController::class, 'add']);
    Route::post('/anggota/save', [AnggotaController::class, 'save']);
    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
    Route::get('/anggota/delete/{id}', [AnggotaController::class, 'delete']);

    // Pinjam
    Route::get('/pinjam', [PinjamController::class, 'index']);
    Route::get('/pinjam/add', [PinjamController::class, 'add']);
    Route::post('/pinjam/save', [PinjamController::class, 'save']);
    Route::get('/pinjam/edit/{id}', [PinjamController::class, 'edit']);
    Route::get('/pinjam/delete/{id}', [PinjamController::class, 'delete']);
});
