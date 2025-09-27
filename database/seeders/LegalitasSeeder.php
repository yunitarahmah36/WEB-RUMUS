<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Legalitas;

class LegalitasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'PIRT', 'penerbit' => 'Dinas Kesehatan'],
            ['nama' => 'Halal', 'penerbit' => 'BPJPH/MUI'],
            ['nama' => 'NIB', 'penerbit' => 'OSS RBA'],
            ['nama' => 'Sertifikat Produksi Pangan', 'penerbit' => 'Dinkes'],
        ];
        foreach ($data as $d) Legalitas::firstOrCreate(['nama' => $d['nama']], $d);
    }
}