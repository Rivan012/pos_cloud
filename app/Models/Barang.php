<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'nama_barang',
        'kategori_barang_id',
        'harga_beli',
        'harga_jual',
        'stok',
        'satuan'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_barang_id');
    }

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }
}