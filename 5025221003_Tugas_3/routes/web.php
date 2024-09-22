<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\UlasanController;
use Illuminate\Support\Facades\Auth;

// Routes untuk autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Routes untuk admin dan petugas
    Route::middleware(['role:admin,petugas'])->group(function () {
        Route::resource('produk', ProdukController::class);
        Route::get('/produk-show/{produk}', [ProdukController::class, 'show'])->name('produk.detail');
        Route::resource('kategori', KategoriController::class);
        Route::resource('stok', StokController::class);
    });

    // Routes khusus untuk admin
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('pengguna', PenggunaController::class);
        Route::resource('transaksi', TransaksiController::class);
    });

    // Routes untuk pembeli
    Route::middleware(['role:pembeli'])->group(function () {
        Route::get('/produk-detail/{produk}', [ProdukController::class, 'show'])->name('produk.show');
        Route::get('/transaksi-list', [TransaksiController::class, 'list'])->name('transaksi.list');
        Route::get('/transaksi-detail/{transaksi}', [TransaksiController::class, 'detail'])->name('transaksi.detail');
        Route::post('/transaksi/ulasan/{transaksi}', [TransaksiController::class, 'ulasan'])->name('transaksi.ulasan');
        Route::get('/produk-filter', [ProdukController::class, 'filter'])->name('produk.filter');
        Route::get('/produk-list', [ProdukController::class, 'list'])->name('produk.list');
        Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
        Route::post('/keranjang/tambah', [KeranjangController::class, 'tambahProduk'])->name('keranjang.tambah');
        Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapusProduk'])->name('keranjang.hapus');
        Route::post('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');
        Route::resource('ulasan', UlasanController::class);
    });
});

// Redirect root ke dashboard jika sudah login, atau ke halaman login jika belum
Route::get('/', function () {
    return Auth::user() ? redirect()->route('dashboard') : redirect()->route('login');
});
