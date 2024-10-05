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
use App\Http\Controllers\FileController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\FileAccessController;
use App\Http\Controllers\UserAvatarController;
use App\Http\Controllers\UploadController;

// Routes untuk autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    // Mengubah route redirect setelah login ke pengguna.index
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');

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

Route::get('/file/check', [FileController::class, 'checkFile']);
Route::post('/file/upload', [FileController::class, 'storeFile']);
Route::get('/file/get', [FileController::class, 'getFile']);
Route::get('/file/download', [FileController::class, 'downloadFile']);

Route::delete('/file/delete', [FileController::class, 'deleteFile']);
Route::post('/directory/create', [DirectoryController::class, 'createDirectory']);
Route::delete('/directory/delete', [DirectoryController::class, 'deleteDirectory']);
Route::get('/file/url', [FileAccessController::class, 'getFileUrl']);
Route::get('/file/temp-url', [FileAccessController::class, 'getTemporaryFileUrl']);

Route::post('/avatar/update', [UserAvatarController::class, 'update']);

// Redirect root ke pengguna jika sudah login, atau ke halaman login jika belum
Route::get('/', function () {
    return Auth::user() ? redirect()->route('pengguna.index') : redirect()->route('login');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/upload', [UploadController::class, 'upload'])->name('upload');

Route::get('/upload', [UploadController::class, 'showUploadForm']);
Route::post('/upload', [UploadController::class, 'upload'])->name('upload');
