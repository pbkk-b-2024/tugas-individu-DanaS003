<!-- resources/views/kategori/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Kategori Baru</h1>

    <form action="{{ route('kategori.store') }}" method="POST" class="rounded-xl bg-white shadow-md px-8 pt-6 pb-8 mb-4">
        @csrf
        @include('kategori._form', ['submitButtonText' => 'Tambah Kategori'])
    </form>
</div>
@endsection
