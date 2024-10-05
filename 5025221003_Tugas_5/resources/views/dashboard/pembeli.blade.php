<!-- resources/views/dashboard/pembeli.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Pembeli - POS Sederhana')

@section('header', 'Dashboard Pembeli')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Transaksi Terbaru Anda</h3>
            <div class="mt-5">
                <ul class="divide-y divide-gray-200">
                    @foreach ($transaksiTerbaru as $transaksi)
                    <li class="py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    Transaksi #{{ $transaksi->id }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Total: Rp {{ number_format($transaksi->total, 0, ',', '.') }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Tanggal: {{ $transaksi->created_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                            <div>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $transaksi->status }}
                                </span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Produk Terbaru</h3>
            <div class="mt-5 grid grid-cols-2 gap-4">
                @foreach ($produkTerbaru as $produk)
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="text-sm font-medium text-gray-900">{{ $produk->nama }}</h4>
                    <p class="text-sm text-gray-500">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    <a href="{{ route('produk.show', $produk->id) }}" class="mt-2 inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Lihat Detail
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="mt-8">
    <a href="{{ route('produk.list') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Lihat Semua Produk
    </a>
</div>
@endsection
