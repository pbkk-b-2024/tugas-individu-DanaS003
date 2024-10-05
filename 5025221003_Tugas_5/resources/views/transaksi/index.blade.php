<!-- resources/views/transaksi/index.blade.php -->
@extends('layouts.app')

@section('title', 'Daftar Transaksi - POS Sederhana')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Daftar Transaksi</h2>
    <form action="{{ route('transaksi.list') }}" method="GET" class="mb-6">
        @else
        <form action="{{ route('transaksi.index') }}" method="GET" class="mb-6">
            @endif
            <div class="flex flex-wrap -mx-2 mb-4">
                <div class="w-full md:w-1/4 px-2 mb-4">
                    <input type="text" name="search" placeholder="Cari ID atau nama pembeli..." class="w-full px-3 py-2 border rounded-lg" value="{{ request('search') }}">
                </div>
                <div class="w-full md:w-1/4 px-2 mb-4">
                    <select name="status" class="w-full px-3 py-2 border rounded-lg">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="batal" {{ request('status') == 'batal' ? 'selected' : '' }}>Batal</option>
                    </select>
                </div>
                <div class="w-full md:w-1/4 px-2 mb-4">
                    <input type="date" name="date_from" placeholder="Dari Tanggal" class="w-full px-3 py-2 border rounded-lg" value="{{ request('date_from') }}">
                </div>
                <div class="w-full md:w-1/4 px-2 mb-4">
                    <input type="date" name="date_to" placeholder="Sampai Tanggal" class="w-full px-3 py-2 border rounded-lg" value="{{ request('date_to') }}">
                </div>
            </div>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">
                Filter
            </button>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Pembeli</th>
                        <th class="py-3 px-6 text-right">Total</th>
                        <th class="py-3 px-6 text-center">Status</th>
                        <th class="py-3 px-6 text-center">Tanggal</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($transaksis as $transaksi)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $transaksi->id }}</td>
                        <td class="py-3 px-6 text-left">{{ $transaksi->user->name }}</td>
                        <td class="py-3 px-6 text-right">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
                        <div class="hidden bg-green-200 text-green-600"></div>
                        <div class="hidden bg-yellow-200 text-yellow-600"></div>
                        <div class="hidden bg-red-200 text-red-600"></div>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-{{ $transaksi->status == 'selesai' ? 'green' : ($transaksi->status == 'pending' ? 'yellow' : 'red') }}-200 text-{{ $transaksi->status == 'selesai' ? 'green' : ($transaksi->status == 'pending' ? 'yellow' : 'red') }}-600 py-1 px-3 rounded-full text-xs">
                                {{ ucfirst($transaksi->status) }}
                            </span>
                        </td>
                        <td class="py-3 px-6 text-center">{{ $transaksi->created_at->format('d/m/Y H:i') }}</td>
                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $transaksis->links() }}
        </div>
</div>
@endsection
