<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        // BUAT ROLE DULU - WAJIB SEBELUM assignRole
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);
        Role::create(['name' => 'petugas']);

        // USER ADMIN
        $admin = User::create([
            'name' => 'Admin BersihIn',
            'email' => 'admin@bersihin.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        // USER PETUGAS
        $petugas = User::create([
            'name' => 'Larasati',
            'email' => 'petugas@bersihin.com',
            'password' => Hash::make('password123'),
        ]);
        $petugas->assignRole('petugas');

        // USER CUSTOMER
        $customer = User::create([
            'name' => 'Defina Rahma',
            'email' => 'customer@bersihin.com',
            'password' => Hash::make('password123'),
        ]);
        $customer->assignRole('customer');
    }
}