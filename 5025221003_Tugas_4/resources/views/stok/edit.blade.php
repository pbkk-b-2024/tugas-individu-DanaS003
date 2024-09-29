@extends('layouts.app')

@section('title', 'Ubah Stok - POS Sederhana')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Ubah Stok</h1>

    <form action="{{ route('stok.update', $stok->id) }}" method="POST" class="w-full bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        @include('stok._form', ['submitButtonText' => 'Simpan'])
    </form>
</div>
@endsection
