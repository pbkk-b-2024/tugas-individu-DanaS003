<!-- resources/views/kategori/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>

    <form action="{{ route('kategori.update', $kategori) }}" method="POST" class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        @include('kategori._form', ['submitButtonText' => 'Update Kategori'])
    </form>
</div>
@endsection
