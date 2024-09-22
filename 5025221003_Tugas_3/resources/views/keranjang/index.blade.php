<!-- resources/views/keranjang/index.blade.php -->
@extends('layouts.app')

@section('title', 'Keranjang Belanja - POS Sederhana')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Keranjang Belanja</h2>

    @if ($keranjang && $keranjang->detailKeranjangs->count() > 0)
    <div class="overflow-x-auto mb-6">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Produk</th>
                    <th class="py-3 px-6 text-right">Harga</th>
                    <th class="py-3 px-6 text-center">Jumlah</th>
                    <th class="py-3 px-6 text-right">Subtotal</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($keranjang->detailKeranjangs as $item)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $item->produk->nama }}</td>
                    <td class="py-3 px-6 text-right">Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                    <td class="py-3 px-6 text-center">{{ $item->jumlah }}</td>
                    <td class="py-3 px-6 text-right">Rp {{ number_format($item->produk->harga * $item->jumlah, 0, ',', '.') }}</td>
                    <td class="py-3 px-6 text-center">
                        <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-full text-xs hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-between items-center">
        <div class="text-xl font-bold">
            Total: Rp {{ number_format($keranjang->detailKeranjangs->sum(function($item) { return $item->produk->harga * $item->jumlah; }), 0, ',', '.') }}
        </div>
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                Checkout
            </button>
        </form>
    </div>

    <div class="mt-6">
        <a href="{{ route('produk.list') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">Kembali Belanja</a>
    </div>
    @else
    <p class="text-gray-600">Keranjang belanja Anda kosong.</p>
    <div class="mt-4">
        <a href="{{ route('produk.list') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">Belanja Sekarang</a>
    </div>
    @endif
</div>
@endsection
