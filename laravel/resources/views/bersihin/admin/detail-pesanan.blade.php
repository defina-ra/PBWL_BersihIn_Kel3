@extends('bersihin.layouts.app')
@section('page-title', 'Detail Pesanan')
@section('page-subtitle', 'Informasi lengkap pesanan pelanggan')

@section('content')
<div class="p-8">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="javascript:history.back()"
               class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center hover:bg-gray-50">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h1 class="text-xl font-bold text-gray-900">Detail Pesanan #BSN-99201</h1>
                <p class="text-sm text-gray-400 mt-0.5">Dibuat pada 24 Jan 2025, 14:20 WIB</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button class="border border-gray-200 text-gray-700 text-sm font-semibold px-5 py-2.5 rounded-full hover:bg-gray-50 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                Cetak Invoice
            </button>
            <button class="bg-green-700 text-white text-sm font-semibold px-5 py-2.5 rounded-full hover:bg-green-800 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Update Status
            </button>
        </div>
    </div>

    {{-- PROGRESS STEPS --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between">
            {{-- Step 1 --}}
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 bg-green-700 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-green-700">Pesanan dibuat</span>
            </div>
            <div class="flex-1 h-0.5 bg-green-600 mx-4"></div>
            {{-- Step 2 --}}
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 bg-green-700 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-green-700">Pembayaran diverifikasi</span>
            </div>
            <div class="flex-1 h-0.5 bg-green-600 mx-4"></div>
            {{-- Step 3 --}}
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 bg-green-700 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-green-700">Petugas ditugaskan</span>
            </div>
            <div class="flex-1 h-0.5 bg-gray-200 mx-4"></div>
            {{-- Step 4 --}}
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span class="text-sm text-gray-400">Selesai</span>
            </div>
        </div>
    </div>

    {{-- 3 CARDS ROW --}}
    <div class="grid grid-cols-3 gap-6 mb-6">

        {{-- Informasi Pelanggan --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-9 h-9 bg-green-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-800">Informasi pelanggan</h3>
            </div>
            <div class="space-y-4">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Nama Lengkap</p>
                    <p class="font-bold text-gray-900">Ahmad Rizky</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Nomor Telepon</p>
                    <p class="font-bold text-gray-900">0812-3456-7890</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Alamat Pengiriman</p>
                    <p class="font-bold text-gray-900">Jl. Merdeka No. 10, Bandar Lampung</p>
                </div>
                <a href="#" class="flex items-center gap-1.5 text-green-700 text-sm font-semibold hover:underline mt-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Buka di Maps
                </a>
            </div>
        </div>

        {{-- Detail Layanan --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-9 h-9 bg-green-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-800">Detail layanan</h3>
            </div>
            <div class="space-y-4">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Layanan</p>
                    <div class="flex items-center gap-2">
                        <p class="font-bold text-gray-900">Deep Cleaning</p>
                        <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-2 py-0.5 rounded-full">PREMIUM</span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Jadwal</p>
                        <p class="font-bold text-gray-900">25 Jan 2025</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Waktu</p>
                        <p class="font-bold text-gray-900">09:00 WIB</p>
                    </div>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Catatan</p>
                    <div class="bg-gray-50 rounded-xl p-3 border border-gray-100">
                        <p class="text-gray-600 text-sm italic">"Mohon fokus pada area dapur dan ruang tamu."</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Status Petugas --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-9 h-9 bg-orange-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-800">Status petugas</h3>
            </div>
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-gray-900">Larasati</p>
                    <p class="text-xs text-gray-400">Polo Uniform ID: #STF-102</p>
                    <div class="flex items-center gap-1 mt-1">
                        <span class="text-yellow-400 text-xs">★</span>
                        <span class="text-xs font-semibold text-gray-700">4.9</span>
                        <span class="text-xs text-gray-400">(128 reviews)</span>
                    </div>
                </div>
            </div>
            <div class="flex gap-2">
                <span class="flex-1 text-center bg-green-50 text-green-700 text-xs font-semibold py-2 rounded-lg border border-green-200">
                    Telah Ditugaskan
                </span>
                <button class="flex-1 text-center bg-gray-50 text-gray-600 text-xs font-semibold py-2 rounded-lg border border-gray-200 hover:bg-gray-100">
                    Ganti Petugas
                </button>
            </div>
        </div>

    </div>

    {{-- BOTTOM ROW --}}
    <div class="grid grid-cols-3 gap-6">

        {{-- Bukti Pembayaran --}}
        <div class="col-span-2 bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-blue-50 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800">Bukti pembayaran</h3>
                </div>
                <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    Lunas
                </span>
            </div>
            <div class="flex gap-6">
                {{-- Preview Bukti --}}
                <div class="w-32 h-32 bg-gray-100 rounded-xl flex items-center justify-center flex-shrink-0 border border-gray-200 cursor-pointer hover:bg-gray-200 transition">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                {{-- Detail --}}
                <div class="flex-1">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Metode Pembayaran</p>
                            <p class="font-bold text-gray-900">Transfer Bank BCA</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Total Pembayaran</p>
                            <p class="font-bold text-green-700 text-lg">Rp 250.000</p>
                        </div>
                    </div>
                    {{-- Verifikasi Info --}}
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 flex gap-3">
                        <svg class="w-5 h-5 text-gray-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Verifikasi Otomatis Berhasil</p>
                            <p class="text-xs text-gray-400 mt-0.5">Pembayaran telah dikonfirmasi oleh sistem pada 24 Jan 2025 pukul 14:45 WIB.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Riwayat Aktivitas --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <h3 class="font-semibold text-gray-800 mb-5">Riwayat Aktivitas</h3>
            <div class="space-y-4">
                <div class="flex gap-3">
                    <div class="w-2.5 h-2.5 bg-green-600 rounded-full mt-1.5 flex-shrink-0"></div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Petugas Ditugaskan</p>
                        <p class="text-xs text-gray-400">Oleh: Admin · 24 Jan, 16:00</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <div class="w-2.5 h-2.5 bg-green-600 rounded-full mt-1.5 flex-shrink-0"></div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Pembayaran Dikonfirmasi</p>
                        <p class="text-xs text-gray-400">Sistem Otomatis · 24 Jan, 14:45</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <div class="w-2.5 h-2.5 bg-green-600 rounded-full mt-1.5 flex-shrink-0"></div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Pesanan Dibuat</p>
                        <p class="text-xs text-gray-400">Oleh: Ahmad Rizky · 24 Jan, 14:20</p>
                    </div>
                </div>
            </div>
            <button class="w-full mt-5 border border-gray-200 text-gray-600 text-sm font-medium py-2.5 rounded-xl hover:bg-gray-50 flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Lihat Semua Riwayat
            </button>
        </div>

    </div>

</div>
@endsection