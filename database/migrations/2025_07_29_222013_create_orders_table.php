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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id')->default(0);
            $table->integer('produk_stok_varians_id')->default(0);
            $table->integer('produk_id')->default(0);
            $table->string('varian')->nullable();
            $table->string('ukuran')->nullable();
            $table->integer('jumlah')->default(0);
            $table->integer('poin_satuan')->default(0);
            $table->integer('poin_total')->default(0);
            $table->string('alamat_pengiriman')->nullable();
            $table->integer('status_order')->default(0);
            $table->integer('status_kirim')->default(0);
            $table->string('resi')->default(0);
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
