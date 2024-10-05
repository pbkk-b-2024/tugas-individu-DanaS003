<!-- resources/views/dashboard/index.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard - POS Sederhana')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-blue-100 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Penjualan Hari Ini</h3>
            <p class="text-3xl font-bold">Rp {{ number_format($totalPenjualanHariIni, 0, ',', '.') }}</p>
        </div>
        <div class="bg-green-100 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Transaksi Hari Ini</h3>
            <p class="text-3xl font-bold">{{ $totalTransaksiHariIni }}</p>
        </div>
        <div class="bg-yellow-100 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Stok Menipis</h3>
            <p class="text-3xl font-bold">{{ $stokMenipis->count() }}</p>
        </div>
        <div class="bg-purple-100 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Total Pelanggan</h3>
            <p class="text-3xl font-bold">{{ $totalPelanggan }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-xl font-semibold mb-4">Produk Terlaris (30 hari terakhir)</h3>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Nama Produk</th>
                        <th class="py-3 px-6 text-right">Total Terjual</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($produkTerlaris as $produk)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $produk->nama }}</td>
                        <td class="py-3 px-6 text-right">{{ $produk->total_terjual }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h3 class="text-xl font-semibold mb-4">Stok Menipis</h3>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Nama Produk</th>
                        <th class="py-3 px-6 text-right">Stok Tersisa</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($stokMenipis as $produk)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $produk->nama }}</td>
                        <td class="py-3 px-6 text-right">{{ $produk->stok }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
