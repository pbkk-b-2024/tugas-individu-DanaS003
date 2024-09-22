<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'harga', 'stok', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function detailKeranjangs()
    {
        return $this->hasMany(DetailKeranjang::class);
    }

    public function stoks()
    {
        return $this->hasMany(Stok::class);
    }

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function getTotalStokAttribute()
    {
        return $this->stoks->sum('jumlah');
    }

    public function getRatingRataRataAttribute()
    {
        return $this->ulasans->avg('rating');
    }
}
