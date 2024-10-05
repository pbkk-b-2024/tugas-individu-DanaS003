<!-- resources/views/produk/form.blade.php -->
@extends('layouts.app')

@section('title', isset($produk) ? 'Edit Produk - POS Sederhana' : 'Tambah Produk - POS Sederhana')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">{{ isset($produk) ? 'Edit Produk' : 'Tambah Produk' }}</h2>

    <form action="{{ isset($produk) ? route('produk.update', $produk->id) : route('produk.store') }}" method="POST">
        @csrf
        @if(isset($produk))
        @method('PUT')
        @endif

        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Produk</label>
            <input type="text" name="nama" id="nama" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" value="{{ old('nama', $produk->nama ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="harga" class="block text-gray-700 font-bold mb-2">Harga</label>
            <input type="number" name="harga" id="harga" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" value="{{ old('harga', $produk->harga ?? '') }}" required min="0" step="0.01">
        </div>

        <div class="mb-4">
            <label for="stok" class="block text-gray-700 font-bold mb-2">Stok</label>
            <input type="number" name="stok" id="stok" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" value="{{ old('stok', $produk->stok ?? '') }}" required min="0">
        </div>

        <div class="mb-6">
            <label for="kategori_id" class="block text-gray-700 font-bold mb-2">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ (old('kategori_id', $produk->kategori_id ?? '') == $kategori->id) ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring">
                {{ isset($produk) ? 'Update Produk' : 'Tambah Produk' }}
            </button>
            <a href="{{ route('produk.index') }}" class="text-gray-600 hover:text-gray-800">Batal</a>
        </div>
    </form>
</div>
@endsection
