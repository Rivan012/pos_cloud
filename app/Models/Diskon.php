<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diskon extends Model
{
    use HasFactory;

    protected $table = 'diskons';

    protected $fillable = [
        'nama_diskon',
        'jenis_diskon',
        'nilai_diskon',
        'tanggal_mulai',
        'tanggal_berakhir',
        'status'
    ];

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }
}