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
        // === PROMOS ===
        DB::table('promos')->insert([
            ['title' => 'Potongan Rp 15.000', 'subtitle' => 'Khusus Cuci AC · Min. order Rp 100.000', 'discount_amount' => 15000, 'discount_percent' => null, 'type' => 'diskon', 'min_order' => '100000', 'valid_until' => '30 Nov 2025', 'color' => 'green', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Potongan Rp 25.000', 'subtitle' => 'Cuci Kasur Pro · Min. order Rp 150.000', 'discount_amount' => 25000, 'discount_percent' => null, 'type' => 'diskon', 'min_order' => '150000', 'valid_until' => '21 Nov 2025', 'color' => 'blue', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Hemat 10%', 'subtitle' => 'Hydro-Vacuum · Semua kategori', 'discount_amount' => null, 'discount_percent' => 10, 'type' => 'gratis', 'min_order' => null, 'valid_until' => '30 Nov 2025', 'color' => 'amber', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Gold Reward: Rp 50.000', 'subtitle' => 'Khusus member Gold · Semua layanan', 'discount_amount' => 50000, 'discount_percent' => null, 'type' => 'diskon', 'min_order' => null, 'valid_until' => '31 Des 2025', 'color' => 'purple', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Deep Clean Bundle −20%', 'subtitle' => 'Paket rumah lengkap · Min. 2 layanan', 'discount_amount' => null, 'discount_percent' => 20, 'type' => 'diskon', 'min_order' => null, 'valid_until' => '15 Des 2025', 'color' => 'green', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}