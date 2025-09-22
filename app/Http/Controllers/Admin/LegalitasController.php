<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLegalitasRequest;
use App\Models\Legalitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LegalitasController extends Controller
{
    public function index()
    {
        $data = Legalitas::latest()->paginate(10);
        return view('admin.legalitas.index', compact('data'));
    }

    public function store(StoreLegalitasRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['nama']);
        Legalitas::create($validated);
        return back()->with('success', 'Legalitas ditambahkan.');
    }

    public function update(StoreLegalitasRequest $request, Legalitas $legalita)
    {
        $validated = $request->validated();
        $legalita->update($validated);
        return back()->with('success', 'Legalitas diperbarui.');
    }

    public function destroy(Legalitas $legalita)
    {
        $legalita->delete();
        return back()->with('success', 'Legalitas dihapus.');
    }
}