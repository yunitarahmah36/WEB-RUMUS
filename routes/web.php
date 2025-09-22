<?php

use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\LegalitasController;
use App\Http\Controllers\ProdukPublicController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ----------  CRUD PUBLIC (untuk Frontend Wike) ----------
Route::get('/produk', [ProdukPublicController::class, 'index'])->name('produk.index');
Route::get('/produk/{produk:slug}', [ProdukPublicController::class, 'show'])->name('produk.show');

// ---------- CRUD ADMIN ----------
// Nyesuaiin login admin yang dibuat katim
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('kategoris', KategoriController::class)->only(['index','store','update','destroy']);
    Route::resource('legalitas', LegalitasController::class)->parameters(['legalitas' => 'legalita'])->only(['index','store','update','destroy']);
    Route::resource('produks', ProdukController::class);

    // manajemen gambar
    Route::delete('produks/{produk}/images/{image}', [ProdukController::class, 'deleteImage'])->name('produks.images.destroy');
    Route::patch('produks/{produk}/images/{image}/cover', [ProdukController::class, 'setCover'])->name('produks.images.cover');
});
