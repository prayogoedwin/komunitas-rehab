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
        Schema::create('pertandingans', function (Blueprint $table) {
            $table->id();
            $table->integer('is_special')->nullable()->default(0);
            $table->integer('kategori')->nullable()->default(0);

            $table->integer('pemain_1_id')->nullable()->default(0);
            $table->string('pemain_1_nama')->nullable();
            $table->string('pemain_1_foto')->nullable();
            $table->string('pemain_1_url_detail')->nullable();
            $table->integer('pemain_1_jago')->nullable()->default(0)->comment('tiap ada yang pilih, maka + 1');

            $table->integer('pemain_2_id')->nullable()->default(0);
            $table->string('pemain_2_nama')->nullable();
            $table->string('pemain_2_foto')->nullable();
            $table->string('pemain_2_url_detail')->nullable();
            $table->integer('pemain_2_jago')->nullable()->default(0)->comment('tiap ada yang pilih, maka + 1');

            $table->integer('pemenang')->nullable()->default(0);
            $table->integer('pemenang_poin')->nullable()->default(0);

            $table->integer('metode_menang')->default(0)->comment('digunakan jika kategori ufc');
            $table->integer('metode_menang_poin')->nullable()->default(0);

            $table->integer('ronde')->default(0)->comment('digunakan jika kategori ufc');
            $table->integer('ronde_poin')->nullable()->default(0);

            $table->date('tanggal_pertandingan')->nullable()->default(null);
            $table->time('jam_pertandingan')->nullable();

            $table->string('url_nonton_1')->nullable();
            $table->string('url_nonton_2')->nullable();
            $table->string('url_nonton_3')->nullable();

            $table->string('poster_pertand')->nullable();

            $table->date('expired_at')->nullable()->default(null);
            $table->integer('status')->nullable()->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertandingans');
    }
};
