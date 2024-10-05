<!-- resources/views/pengguna/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Pengguna - POS Sederhana')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Edit Pengguna</h1>

    <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST" class="rounded-xl bg-white shadow-md px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        @include('pengguna._form')

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Perbarui Pengguna
            </button>
            <a href="{{ route('pengguna.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline800">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
