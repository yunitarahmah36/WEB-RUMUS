<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Umkm;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Umkm::create([
            'nama_pemilik' => 'Andi Saputra',
            'nama_umkm'    => 'Bakso Andi',
            'deskripsi'    => 'Bakso khas Malang dengan kuah gurih',
            'no_hp'        => '081122334455',
        ]);
    }
}
