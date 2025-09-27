<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk_legalitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produks')->cascadeOnDelete();
            $table->foreignId('legalitas_id')->constrained('legalitas')->cascadeOnDelete();
            $table->string('nomor_sertifikat')->nullable();
            $table->date('tanggal_terbit')->nullable();
            $table->date('tanggal_kadaluwarsa')->nullable();
            $table->timestamps();
            $table->unique(['produk_id', 'legalitas_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk_legalitas');
    }
};