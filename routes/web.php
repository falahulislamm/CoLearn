<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PeminatanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routing Pengguna
    Route::get('/pengguna/show', [PenggunaController::class, 'show'])->name('pengguna.show');
    Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
    Route::get('/pengguna/{id}', [PenggunaController::class, 'view'])->name('pengguna.view');
    Route::get('/pengguna', [PenggunaController::class, 'search'])->name('pengguna.search');

    // Routing Jurusan
    Route::get('/jurusan/show', [JurusanController::class, 'show'])->name('jurusan.show');
    Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('/jurusan/store', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
    Route::get('/jurusan/{id}', [JurusanController::class, 'view'])->name('jurusan.view');
    Route::get('/jurusan', [JurusanController::class, 'search'])->name('jurusan.search');

    // Routing Peminatan
    Route::get('/peminatan/show', [PeminatanController::class, 'show'])->name('peminatan.show');
    Route::get('/peminatan/create', [PeminatanController::class, 'create'])->name('peminatan.create');
    Route::post('/peminatan/store', [PeminatanController::class, 'store'])->name('peminatan.store');
    Route::get('/peminatan/{id}/edit', [PeminatanController::class, 'edit'])->name('peminatan.edit');
    Route::delete('/peminatan/{id}', [PeminatanController::class, 'destroy'])->name('peminatan.destroy');
    Route::get('/peminatan/{id}', [PeminatanController::class, 'view'])->name('peminatan.view');
    Route::get('/peminatan', [PeminatanController::class, 'search'])->name('peminatan.search');

    // Routing Admin
    Route::get('/admin/show', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/{id}', [AdminController::class, 'view'])->name('admin.view');
    Route::get('/admin', [AdminController::class, 'search'])->name('admin.search');

    // Routing Diskusi
    Route::get('/diskusi/show', [DiskusiController::class, 'show'])->name('diskusi.show');
    Route::get('/diskusi/create', [DiskusiController::class, 'create'])->name('diskusi.create');
    Route::post('/diskusi/store', [DiskusiController::class, 'store'])->name('diskusi.store');
    Route::get('/diskusi/{id}/edit', [DiskusiController::class, 'edit'])->name('diskusi.edit');
    Route::delete('/diskusi/{id}', [DiskusiController::class, 'destroy'])->name('diskusi.destroy');
    Route::get('/diskusi/{id}', [DiskusiController::class, 'view'])->name('diskusi.view');
    Route::get('/diskusi', [DiskusiController::class, 'search'])->name('diskusi.search');

    // Routing Comment
    Route::get('/comment/show', [CommentController::class, 'show'])->name('comment.show');
    Route::get('/comment/create', [CommentController::class, 'create'])->name('comment.create');
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::get('/comment/{id}', [CommentController::class, 'view'])->name('comment.view');
    Route::get('/comment', [CommentController::class, 'search'])->name('comment.search');

    Route::get('/halaman_utama', function () {
    return view('halaman_utama');
});

});

require __DIR__.'/auth.php';
