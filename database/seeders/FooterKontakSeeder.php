<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterKontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footerInformations = [
            [
                'slug' => 'alamat-footer',
                'nama' => 'fa fa-map-marker-alt',
                'description' => 'Jl. Kesehatan No. 123, Jakarta Utara, Indonesia',
            ],
            [
                'slug' => 'wa-footer',
                'nama' => 'fa fa-phone',
                'description' => '(+62) 123-456-7890',
            ],
            [
                'slug' => 'email-footer',
                'nama' => 'fa fa-envelope',
                'description' => 'komunitasrehabilitasi@mail.com',
            ],
        ];

        foreach ($footerInformations as $footerInformation) {
            Informasi::create($footerInformation);
        }
    }
}
