@extends('layouts.app')

@section('title', 'Detail Transaksi - POS Sederhana')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Detail Transaksi #{{ $transaksi->id }}</h2>

    <div class="mb-6">
        <p class="text-gray-600">Tanggal: {{ $transaksi->created_at->format('d/m/Y H:i') }}</p>
        <p class="text-gray-600">Status:
            <span class="bg-{{ $transaksi->status == 'selesai' ? 'green' : ($transaksi->status == 'pending' ? 'yellow' : 'red') }}-200 text-{{ $transaksi->status == 'selesai' ? 'green' : ($transaksi->status == 'pending' ? 'yellow' : 'red') }}-600 py-1 px-3 rounded-full text-xs">
                {{ ucfirst($transaksi->status) }}
            </span>
        </p>
        <p class="text-gray-600">Pembeli: {{ $transaksi->user->name }}</p>
    </div>

    <div class="overflow-x-auto mb-6">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Produk</th>
                    <th class="py-3 px-6 text-right">Harga</th>
                    <th class="py-3 px-6 text-center">Jumlah</th>
                    <th class="py-3 px-6 text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($transaksi->detailTransaksis as $detail)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $detail->produk->nama }}</td>
                    <td class="py-3 px-6 text-right">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                    <td class="py-3 px-6 text-center">{{ $detail->jumlah }}</td>
                    <td class="py-3 px-6 text-right">Rp {{ number_format($detail->harga * $detail->jumlah, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-right mb-6">
        <p class="text-xl font-bold">Total: Rp {{ number_format($transaksi->total, 0, ',', '.') }}</p>
    </div>

    @if(count($transaksi->ulasan) == 0)
    <div class="mb-6">
        <h3 class="text-lg font-bold mb-2">Berikan Ulasan</h3>
        <form action="{{ route('transaksi.ulasan', $transaksi->id) }}" method="POST">
            @csrf
            @foreach ($transaksi->detailTransaksis as $index => $detail)
            <div class="mb-6 p-4 border rounded">
                <h4 class="font-bold mb-2">{{ $detail->produk->nama }}</h4>
                <div class="mb-4">
                    <label for="rating_{{ $index }}" class="block text-sm font-medium text-gray-700">Rating</label>
                    <select name="rating[{{ $index }}]" id="rating_{{ $index }}" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 sm:text-sm">
                        @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}">{{ $i }} - {{ $i == 1 ? 'Sangat Buruk' : ($i == 2 ? 'Buruk' : ($i == 3 ? 'Cukup' : ($i == 4 ? 'Baik' : 'Sangat Baik'))) }}</option>
                            @endfor
                    </select>
                </div>
                <div class="mb-4">
                    <label for="komentar_{{ $index }}" class="block text-sm font-medium text-gray-700">Komentar</label>
                    <textarea name="komentar[{{ $index }}]" id="komentar_{{ $index }}" rows="3" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 sm:text-sm"></textarea>
                </div>
            </div>
            @endforeach
            <button type="submit" class="bg-emerald-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-emerald-600">Kirim Ulasan</button>
        </form>
    </div>
    @else
    <div class="mb-6">
        <h3 class="text-lg font-bold mb-2">Ulasan Anda</h3>
        @foreach($transaksi->ulasan as $ulasan)
        <div class="mb-4 p-4 border rounded-lg">
            <h3 class="mb-2 font-semibold">{{ $ulasan->produk->nama }}</h3>
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
        </div>
        @endforeach
    </div>
    @endif
    @else
    <div class="mb-6">
        <h3 class="text-lg font-bold mb-2">Ulasan Pembeli</h3>
        @if(count($transaksi->ulasan) > 0)
        @foreach($transaksi->ulasan as $ulasan)
        <div class="mb-4 p-4 border rounded-lg">
            <h3 class="mb-2 font-semibold">{{ $ulasan->produk->nama }}</h3>
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
        <p>Pembeli belum memberikan ulasan</p>
        @endif
    </div>
    @endif
</div>
@endsection
