<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkMarketplace extends Model
{
    use HasFactory;

    protected $table = 'links_marketplace';

    protected $fillable = ['produk_id','platform','url'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}