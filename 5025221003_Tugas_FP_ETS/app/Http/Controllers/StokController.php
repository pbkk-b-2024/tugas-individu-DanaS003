<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StokController extends Controller
{
    public function index()
    {
        $stoks = Stok::with('produk')->paginate(10);
        return view('stok.index', compact('stoks'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('stok.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:0',
            'lokasi_penyimpanan' => 'required|string',
            'tanggal_kadaluarsa' => 'required|date',
            'batch_number' => 'required|string',
        ]);

        Stok::create($validated);

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan');
    }

    public function edit(Stok $stok)
    {
        $produks = Produk::all();
        return view('stok.edit', compact('stok', 'produks'));
    }

    public function update(Request $request, Stok $stok)
    {
        try {
            $validated = $request->validate([
                'produk_id' => 'required|exists:produks,id',
                'jumlah' => 'required|integer|min:0',
                'lokasi_penyimpanan' => 'required|string',
                'tanggal_kadaluarsa' => 'required|date',
                'batch_number' => 'required|string',
            ]);

            $stok->update($validated);

            return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui stok. Silakan coba lagi.'])->withInput();
        }
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus');
    }
}
