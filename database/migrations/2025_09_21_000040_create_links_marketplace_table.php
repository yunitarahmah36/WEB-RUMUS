<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('links_marketplace', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produks')->cascadeOnDelete();
            $table->string('platform'); // shopee, tiktok, tokopedia, lazada, dll
            $table->string('url');
            $table->timestamps();
            $table->unique(['produk_id','platform']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('links_marketplace');
    }
};