<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Buat permission
        $permissions = ['view users', 'create users', 'edit users', 'delete users'];
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        // Buat role super_admin dan admin
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // Kasih semua permission ke super_admin
        $superAdmin->syncPermissions(Permission::all());

        // Admin cuma punya sebagian permission
        $admin->syncPermissions(['view users', 'create users']);
    }
}
