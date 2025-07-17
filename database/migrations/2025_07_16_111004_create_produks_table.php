<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->longText('deskripsi');
            $table->integer('tipe_produk')->default(0);
            $table->integer('kategori_produk')->default(0);
            $table->integer('kategori_produk_2')->default(0);
            $table->integer('poin')->default(0);
            $table->integer('status')->default(0);
            $table->string('foto')->nullable(); // Tambahkan kolom untuk path foto
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
