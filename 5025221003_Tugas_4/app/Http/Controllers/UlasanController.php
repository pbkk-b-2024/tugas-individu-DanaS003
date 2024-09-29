<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::with(['user', 'produk'])->paginate(10);
        return view('ulasan.index', compact('ulasans'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('ulasan.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['tanggal_ulasan'] = now();

        Ulasan::create($validated);

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil ditambahkan');
    }

    public function show(Ulasan $ulasan)
    {
        return view('ulasan.show', compact('ulasan'));
    }

    public function edit(Ulasan $ulasan)
    {
        $produks = Produk::all();
        return view('ulasan.edit', compact('ulasan', 'produks'));
    }

    public function update(Request $request, Ulasan $ulasan)
    {
        $validated = $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
        ]);

        $ulasan->update($validated);

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil diperbarui');
    }

    public function destroy(Ulasan $ulasan)
    {
        $ulasan->delete();
        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil dihapus');
    }
}
