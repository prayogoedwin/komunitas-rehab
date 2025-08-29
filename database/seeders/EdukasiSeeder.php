<?php

namespace Database\Seeders;

use App\Models\Edukasi;
use App\Models\KategoriMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class EdukasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $kategoriIds = KategoriMaster::where('jenis_kategori', 'edukasi')->pluck('id')->toArray();

        if (empty($kategoriIds)) {
            $this->command->info('Tidak ada kategori ditemukan. Seeder dihentikan.');
            return;
        }

        $jumlah = 10;

        for ($i = 0; $i < $jumlah; $i++) {
            $judul = $faker->sentence(3);
            $htmlDeskripsi = "
                <h2>{$faker->sentence(3)}</h2>
                <p><strong>{$faker->word}</strong> {$faker->paragraph(3)}</p>
                <h2>{$faker->sentence(4)}</h2>
                <ul>
                    <li>{$faker->sentence(12)}</li>
                    <li>{$faker->sentence(15)}</li>
                </ul>
                <h2>{$faker->sentence(4)}</h2>
                <ol>
                    <li>{$faker->sentence(10)}</li>
                    <li><pre>{$faker->sentence(6)}</pre></li>
                </ol>
                <p>&nbsp;</p>
            ";


            Edukasi::create([
                'judul' => $judul,
                'slug' => Str::slug($judul),
                'kategori_id' => $faker->randomElement($kategoriIds),
                'cover' => $faker->imageUrl(800, 600, 'education', true),
                'deskripsi_singkat' => $faker->sentence(10),
                'deskripsi' => $htmlDeskripsi,
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
