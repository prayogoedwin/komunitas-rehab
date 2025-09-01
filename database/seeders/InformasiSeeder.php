<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Informasi::create([
            'slug' => 'inforekdonasi',
            'nama' => '466215521-BCA-a.n. Budi Wibowo',
            'description' => 'Silahkan transfer ke rekening di atas dengan jumlah yang sesuai dan silahkan upload bukti transfer dengan cara klik tombol di bawah ini. Terima kasih atas dukungan Anda.'
        ]);

        Informasi::create([
            'slug' => 'wa-donasi',
            'nama' => '081234567890',
            'description' => 'Saya telah melakukan donasi dengan jumlah sebesar'
        ]);
    }
}
