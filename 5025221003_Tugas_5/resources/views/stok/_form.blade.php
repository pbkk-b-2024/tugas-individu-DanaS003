<div class="mb-4">
    {{-- <label class="block text-gray-700 text-sm font-bold mb-2" for="produk_id">
        Produk
    </label>
    <select class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('produk_id') border-red-500 @enderror" id="produk_id" name="produk_id" required>
        <option value="">Pilih Produk</option>
        @foreach($produks as $produk)
        <option value="{{ $produk->id }}" {{ old('produk_id', $stok->produk_id ?? '') == $produk->id ? 'selected' : '' }}>
    {{ $produk->nama }}
    </option>
    @endforeach
    </select> --}}
    <label class="block text-gray-700 text-sm font-bold mb-2" for="produk_id">
        Produk
    </label>
    <input value="{{ $stok->produk_id }}" class="hidden" id="produk_id" type="text" name="produk_id" />
    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('produk_id') border-red-500 @enderror" type="text" value="{{ $stok->produk->nama ?? '' }}" readonly />
    @error('produk_id')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah">
        Jumlah
    </label>
    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('jumlah') border-red-500 @enderror" id="jumlah" type="number" name="jumlah" value="{{ old('jumlah', $stok->jumlah ?? '') }}" required>
    @error('jumlah')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="lokasi_penyimpanan">
        Lokasi Penyimpanan
    </label>
    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('lokasi_penyimpanan') border-red-500 @enderror" id="lokasi_penyimpanan" type="text" name="lokasi_penyimpanan" value="{{ old('lokasi_penyimpanan', $stok->lokasi_penyimpanan ?? '') }}" required>
    @error('lokasi_penyimpanan')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_kadaluarsa">
        Tanggal Kadaluarsa
    </label>
    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('tanggal_kadaluarsa') border-red-500 @enderror" id="tanggal_kadaluarsa" type="date" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa', $stok->tanggal_kadaluarsa ?? '') }}" required>
    @error('tanggal_kadaluarsa')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="batch_number">
        Batch Number
    </label>
    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('batch_number') border-red-500 @enderror" id="batch_number" type="text" name="batch_number" value="{{ old('batch_number', $stok->batch_number ?? '') }}" required>
    @error('batch_number')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="flex items-center justify-between">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        {{ $submitButtonText }}
    </button>
    <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('stok.index') }}">
        Batal
    </a>
</div>
