<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::latest()->paginate(10);
        return view('admin.kategoris.index', compact('data'));
    }

    public function store(StoreKategoriRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['nama']);
        Kategori::create($validated);
        return back()->with('success', 'Kategori ditambahkan.');
    }

    public function update(StoreKategoriRequest $request, Kategori $kategori)
    {
        $validated = $request->validated();
        if (empty($validated['slug'])) $validated['slug'] = Str::slug($validated['nama']);
        $kategori->update($validated);
        return back()->with('success', 'Kategori diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return back()->with('success', 'Kategori dihapus.');
    }
}