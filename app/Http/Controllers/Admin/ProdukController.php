<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\GambarProduk;
use App\Models\Kategori;
use App\Models\Legalitas;
use App\Models\LinkMarketplace;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->q;
        $produks = Produk::with(['kategori','links','gambar' => fn($q) => $q->orderByDesc('is_cover')->orderBy('urutan')])
            ->when($search, fn($q) => $q->where('nama','like',"%{$search}%"))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('admin.produks.index', compact('produks','search'));
    }

    public function create()
    {
        $kategoris = Kategori::orderBy('nama')->get();
        $legalitas = Legalitas::orderBy('nama')->get();
        $owners = DB::table('umkms')->select('id','nama')->orderBy('nama')->get(); // milik Orang B
        return view('admin.produks.create', compact('kategoris','legalitas','owners'));
    }

    public function store(StoreProdukRequest $request)
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated, $request) {
            $produk = Produk::create([
                'kategori_id' => $validated['kategori_id'] ?? null,
                'umkm_id' => $validated['umkm_id'] ?? null,
                'nama' => $validated['nama'],
                'deskripsi_singkat' => $validated['deskripsi_singkat'] ?? null,
                'deskripsi_lengkap' => $validated['deskripsi_lengkap'] ?? null,
                'harga' => $validated['harga'],
                'is_active' => $validated['is_active'] ?? true,
            ]);

            // Legalitas (tanpa data pivot detail untuk sederhana)
            if (!empty($validated['legalitas'])) {
                $produk->legalitas()->sync($validated['legalitas']);
            }

            // Links marketplace
            if (!empty($validated['links'])) {
                foreach ($validated['links'] as $platform => $url) {
                    if ($url) {
                        LinkMarketplace::create([
                            'produk_id' => $produk->id,
                            'platform' => $platform,
                            'url' => $url,
                        ]);
                    }
                }
            }

            // Upload images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $idx => $file) {
                    $path = $file->store('produk', 'public');
                    GambarProduk::create([
                        'produk_id' => $produk->id,
                        'path' => $path,
                        'is_cover' => (isset($validated['cover_index']) && (int)$validated['cover_index'] === $idx),
                        'urutan' => $idx,
                    ]);
                }
                // jika belum ada cover, set gambar pertama
                if (!$produk->coverImage()->exists()) {
                    $first = $produk->gambar()->orderBy('urutan')->first();
                    if ($first) {
                        $first->update(['is_cover' => true]);
                    }
                }
            }
        });

        return redirect()->route('admin.produks.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        $produk->load(['kategori','legalitas','links','gambar' => fn($q) => $q->orderByDesc('is_cover')->orderBy('urutan')]);
        $kategoris = Kategori::orderBy('nama')->get();
        $legalitas = Legalitas::orderBy('nama')->get();
        $owners = DB::table('umkms')->select('id','nama')->orderBy('nama')->get();
        return view('admin.produks.edit', compact('produk','kategoris','legalitas','owners'));
    }

    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated, $request, $produk) {
            $produk->update([
                'kategori_id' => $validated['kategori_id'] ?? null,
                'umkm_id' => $validated['umkm_id'] ?? null,
                'nama' => $validated['nama'],
                'deskripsi_singkat' => $validated['deskripsi_singkat'] ?? null,
                'deskripsi_lengkap' => $validated['deskripsi_lengkap'] ?? null,
                'harga' => $validated['harga'],
                'is_active' => $validated['is_active'] ?? true,
            ]);

            // legalitas
            $produk->legalitas()->sync($validated['legalitas'] ?? []);

            // links
            $platforms = ['shopee','tiktok','tokopedia','lazada'];
            foreach ($platforms as $pf) {
                $url = $validated['links'][$pf] ?? null;
                $link = $produk->links()->where('platform', $pf)->first();
                if ($url) {
                    if ($link) {
                        $link->update(['url' => $url]);
                    } else {
                        $produk->links()->create(['platform' => $pf, 'url' => $url]);
                    }
                } else {
                    if ($link) $link->delete();
                }
            }

            // images
            if ($request->hasFile('images')) {
                $start = ($produk->gambar()->max('urutan') ?? 0) + 1;
                foreach ($request->file('images') as $i => $file) {
                    $path = $file->store('produk', 'public');
                    $produk->gambar()->create([
                        'path' => $path,
                        'is_cover' => false,
                        'urutan' => $start + $i,
                    ]);
                }
            }

            if (isset($validated['cover_index'])) {
                foreach ($produk->gambar as $idx => $img) {
                    $img->update(['is_cover' => ($idx == $validated['cover_index'])]);
                }
            }
        });

        return redirect()->route('admin.produks.index')->with('success', 'Produk diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        foreach ($produk->gambar as $img) {
            Storage::disk('public')->delete($img->path);
        }
        $produk->delete();
        return back()->with('success', 'Produk dihapus.');
    }

    public function deleteImage(Produk $produk, GambarProduk $image)
    {
        abort_if($image->produk_id !== $produk->id, 404);
        Storage::disk('public')->delete($image->path);
        $image->delete();
        return back()->with('success', 'Gambar dihapus.');
    }

    public function setCover(Produk $produk, GambarProduk $image)
    {
        abort_if($image->produk_id !== $produk->id, 404);
        $produk->gambar()->update(['is_cover' => false]);
        $image->update(['is_cover' => true]);
        return back()->with('success', 'Cover diperbarui.');
    }
}
