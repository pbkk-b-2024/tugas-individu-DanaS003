<!-- resources/views/produk/list.blade.php -->
@extends('layouts.app')

@section('title', 'Daftar Produk - POS Sederhana')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Daftar Produk</h2>

    <form action="{{ route('produk.filter') }}" method="GET" class="mb-6">
        <div class="flex flex-wrap -mx-2 mb-4">
            <div class="w-full md:w-1/3 px-2 mb-4">
                <input type="text" name="search" placeholder="Cari produk..." class="w-full px-3 py-2 border rounded-lg" value="{{ request('search') }}">
            </div>
            <div class="w-full md:w-1/3 px-2 mb-4">
                <select name="kategori" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="w-full md:w-1/3 px-2 mb-4">
                <div class="flex space-x-2">
                    <input type="number" name="min_harga" placeholder="Harga Min" class="w-1/2 px-3 py-2 border rounded-lg" value="{{ request('min_harga') }}">
                    <input type="number" name="max_harga" placeholder="Harga Max" class="w-1/2 px-3 py-2 border rounded-lg" value="{{ request('max_harga') }}">
                </div>
            </div>
        </div>
        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">
            Filter
        </button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($produks as $produk)
        <div class="bg-white rounded-lg shadow-md overflow-hidden ring-1 ring-gray-200">
            <div class="p-4">
                <a href="{{ route('produk.show', $produk->id) }}" class="hover:text-blue-500 w-fit">
                    <h3 class="text-xl font-semibold mb-2 w-fit">{{ $produk->nama }}</h3>
                </a>
                @if($produk->image)
                <a href="{{ route('produk.show', $produk->id) }}">
                    <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->nama }}" class="mt-3 w-full h-64 object-cover mb-4 rounded-lg">
                </a>
                @endif
                <p class="text-gray-600 mb-2">{{ $produk->deskripsi }}</p>
                <p class="text-lg font-bold text-blue-600 mb-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-500 mb-4">Stok: {{ $produk->stoks->sum('jumlah') }}</p>
                <form action="{{ route('keranjang.tambah') }}" method="POST">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                    <div class="flex items-center mb-4">
                        <label for="jumlah" class="mr-2">Jumlah:</label>
                        <input type="number" name="jumlah" id="jumlah" min="1" max="{{ $produk->stok }}" value="1" class="w-16 px-2 py-1 border rounded">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 w-full">
                        Tambah ke Keranjang
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $filtered ? $produks->appends(request()->query())->links('layouts.pagination') : $produks->links('layouts.pagination') }}
    </div>
</div>
@endsection
