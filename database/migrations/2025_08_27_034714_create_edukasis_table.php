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
        Schema::create('edukasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('kategori_id')->references('id')->on('kategori_masters');
            $table->string('cover');
            $table->longText('deskripsi_singkat');
            $table->longText('deskripsi');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edukasis');
    }
};
