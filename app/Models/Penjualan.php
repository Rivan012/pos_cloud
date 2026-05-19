<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualans';

    protected $fillable = [
        'kode_transaksi',
        'barang_id',
        'kasir_id',
        'jumlah',
        'subtotal',
        'diskon_id',
        'total',
        'tanggal'
    ];

    protected $casts = [
        'tanggal' => 'datetime'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function kasir()
    {
        return $this->belongsTo(Kasir::class);
    }

    public function diskon()
    {
        return $this->belongsTo(Diskon::class);
    }
}