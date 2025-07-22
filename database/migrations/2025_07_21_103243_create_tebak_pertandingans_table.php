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
        Schema::create('tebak_pertandingans', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('pertandingan_id');
            $table->integer('tebak_pemenang_id')->nullable()->default(0);
            $table->string('tebak_pemenang')->nullable();
            $table->integer('status_tebak_pemenang')->nullable()->default(0)->comment('0 belum ada hasil, 1 benar');
            $table->integer('poin_tebak_pemenang')->nullable()->default(0);
            $table->string('tebak_metode')->nullable();
            $table->integer('status_tebak_metode')->nullable()->default(0)->comment('0 belum ada hasil, 1 benar');
            $table->integer('poin_tebak_metode')->nullable()->default(0);
            $table->string('tebak_ronde')->nullable();
            $table->integer('status_tebak_ronde')->nullable()->default(0)->comment('0 belum ada hasil, 1 benar');
            $table->integer('poin_tebak_ronde')->nullable()->default(0);
            $table->integer('poin_all')->nullable()->default(0);
            $table->integer('update_poin_to_profil')->nullable()->default(0)->comment('0 belum ada hasil, 1 sudah');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tebak_pertandingans');
    }
};
