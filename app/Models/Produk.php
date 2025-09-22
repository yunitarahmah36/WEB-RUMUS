<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'umkm_id',
        'nama',
        'slug',
        'deskripsi_singkat',
        'deskripsi_lengkap',
        'harga',
        'is_active'
    ];

    protected static function booted()
    {
        static::creating(function ($produk) {
            if (empty($produk->slug)) {
                $produk->slug = Str::slug($produk->nama) . '-' . substr(Str::uuid()->toString(), 0, 8);
            }
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function legalitas()
    {
        return $this->belongsToMany(Legalitas::class, 'produk_legalitas')
            ->withPivot(['nomor_sertifikat','tanggal_terbit','tanggal_kadaluwarsa'])
            ->withTimestamps();
    }

    public function gambar()
    {
        return $this->hasMany(GambarProduk::class);
    }

    public function links()
    {
        return $this->hasMany(LinkMarketplace::class);
    }

    public function coverImage()
    {
        return $this->hasOne(GambarProduk::class)->where('is_cover', true);
    }

    public function getCoverUrlAttribute(): ?string
    {
        $cover = $this->coverImage()->first();
        if ($cover) return asset('storage/' . $cover->path);
        $first = $this->gambar()->orderBy('urutan')->first();
        return $first ? asset('storage/' . $first->path) : null;
    }
}