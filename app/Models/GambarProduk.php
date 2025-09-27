<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarProduk extends Model
{
    use HasFactory;

    protected $table = 'gambar_produk';

    protected $fillable = ['produk_id','path','is_cover','urutan'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}