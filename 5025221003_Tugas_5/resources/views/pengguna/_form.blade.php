<!-- resources/views/pengguna/_form.blade.php -->
<div class="mb-4">
    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
    <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('nama') border-red-500 @enderror" value="{{ old('name', $pengguna->name ?? '') }}" required>
    @error('nama')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
    <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('email') border-red-500 @enderror" value="{{ old('email', $pengguna->email ?? '') }}" required>
    @error('email')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

@if(!isset($pengguna))
<div class="mb-4">
    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('password') border-red-500 @enderror" required>
    @error('password')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('password') border-red-500 @enderror" required>
</div>
@else
<div class="mb-4">
    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('password') border-red-500 @enderror">
    @error('password')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>
@endif

<div class="mb-4">
    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Peran</label>
    <select name="role" id="role" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('role') border-red-500 @enderror" required>
        <option value="">Pilih Peran</option>
        @foreach($roles as $role)
        <option value="{{ $role->name }}" {{ (old('role', isset($pengguna) ? $pengguna->roles->first()->name : '') == $role->name) ? 'selected' : '' }}>
            {{ ucfirst($role->name) }}
        </option>
        @endforeach
    </select>
</div>
