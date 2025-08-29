<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Faq;
use Illuminate\Support\Str;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $jumlah = 10;

        for ($i = 0; $i < $jumlah; $i++) {
            $question = $faker->sentence(6);

            $htmlDescription = "
                <p><strong>{$faker->word}</strong> {$faker->paragraph(2)}</p>
                <ul>
                    <li>{$faker->sentence(10)}</li>
                    <li>{$faker->sentence(12)}</li>
                </ul>
                <h2>{$faker->sentence(5)}</h2>
                <ol>
                    <li>{$faker->sentence(8)}</li>
                    <li><pre>{$faker->sentence(5)}</pre></li>
                </ol>
                <p>&nbsp;</p>
            ";

            Faq::create([
                'nama' => $question,
                'description' => $htmlDescription,
            ]);
        }
    }
}
