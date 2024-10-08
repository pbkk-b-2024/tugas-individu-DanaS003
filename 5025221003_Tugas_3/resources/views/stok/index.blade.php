@extends('layouts.app')

@section('title', 'Manajemen Stok - POS Sederhana')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Manajemen Stok</h2>
    </div>

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Produk</th>
                    <th class="py-3 px-6 text-right">Jumlah</th>
                    <th class="py-3 px-6 text-left">Lokasi</th>
                    <th class="py-3 px-6 text-left">Tanggal Kadaluarsa</th>
                    <th class="py-3 px-6 text-left">Batch Number</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($stoks as $stok)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $stok->produk->nama }}</td>
                    <td class="py-3 px-6 text-right">{{ $stok->jumlah }}</td>
                    <td class="py-3 px-6 text-left">{{ $stok->lokasi_penyimpanan }}</td>
                    <td class="py-3 px-6 text-left">{{ $stok->tanggal_kadaluarsa }}</td>
                    <td class="py-3 px-6 text-left">{{ $stok->batch_number }}</td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <a href="{{ route('stok.edit', $stok->id) }}" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                            {{-- <form action="{{ route('stok.destroy', $stok->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus stok ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            </form> --}}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $stoks->links('layouts.pagination') }}
    </div>
</div>
@endsection
