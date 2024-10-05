<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('title', 'Masuk - POS Sederhana')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Masuk</h2>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Oops!</strong>
        @error('email')
        <span class="block">{{ $message }}</span>
        @enderror
    </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block mb-2 font-bold text-gray-700">Email</label>
            <input type="email" id="email" name="email" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" value="{{ old('email') }}">
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 font-bold text-gray-700">Kata Sandi</label>
            <input type="password" id="password" name="password" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        </div>
        {{-- <div class="flex items-center justify-between mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="mr-2">
                <span class="text-sm text-gray-700">Ingat saya</span>
            </label>
            <a href="#" class="text-sm text-blue-600 hover:underline">Lupa kata sandi?</a>
        </div> --}}
        <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring">
            Masuk
        </button>
    </form>
    <p class="mt-4 text-center text-sm text-gray-600">
        Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
    </p>
</div>
@endsection
