<!-- resources/views/dashboard/petugas.blade.php -->
@extends('layouts.app')

@section('title', 'Petugas Dashboard - POS Sederhana')

@section('header', 'Petugas Dashboard')

@section('content')
{{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Penjualan Hari Ini
                        </dt>
                        <dd class="text-lg font-medium text-gray-900">
                            Rp {{ number_format($totalPenjualanHariIni, 0, ',', '.') }}
</dd>
</dl>
</div>
</div>
</div>
</div>
</div> --}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Produk Terlaris</h3>
            <div class="mt-5">
                <ul class="divide-y divide-gray-200">
                    @foreach ($produkTerlaris as $produk)
                    <li class="py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{ $produk->nama }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Terjual: {{ $produk->detail_transaksis_count }}
                                </p>
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
            <h3 class="text-lg leading-6 font-medium text-gray-900">Stok Menipis</h3>
            <div class="mt-5">
                <ul class="divide-y divide-gray-200">
                    @foreach ($stokMenipis as $produk)
                    <li class="py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{ $produk->nama }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Stok: {{ $produk->stok }}
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('stok.index') }}" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Update Stok
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
