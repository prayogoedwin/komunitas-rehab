<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder untuk Role & Permission
        $this->call([
            RoleSeeder::class,
            RolePermissionSeeder::class,
            JenisKategoriSeeder::class,
            EdukasiSeeder::class,
            ProyekSeeder::class,
            ForumSeeder::class,
            FaqSeeder::class
        ]);

        // Buat user Super Administrator
        $user = User::updateOrCreate(
            ['email' => 'superadmin@filament.com'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password123'),
            ]
        );

        // Assign role super_admin ke user ini
        $user->assignRole('super_admin');
    }
}
