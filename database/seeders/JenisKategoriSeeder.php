<?php

namespace Database\Seeders;

use App\Models\JenisKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'beranda',
            'tentang kami',
            'forum',
            'edukasi',
            'proyek',
            'dukungan',
            'bergabung'
        ];

        foreach ($data as $value) {
            JenisKategori::create([
                'nama' => $value
            ]);
        }
    }
}
