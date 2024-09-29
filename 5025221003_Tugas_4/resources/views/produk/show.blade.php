@extends('layouts.app')

@section('title', 'Detail Produk - ' . $produk->nama)

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">{{ $produk->nama }}</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Deskripsi</h3>
                <p class="text-gray-700">{{ $produk->deskripsi }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Harga</h3>
                <p class="text-2xl font-bold text-blue-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Stok</h3>
                <p class="text-gray-700">{{ $produk->stok }} tersedia</p>
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Kategori</h3>
                <p class="text-gray-700">{{ $produk->kategori->nama }}</p>
            </div>

            <form action="{{ route('keranjang.tambah') }}" method="POST">
                @csrf
                @if(auth()->user()->role == "pembeli")
                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah">
                        Jumlah
                    </label>
                    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" id="jumlah" type="number" name="jumlah" value="1" min="1" max="{{ $produk->stok }}" required>
                </div>
                @endif

                <div class="flex items-center justify-between">
                    @if(auth()->user()->role == "pembeli")
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Tambah ke Keranjang
                    </button>
                    @endif
                    @if(auth()->user()->role == "pembeli")
                    <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('produk.list') }}">
                        Semua Produk
                    </a>
                    @else
                    <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('produk.index') }}">
                        Kembali
                    </a>
                    @endif
                </div>
            </form>
        </div>

        <div>
            <h3 class="text-xl font-bold mb-4">Ulasan Produk</h3>
            @if($produk->ulasans->count() > 0)
            @foreach($produk->ulasans as $ulasan)
            <div class="mb-4 p-4 border rounded-lg">
                <div class="flex items-center mb-2">
                    @for($i = 1; $i <= 5; $i++) @if($i <=$ulasan->rating)
                        <svg class="w-5 h-5 text-yellow-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" /></svg>
                        @else
                        <svg class="w-5 h-5 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" /></svg>
                        @endif
                        @endfor
                        <span class="ml-2 text-gray-600">{{ $ulasan->rating }}/5</span>
                </div>
                <p class="text-gray-700">{{ $ulasan->komentar }}</p>
                <p class="text-sm text-gray-500 mt-2">Oleh: {{ $ulasan->user->name }} pada {{ $ulasan->created_at->format('d M Y H:i') }}</p>
            </div>
            @endforeach
            @else
            <p class="text-gray-600">Belum ada ulasan untuk produk ini.</p>
            @endif
        </div>
    </div>
</div>
@endsection
