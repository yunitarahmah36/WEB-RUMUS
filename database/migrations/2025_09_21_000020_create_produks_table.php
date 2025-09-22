<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->nullable()->constrained('kategoris')->nullOnDelete();
            $table->foreignId('umkm_id')->nullable()->constrained('umkms')->nullOnDelete();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('deskripsi_singkat', 200)->nullable();
            $table->text('deskripsi_lengkap')->nullable();
            $table->decimal('harga', 12, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
