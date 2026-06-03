@extends('bersihin.layouts.app')

@section('page-title', 'Layanan Kami')
@section('page-subtitle', 'Pilih layanan kebersihan sesuai kebutuhan kamu')

@section('content')

@php
$photos = [
    'Cuci Sofa'    => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80',
    'Cuci Karpet'  => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80',
    'Bersih Rumah' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=600&q=80',
    'Cuci AC'      => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=600&q=80',
];
$gradients = [
    'Cuci Sofa'    => 'linear-gradient(135deg,#92400e,#b45309)',
    'Cuci Karpet'  => 'linear-gradient(135deg,#064e3b,#16a34a)',
    'Bersih Rumah' => 'linear-gradient(135deg,#0f766e,#0d9488)',
    'Cuci AC'      => 'linear-gradient(135deg,#1e40af,#2563eb)',
];
@endphp

<!-- TOMBOL PESAN -->
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-400 text-sm">{{ $layanan->count() }} layanan tersedia</p>
    <a href="/bersihin/booking"
       class="flex items-center gap-2 text-sm font-bold text-white px-5 py-2.5 rounded-xl transition"
       style="background:linear-gradient(135deg,#16a34a,#0d9044);box-shadow:0 4px 14px rgba(22,163,74,0.35);">
        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        Pesan Sekarang
    </a>
</div>

<!-- GRID LAYANAN -->
<div class="grid grid-cols-3 gap-5 mb-8">
    @forelse($layanan as $l)
    @php
        $foto = $photos[$l->service_name] ?? 'https://images.unsplash.com/photo-1527515637462-cff94edd787c?w=600&q=80';
        $grad = $gradients[$l->service_name] ?? 'linear-gradient(135deg,#064e3b,#16a34a)';
        $jam  = $l->duration >= 60 ? round($l->duration / 60) : 1;
    @endphp
    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-200 hover:-translate-y-1 flex flex-col">

        <!-- FOTO -->
        <div class="relative overflow-hidden" style="height:190px;background:{{ $grad }};">
            <img src="{{ $foto }}"
                 alt="{{ $l->service_name }}"
                 class="w-full h-full object-cover"
                 onerror="this.style.display='none'">
            <!-- badge durasi -->
            <span class="absolute top-3 left-3 bg-white bg-opacity-90 text-gray-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
                <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                </svg>
                ± {{ $jam }} Jam
            </span>
            <!-- badge harga -->
            <span class="absolute top-3 right-3 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm" style="background:rgba(0,0,0,0.45);">
                Rp {{ number_format($l->price, 0, ',', '.') }}
            </span>
        </div>

        <!-- KONTEN -->
        <div class="p-5 flex flex-col flex-1">
            <h3 class="font-bold text-gray-900 text-base mb-1">{{ $l->service_name }}</h3>
            <p class="text-gray-500 text-sm leading-relaxed mb-4 flex-1">{{ $l->description }}</p>
            <a href="/bersihin/booking?service_id={{ $l->id }}"
               class="block w-full text-center font-bold py-3 rounded-xl text-sm transition text-white"
               style="background:linear-gradient(135deg,#16a34a,#0d9044);">
                Pesan Sekarang →
            </a>
        </div>
    </div>
    @empty
    <div class="col-span-3 bg-white rounded-2xl border border-gray-100 p-12 text-center">
        <p class="text-gray-400 text-sm">Belum ada layanan tersedia</p>
    </div>
    @endforelse
</div>

<!-- KENAPA PILIH KAMI -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-7 mb-6">
    <h3 class="font-extrabold text-gray-900 text-base mb-5">Kenapa Pilih BersihIn?</h3>
    <div class="grid grid-cols-4 gap-5">
        <div class="text-center">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-3" style="background:#f0fdf4;">
                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#16a34a" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <p class="font-bold text-gray-800 text-sm">Petugas Terverifikasi</p>
            <p class="text-gray-400 text-xs mt-1">Semua petugas sudah terlatih dan terpercaya</p>
        </div>
        <div class="text-center">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-3" style="background:#eff6ff;">
                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#2563eb" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p class="font-bold text-gray-800 text-sm">Tepat Waktu</p>
            <p class="text-gray-400 text-xs mt-1">Petugas datang sesuai jadwal yang kamu pilih</p>
        </div>
        <div class="text-center">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-3" style="background:#fef3c7;">
                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
            <p class="font-bold text-gray-800 text-sm">Rating Tinggi</p>
            <p class="text-gray-400 text-xs mt-1">Rata-rata 4.9/5 dari ribuan pelanggan</p>
        </div>
        <div class="text-center">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-3" style="background:#fdf4ff;">
                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#9333ea" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
            </div>
            <p class="font-bold text-gray-800 text-sm">Pembayaran Mudah</p>
            <p class="text-gray-400 text-xs mt-1">Transfer bank, mudah dan aman</p>
        </div>
    </div>
</div>

<!-- BANNER CTA -->
<div class="rounded-2xl overflow-hidden relative" style="background:linear-gradient(135deg,#0a2e1f,#145c3e);">
    <div class="p-8 flex items-center justify-between relative z-10">
        <div>
            <p class="text-green-400 text-xs font-bold uppercase tracking-widest mb-2">Penawaran Terbatas</p>
            <h2 class="text-white text-xl font-extrabold mb-2">Diskon 30% untuk Pesanan Pertama!</h2>
            <p class="text-green-300 text-sm mb-5">Daftar sekarang dan nikmati rumah bersih dengan harga spesial.</p>
            <a href="/bersihin/booking"
               class="inline-flex items-center gap-2 bg-white text-green-800 font-bold text-sm px-6 py-3 rounded-xl hover:bg-green-50 transition">
                Pesan Sekarang →
            </a>
        </div>
    </div>
    <div class="absolute -top-8 -right-8 w-40 h-40 rounded-full opacity-10" style="background:white;"></div>
    <div class="absolute -bottom-6 right-32 w-28 h-28 rounded-full opacity-10" style="background:white;"></div>
</div>

@endsection