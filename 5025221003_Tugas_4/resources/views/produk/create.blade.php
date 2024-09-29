<!-- resources/views/produk/create.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Produk Baru - POS Sederhana')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Produk Baru</h1>

    <form action="{{ route('produk.store') }}" method="POST" class="w-full bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
        @csrf
        @include('produk._form', ['submitButtonText' => 'Tambah Produk'])
    </form>
</div>
@endsection
