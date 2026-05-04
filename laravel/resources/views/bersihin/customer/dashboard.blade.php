@extends('bersihin.layouts.customer')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Kamis, 3 Mei 2026')

@section('content')
<style>
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 20px 24px;
        border: 1px solid rgba(0,0,0,0.06);
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        display: flex; align-items: center; gap: 16px;
        transition: all 0.2s;
    }
    .stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.08); }

    .stat-icon {
        width: 52px; height: 52px; border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }

    .progress-step {
        display: flex; flex-direction: column; align-items: center; gap: 8px;
        flex: 1;
    }

    .step-circle {
        width: 40px; height: 40px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        position: relative; z-index: 2;
    }

    .step-line {
        flex: 1; height: 3px; margin-top: -28px; position: relative; z-index: 1;
    }

    .card-section {
        background: white; border-radius: 20px;
        border: 1px solid rgba(0,0,0,0.06);
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        overflow: hidden;
    }
</style>

<!-- GREETING -->
<div class="mb-6 fade-up fade-up-1">
    <h1 class="text-2xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;">Halo, Defina Rahma! 👋</h1>
    <p class="text-gray-400 text-sm mt-1">Rumah bersih, hati tenang — apa yang bisa kami bantu hari ini?</p>
</div>

<!-- STAT CARDS -->
<div class="grid grid-cols-3 gap-4 mb-6 fade-up fade-up-2">
    <!-- Total Pesanan -->
    <div class="stat-card">
        <div class="stat-icon" style="background:#eff6ff;">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#2563eb" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Total Pesanan</p>
            <p class="text-3xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;">12</p>
        </div>
    </div>

    <!-- Status Aktif -->
    <div class="stat-card">
        <div class="stat-icon" style="background:#f0fdf4;">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#16a34a" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Status Aktif</p>
            <p class="text-sm font-bold text-green-600 leading-tight mt-0.5">Petugas Menuju<br>Lokasi</p>
        </div>
    </div>

    <!-- Voucher -->
    <div class="stat-card">
        <div class="stat-icon" style="background:#fffbeb;">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Voucher</p>
            <p class="text-3xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;">3 <span class="text-sm font-medium text-gray-400">Tersedia</span></p>
        </div>
    </div>
</div>

<!-- PESANAN HARI INI + PETUGAS -->
<div class="card-section mb-6 fade-up fade-up-3">
    <div class="p-6 border-b border-gray-100 flex justify-between items-start">
        <div>
            <h2 class="font-bold text-gray-900 text-base">Pesanan Hari Ini</h2>
            <p class="text-sm text-gray-400 mt-0.5">Layanan General Cleaning &bull; <span class="font-mono text-xs bg-gray-100 px-2 py-0.5 rounded">#BSH-99281</span></p>
        </div>
        <span class="text-xs font-bold px-3 py-1.5 rounded-full" style="background:#dbeafe;color:#1d4ed8;">PROSES</span>
    </div>

    <div class="p-6 flex gap-6">
        <!-- Progress Steps -->
        <div class="flex-1">
            <div class="flex items-center mb-6">
                <!-- Step 1: Dipesan -->
                <div class="progress-step">
                    <div class="step-circle" style="background:#16a34a;">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    </div>
                </div>
                <div class="step-line" style="background:linear-gradient(90deg,#16a34a,#16a34a);"></div>

                <!-- Step 2: Menuju Lokasi -->
                <div class="progress-step">
                    <div class="step-circle" style="background:#16a34a;box-shadow:0 0 0 4px rgba(22,163,74,0.2);">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                    </div>
                </div>
                <div class="step-line" style="background:#e5e7eb;"></div>

                <!-- Step 3: Sedang Bekerja -->
                <div class="progress-step">
                    <div class="step-circle" style="background:#f3f4f6;">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                </div>
                <div class="step-line" style="background:#e5e7eb;"></div>

                <!-- Step 4: Selesai -->
                <div class="progress-step">
                    <div class="step-circle" style="background:#f3f4f6;">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
            </div>

            <!-- Step Labels -->
            <div class="flex justify-between text-center">
                <div class="flex-1"><p class="text-xs font-semibold text-green-600">Dipesan</p></div>
                <div class="flex-1"><p class="text-xs font-semibold text-green-700">Menuju Lokasi</p></div>
                <div class="flex-1"><p class="text-xs text-gray-400">Sedang Bekerja</p></div>
                <div class="flex-1"><p class="text-xs text-gray-400">Selesai</p></div>
            </div>

            <!-- Info tambahan -->
            <div class="mt-5 flex gap-3">
                <div class="flex-1 bg-green-50 rounded-xl p-3 flex items-center gap-3">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#16a34a" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Estimasi Tiba</p>
                        <p class="text-sm font-bold text-gray-800">8 Menit Lagi</p>
                    </div>
                </div>
                <div class="flex-1 bg-blue-50 rounded-xl p-3 flex items-center gap-3">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#2563eb" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Jarak</p>
                        <p class="text-sm font-bold text-gray-800">1.2 KM</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Petugas Card -->
        <div class="w-48 bg-gray-50 rounded-2xl p-4 text-center border border-gray-100 flex-shrink-0">
            <div class="relative inline-block mb-3">
                <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?w=80&h=80&fit=crop&crop=face" class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-md" alt="Petugas">
                <div class="absolute -bottom-1 -right-1 bg-green-500 text-white text-xs px-1.5 py-0.5 rounded-full font-bold" style="font-size:8px;">✓ VERIFIED</div>
            </div>
            <p class="font-bold text-gray-900 text-sm">Larasati</p>
            <div class="flex items-center justify-center gap-1 mt-1">
                <svg width="12" height="12" fill="#f59e0b" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <span class="text-xs font-semibold text-gray-700">4.9</span>
                <span class="text-xs text-gray-400">(240)</span>
            </div>
            <div class="flex gap-2 mt-3">
                <button class="flex-1 py-1.5 rounded-lg border border-green-600 text-green-700 text-xs font-semibold hover:bg-green-50 transition">Hubungi</button>
                <button class="flex-1 py-1.5 rounded-lg text-white text-xs font-semibold transition" style="background:#0d3d2b;">Detail</button>
            </div>
        </div>
    </div>
</div>

<!-- BANNER PROMO + FOTO -->
<div class="grid grid-cols-2 gap-4 fade-up fade-up-4">
    <!-- Foto Promo -->
    <div class="card-section relative overflow-hidden" style="min-height:220px;">
        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop" class="w-full h-full object-cover absolute inset-0" alt="Cleaning">
        <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(0,0,0,0.55) 0%, transparent 60%);"></div>
        <div class="absolute bottom-0 left-0 right-0 p-5">
            <div class="flex justify-between items-end">
                <div>
                    <span class="text-xs font-bold text-green-300 uppercase tracking-wider">Layanan Terpercaya</span>
                    <p class="text-white font-bold text-base mt-1 leading-tight">Bersih Profesional,<br>Hasil Memuaskan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Promo -->
    <div class="card-section p-6" style="background:linear-gradient(135deg,#0d3d2b,#145c3e);">
        <span class="text-xs font-bold px-3 py-1 rounded-full" style="background:rgba(255,255,255,0.15);color:#86efac;">✦ DISKON KHUSUS</span>
        <h3 class="text-white text-2xl font-extrabold mt-3 leading-tight" style="font-family:'Sora',sans-serif;">Dapatkan<br>30% Off</h3>
        <p class="text-green-300 text-xs mt-2 leading-relaxed">Berlaku untuk paket 'Ramadan Deep Clean'. Bersihkan hunian menyambut hari raya.</p>

        <div class="mt-4 bg-white/10 rounded-xl p-3 flex justify-between items-center">
            <div>
                <p class="text-green-300 text-xs font-medium">Kode Promo</p>
                <p class="text-white font-bold tracking-widest text-sm font-mono">BERSIH30</p>
            </div>
            <button onclick="navigator.clipboard.writeText('BERSIH30')" class="text-xs font-bold text-green-300 hover:text-white transition px-3 py-1.5 rounded-lg hover:bg-white/10">SALIN</button>
        </div>

        <button class="mt-4 w-full py-3 rounded-xl font-bold text-sm transition" style="background:#22c55e;color:#0d3d2b;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
            KLAIM SEKARANG →
        </button>
    </div>
</div>

@endsection