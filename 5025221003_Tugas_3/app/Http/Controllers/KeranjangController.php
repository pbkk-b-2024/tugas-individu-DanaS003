<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\DetailKeranjang;
use App\Models\DetailTransaksi;
use App\Models\Stok;
use App\Models\Transaksi;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $keranjang = auth()->user()->keranjang;
        return view('keranjang.index', compact('keranjang'));
    }

    public function tambahProduk(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $keranjang = auth()->user()->keranjang;
        if (!$keranjang) {
            $keranjang = Keranjang::create(['user_id' => Auth::id()]);
        }

        $detailKeranjang = DetailKeranjang::updateOrCreate(
            ['keranjang_id' => $keranjang->id, 'produk_id' => $request->produk_id],
            ['jumlah' => $request->jumlah]
        );

        return redirect()->route('keranjang.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function hapusProduk(DetailKeranjang $id)
    {
        $id->delete();
        return redirect()->route('keranjang.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function checkout()
    {
        $keranjang = auth()->user()->keranjang;

        if (!$keranjang || $keranjang->detailKeranjangs->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang belanja Anda kosong.');
        }

        DB::beginTransaction();

        try {
            $total = $keranjang->detailKeranjangs->sum(function ($item) {
                return $item->produk->harga * $item->jumlah;
            });

            $transaksi = Transaksi::create([
                'user_id' => Auth::id(),
                'total' => $total,
                'status' => 'selesai',
            ]);

            foreach ($keranjang->detailKeranjangs as $item) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $item->produk_id,
                    'jumlah' => $item->jumlah,
                    'harga' => $item->produk->harga,
                ]);

                // Kurangi stok produk dengan model Stok
                Stok::where('produk_id', $item->produk_id)
                    ->decrement('jumlah', $item->jumlah);
            }

            // Kosongkan keranjang
            $keranjang->detailKeranjangs()->delete();

            DB::commit();

            return redirect()->route('transaksi.detail', $transaksi->id)->with('success', 'Checkout berhasil! Terima kasih atas pembelian Anda.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('keranjang.index')->with('error', 'Terjadi kesalahan saat checkout. Silakan coba lagi.');
        }
    }
}
