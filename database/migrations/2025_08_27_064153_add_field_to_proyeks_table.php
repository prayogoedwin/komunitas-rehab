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
        Schema::table('proyeks', function (Blueprint $table) {
            $table->date('from_date')->nullable()->after('kategori_id');
            $table->date('to_date')->nullable()->after('from_date');
            $table->integer('jumlah_peserta')->nullable()->after('to_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyeks', function (Blueprint $table) {
            //
        });
    }
};
