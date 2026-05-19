<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $table = 'kategori_barangs';

    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}