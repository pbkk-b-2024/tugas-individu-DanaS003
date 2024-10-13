<!-- resources/views/produk/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Ubah Produk - POS Sederhana')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Ubah Produk </h1>

    <form action="{{ route('produk.update', $produk->id) }}" method="POST" class="w-full bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('produk._form', ['submitButtonText' => 'Simpan'])
    </form>
</div>
@endsection
