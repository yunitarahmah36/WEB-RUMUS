<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Makanan Ringan', 'deskripsi' => 'Cemilan renyah dan gurih'],
            ['nama' => 'Minuman', 'deskripsi' => 'Minuman segar khas desa'],
            ['nama' => 'Kerajinan', 'deskripsi' => 'Kerajinan tangan UMKM'],
        ];
        foreach ($data as $d) Kategori::firstOrCreate(['nama' => $d['nama']], $d);
    }
}