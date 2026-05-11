<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        // === ROLES ===
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);
        Role::create(['name' => 'petugas']);

        // === USERS ===
        $admin = User::create([
            'name'     => 'Admin BersihIn',
            'email'    => 'admin@bersihin.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        $petugas1 = User::create([
            'name'     => 'Larasati',
            'email'    => 'petugas@bersihin.com',
            'password' => Hash::make('password123'),
        ]);
        $petugas1->assignRole('petugas');

        $petugas2 = User::create([
            'name'     => 'Budi Santoso',
            'email'    => 'budi@bersihin.com',
            'password' => Hash::make('password123'),
        ]);
        $petugas2->assignRole('petugas');

        $customer1 = User::create([
            'name'     => 'Defina Rahma',
            'email'    => 'customer@bersihin.com',
            'password' => Hash::make('password123'),
        ]);
        $customer1->assignRole('customer');

        $customer2 = User::create([
            'name'     => 'Andi Pratama',
            'email'    => 'andi@bersihin.com',
            'password' => Hash::make('password123'),
        ]);
        $customer2->assignRole('customer');

        // === SERVICES ===
        $s1 = DB::table('services')->insertGetId([
            'service_name' => 'Cuci Sofa',
            'description'  => 'Pembersihan sofa dengan steam cleaning dan sabun khusus.',
            'price'        => 150000,
            'duration'     => 120,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        $s2 = DB::table('services')->insertGetId([
            'service_name' => 'Cuci Karpet',
            'description'  => 'Pembersihan karpet besar maupun kecil secara menyeluruh.',
            'price'        => 100000,
            'duration'     => 90,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        $s3 = DB::table('services')->insertGetId([
            'service_name' => 'Bersih Rumah',
            'description'  => 'Layanan kebersihan rumah lengkap termasuk sapu, pel, dan lap.',
            'price'        => 200000,
            'duration'     => 180,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        $s4 = DB::table('services')->insertGetId([
            'service_name' => 'Cuci AC',
            'description'  => 'Pembersihan filter dan evaporator AC agar dingin maksimal.',
            'price'        => 120000,
            'duration'     => 60,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        // === BOOKINGS ===
        $b1 = DB::table('bookings')->insertGetId([
            'user_id'      => $customer1->id,
            'petugas_id'   => $petugas1->id,
            'service_id'   => $s1,
            'booking_date' => '2026-05-12',
            'booking_time' => '09:00:00',
            'address'      => 'Jl. Melati No.5, Bandar Lampung',
            'status'       => 'done',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        $b2 = DB::table('bookings')->insertGetId([
            'user_id'      => $customer1->id,
            'petugas_id'   => $petugas2->id,
            'service_id'   => $s3,
            'booking_date' => '2026-05-15',
            'booking_time' => '10:00:00',
            'address'      => 'Jl. Melati No.5, Bandar Lampung',
            'status'       => 'confirmed',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        $b3 = DB::table('bookings')->insertGetId([
            'user_id'      => $customer2->id,
            'petugas_id'   => null,
            'service_id'   => $s2,
            'booking_date' => '2026-05-20',
            'booking_time' => '13:00:00',
            'address'      => 'Jl. Kenanga No.10, Bandar Lampung',
            'status'       => 'pending',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        $b4 = DB::table('bookings')->insertGetId([
            'user_id'      => $customer2->id,
            'petugas_id'   => $petugas1->id,
            'service_id'   => $s4,
            'booking_date' => '2026-05-08',
            'booking_time' => '08:00:00',
            'address'      => 'Jl. Kenanga No.10, Bandar Lampung',
            'status'       => 'done',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        // === PAYMENTS ===
        DB::table('payments')->insert([
            [
                'booking_id'     => $b1,
                'amount'         => 150000,
                'payment_method' => 'Transfer Bank',
                'payment_status' => 'paid',
                'payment_date'   => Carbon::parse('2026-05-11 08:00:00'),
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'booking_id'     => $b2,
                'amount'         => 200000,
                'payment_method' => 'QRIS',
                'payment_status' => 'paid',
                'payment_date'   => Carbon::parse('2026-05-14 09:30:00'),
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'booking_id'     => $b3,
                'amount'         => 100000,
                'payment_method' => 'COD',
                'payment_status' => 'pending',
                'payment_date'   => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'booking_id'     => $b4,
                'amount'         => 120000,
                'payment_method' => 'Transfer Bank',
                'payment_status' => 'paid',
                'payment_date'   => Carbon::parse('2026-05-07 07:45:00'),
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);

        // === REVIEWS ===
        DB::table('reviews')->insert([
            [
                'booking_id' => $b1,
                'user_id'    => $customer1->id,
                'rating'     => 5,
                'comment'    => 'Petugasnya ramah dan hasilnya bersih banget!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => $b4,
                'user_id'    => $customer2->id,
                'rating'     => 4,
                'comment'    => 'AC jadi dingin lagi, pelayanan cepat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}