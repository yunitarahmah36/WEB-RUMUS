<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukPublicController extends Controller
{
    // Katalog produk untuk sisi publik (sederhana)
    public function index(Request $request)
    {
        $q = $request->q;
        $produk = Produk::with(['kategori','coverImage','links'])
            ->where('is_active', true)
            ->when($q, fn($qry) => $qry->where('nama','like',"%{$q}%"))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('produk.katalog', compact('produk','q'));
    }

    public function show(Produk $produk)
    {
        $produk->load(['gambar','kategori','legalitas','links']);
        abort_unless($produk->is_active, 404);
        return view('produk.show', compact('produk'));
    }
}
