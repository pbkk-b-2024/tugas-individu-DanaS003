<!-- resources/views/kategori/_form.blade.php -->
<div class="mb-4">
    <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Kategori</label>
    <input type="text" name="nama" id="nama" value="{{ old('nama', $kategori->nama ?? '') }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('nama') border-red-500 @enderror" required>
    @error('nama')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="flex items-center justify-between">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        {{ $submitButtonText }}
    </button>
    <a href="{{ route('kategori.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Batal
    </a>
</div>
