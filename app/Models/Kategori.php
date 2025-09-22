<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama','slug','deskripsi'];

    // Otomatis bikin slug
    protected static function booted()
    {
        static::creating(function ($kategori) {
            if (empty($kategori->slug)) {
                $kategori->slug = Str::slug($kategori->nama);
            }
        });
    }

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}