<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    // ✅ tambahkan field yang boleh diisi
    protected $fillable = [
        'nama_pemilik',
        'nama_umkm',
        'deskripsi',
        'no_hp',
    ];
}
