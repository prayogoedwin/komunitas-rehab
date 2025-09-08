# Filament Starter

Starter project berbasis **Laravel + Filament Admin Panel**.  
Repositori ini ditujukan untuk mempermudah setup awal aplikasi dengan integrasi **Role & Permission** menggunakan Spatie.

## 🚀 Fitur

-   Laravel 12.x
-   Filament Admin Panel 3.x
-   Spatie Role & Permission
-   Seeder untuk Role, Permission, dan **Super Admin User**

## 📦 Instalasi

1. Clone repository:  
   `git clone https://github.com/prayogoedwin/filament-starter.git && cd filament-starter`

2. Install dependencies:  
   `composer install && npm install && npm run dev`

3. Konfigurasi `.env`:  
   `cp .env.example .env`  
   lalu generate application key:  
   `php artisan key:generate`

4. Migrasi database & jalankan seeder:  
   `php artisan migrate:fresh --seed`

    Seeder yang tersedia:

    - `RoleSeeder` → Membuat role dasar (termasuk `super_admin`)
    - `RolePermissionSeeder` → Menambahkan permission sesuai role
    - `DatabaseSeeder` → Membuat user Super Administrator

## 👤 User Default

Setelah seeder dijalankan, user default berikut akan otomatis dibuat:

-   **Name:** Super Administrator
-   **Email:** superadmin@filament.com
-   **Password:** password123
-   **Role:** super_admin

## 🔑 Login ke Filament Admin

Akses halaman login Filament di:  
`http://127.0.0.1:8000/backend/login`

Gunakan kredensial user Super Administrator di atas.

## 🛠 Development

Menjalankan server development:  
`php artisan serve`

## 🛜 Upload Server

1. Aktifkan SSH terminal pada cpanel
2. Masuk ke dalam terminal dan arahkan kedalam public_html
3. Clone repository:  
   `git clone https://github.com/prayogoedwin/filament-starter.git`

4. Install dependencies:  
   `composer install && npm install && npm run dev`
5. Konfigurasi database pada cpanel.
6. Buka select php version pada cpanel dan aktifkan extension redis sesuai versi php yang dibutuhkan.
7. Aktifkan redis pada section `software`
8. Konfigurasi `.env`:  
   `cp .env.example .env`  
   lalu generate application key:  
   `php artisan key:generate`
9. Konfigurasi domain dengan memilih domain pada cpanel dan arahkan direktori ke public_html

## 📜 Lisensi

Proyek ini menggunakan lisensi [MIT](LICENSE).
