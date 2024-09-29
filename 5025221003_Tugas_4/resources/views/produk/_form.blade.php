<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
        Nama Produk
    </label>
    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('nama') border-red-500 @enderror" id="nama" type="text" name="nama" value="{{ old('nama', $produk->nama ?? '') }}" required>
    @error('nama')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
        Deskripsi
    </label>
    <textarea class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('deskripsi') border-red-500 @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="harga">
        Harga
    </label>
    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('harga') border-red-500 @enderror" id="harga" type="number" name="harga" value="{{ old('harga', isset($produk) ? number_format($produk->harga,0,".","") : '') }}" required>
    @error('harga')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="kategori_id">
        Kategori
    </label>
    <select class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('kategori_id') border-red-500 @enderror" id="kategori_id" name="kategori_id" required>
        <option value="">Pilih Kategori</option>
        @foreach($kategoris as $kategori)
        <option value="{{ $kategori->id }}" {{ old('kategori_id', $produk->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>
            {{ $kategori->nama }}
        </option>
        @endforeach
    </select>
    @error('kategori_id')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="flex items-center justify-between">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        {{ $submitButtonText }}
    </button>
    <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('produk.index') }}">
        Batal
    </a>
</div>
