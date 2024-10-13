<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return $this->adminDashboard();
        } elseif (Auth::user()->hasRole('petugas')) {
            return $this->petugasDashboard();
        } else {
            return $this->pembeliDashboard();
        }
    }

    private function adminDashboard()
    {
        $totalPenjualan = Transaksi::where('status', 'selesai')->sum('total');
        $totalProduk = Produk::count();
        $totalPengguna = User::count();
        $totalTransaksi = Transaksi::count();
        $transaksiTerbaru = Transaksi::with('user')->latest()->take(5)->get();

        return view('dashboard.admin', compact('totalPenjualan', 'totalProduk', 'totalPengguna', 'totalTransaksi', 'transaksiTerbaru'));
    }

    private function petugasDashboard()
    {
        $totalPenjualanHariIni = Transaksi::whereDate('created_at', today())->where('status', 'selesai')->sum('total');
        $produkTerlaris = Produk::withCount('detailTransaksis')->orderByDesc('detail_transaksis_count')->take(5)->get();
        $stokMenipis = Produk::where('stok', '<=', 10)->get();

        return view('dashboard.petugas', compact('totalPenjualanHariIni', 'produkTerlaris', 'stokMenipis'));
    }

    private function pembeliDashboard()
    {
        $transaksiTerbaru = Transaksi::where('user_id', Auth::id())->latest()->take(5)->get();
        $produkTerbaru = Produk::latest()->take(6)->get();

        return view('dashboard.pembeli', compact('transaksiTerbaru', 'produkTerbaru'));
    }
}
