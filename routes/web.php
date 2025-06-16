<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halaman_utama', function () {
    return view('halaman_utama');
});

// Routing Pengguna
Route::get('/pengguna/show', [PenggunaController::class, 'show'])->name('pengguna.show');
Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
Route::post('/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
Route::get('/pengguna/{id}', [PenggunaController::class, 'view'])->name('pengguna.view');
Route::get('/pengguna', [PenggunaController::class, 'search'])->name('pengguna.search');