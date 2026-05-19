<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kasir extends Model
{
    use HasFactory;

    protected $table = 'kasirs';

    protected $fillable = [
        'user_id',
        'nama_kasir',
        'no_hp',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }
}