@extends('bersihin.layouts.customer')

@section('page-title', 'Pesanan Saya')
@section('page-subtitle', 'Kelola semua pesanan kebersihan kamu')

@section('content')
<style>
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 18px 20px;
        border: 1px solid rgba(0,0,0,0.06);
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        display: flex; align-items: center; gap: 14px;
        transition: all 0.2s;
    }
    .stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.08); }

    .stat-icon {
        width: 46px; height: 46px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }

    .order-card {
        background: white;
        border-radius: 20px;
        border: 1px solid rgba(0,0,0,0.06);
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        overflow: hidden;
        transition: all 0.2s;
    }
    .order-card:hover { box-shadow: 0 8px 28px rgba(0,0,0,0.09); }

    .badge {
        display: inline-flex; align-items: center;
        padding: 4px 10px; border-radius: 999px;
        font-size: 11px; font-weight: 700; letter-spacing: 0.3px;
    }

    .btn-outline {
        padding: 8px 16px; border-radius: 10px;
        border: 1.5px solid #e5e7eb;
        font-size: 12px; font-weight: 700; color: #374151;
        cursor: pointer; background: white;
        transition: all 0.18s;
    }
    .btn-outline:hover { border-color: #16a34a; color: #16a34a; background: #f0fdf4; }

    .btn-solid {
        padding: 8px 16px; border-radius: 10px;
        font-size: 12px; font-weight: 700; color: white;
        cursor: pointer; border: none;
        background: linear-gradient(135deg, #16a34a, #0d9044);
        transition: all 0.18s;
        box-shadow: 0 4px 12px rgba(22,163,74,0.25);
    }
    .btn-solid:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(22,163,74,0.35); }

    /* Tab filter */
    .tab-btn {
        padding: 8px 18px; border-radius: 10px;
        font-size: 13px; font-weight: 600; color: #6b7280;
        cursor: pointer; border: none; background: transparent;
        transition: all 0.18s;
    }
    .tab-btn.active {
        background: #0d3d2b; color: white;
        box-shadow: 0 4px 12px rgba(13,61,43,0.25);
    }
    .tab-btn:not(.active):hover { background: #f3f4f6; color: #374151; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(16px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeUp 0.4s ease forwards; }
    .fade-up-1 { animation-delay: 0.05s; opacity: 0; }
    .fade-up-2 { animation-delay: 0.1s; opacity: 0; }
    .fade-up-3 { animation-delay: 0.15s; opacity: 0; }
    .fade-up-4 { animation-delay: 0.2s; opacity: 0; }
</style>

<!-- HEADER -->
<div class="flex justify-between items-center mb-6 fade-up fade-up-1">
    <div>
        <h1 class="text-2xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;">Pesanan Saya</h1>
        <p class="text-gray-400 text-sm mt-0.5">Pantau semua status layanan kebersihan kamu</p>
    </div>
    <a href="/bersihin/booking" class="flex items-center gap-2 text-sm font-bold text-white px-5 py-2.5 rounded-xl transition"
       style="background:linear-gradient(135deg,#16a34a,#0d9044);box-shadow:0 4px 14px rgba(22,163,74,0.35);">
        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Pesan Layanan Baru
    </a>
</div>

<!-- STAT CARDS -->
<div class="grid grid-cols-4 gap-4 mb-6 fade-up fade-up-2">
    <div class="stat-card">
        <div class="stat-icon" style="background:#eff6ff;">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#2563eb" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Total</p>
            <p class="text-xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;">3 <span class="text-sm font-medium text-gray-400">Pesanan</span></p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background:#fffbeb;">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Proses</p>
            <p class="text-xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;">1 <span class="text-sm font-medium text-gray-400">Aktif</span></p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background:#f0fdf4;">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#16a34a" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Selesai</p>
            <p class="text-xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;">12 <span class="text-sm font-medium text-gray-400">Layanan</span></p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background:#fef3c7;">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#f59e0b" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Rating</p>
            <p class="text-xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;">4.9 <span class="text-sm font-medium text-gray-400">/ 5.0</span></p>
        </div>
    </div>
</div>

<!-- TAB FILTER -->
<div class="flex items-center gap-2 mb-5 fade-up fade-up-3 bg-white rounded-xl p-1.5 border border-gray-100 shadow-sm w-fit">
    <button class="tab-btn active" onclick="filterTab(this, 'semua')">Semua</button>
    <button class="tab-btn" onclick="filterTab(this, 'proses')">Sedang Proses</button>
    <button class="tab-btn" onclick="filterTab(this, 'selesai')">Selesai</button>
    <button class="tab-btn" onclick="filterTab(this, 'dibatalkan')">Dibatalkan</button>
</div>

<!-- ORDER CARDS -->
<div class="space-y-4 fade-up fade-up-3">

    <!-- CARD 1: Proses -->
    <div class="order-card" data-status="proses">
        <div class="flex gap-0">
            <!-- Gambar -->
            <div class="w-44 flex-shrink-0 relative">
                <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&q=80"
                     class="w-full h-full object-cover" style="min-height:180px;" alt="Deep Cleaning">
                <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent 70%,white);"></div>
            </div>

            <!-- Konten -->
            <div class="flex-1 p-6">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="font-bold text-gray-900 text-base">Deep Cleaning Service</h3>
                            <span class="badge" style="background:#dbeafe;color:#1d4ed8;">PROSES</span>
                        </div>
                        <p class="text-xs text-gray-400">Minggu, 19 Mei 2025 &bull; 10.30 WIB &bull; <span class="font-mono bg-gray-100 px-1.5 py-0.5 rounded text-xs">#BSH-99281</span></p>
                    </div>
                    <p class="text-lg font-extrabold text-green-700" style="font-family:'Sora',sans-serif;">Rp 450.000</p>
                </div>

                <div class="flex items-center gap-5 mb-4">
                    <div class="flex items-center gap-1.5 text-xs text-gray-500">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Jl. Merdeka No. 10, Bandar Lampung
                    </div>
                    <div class="flex items-center gap-1.5 text-xs text-gray-500">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                        Estimasi selesai: <strong class="text-gray-700">13.00 WIB</strong>
                    </div>
                </div>

                <div class="flex justify-between items-center border-t border-gray-100 pt-4">
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?w=80&h=80&fit=crop&crop=face"
                             class="w-9 h-9 rounded-full object-cover border-2 border-green-200" alt="Petugas">
                        <div>
                            <p class="text-xs font-bold text-gray-800">Larasati</p>
                            <p class="text-xs text-gray-400">Petugas Deep Clean &bull; ID-882</p>
                        </div>
                        <div class="flex items-center gap-1 ml-2">
                            <svg width="12" height="12" fill="#f59e0b" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <span class="text-xs font-semibold text-gray-700">4.9</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="btn-outline">Lihat Detail</button>
                        <button class="btn-solid">Hubungi Petugas</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD 2: Selesai -->
    <div class="order-card" data-status="selesai">
        <div class="flex gap-0">
            <div class="w-44 flex-shrink-0 relative">
                <img src="https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?w=400&q=80"
                     class="w-full h-full object-cover" style="min-height:180px;" alt="Regular Cleaning">
                <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent 70%,white);"></div>
            </div>
            <div class="flex-1 p-6">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="font-bold text-gray-900 text-base">Regular Cleaning</h3>
                            <span class="badge" style="background:#dcfce7;color:#15803d;">SELESAI</span>
                        </div>
                        <p class="text-xs text-gray-400">Senin, 12 Mei 2025 &bull; 08.00 WIB &bull; <span class="font-mono bg-gray-100 px-1.5 py-0.5 rounded text-xs">#BSH-99100</span></p>
                    </div>
                    <p class="text-lg font-extrabold text-green-700" style="font-family:'Sora',sans-serif;">Rp 200.000</p>
                </div>

                <div class="flex items-center gap-5 mb-4">
                    <div class="flex items-center gap-1.5 text-xs text-gray-500">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Jl. Anggrek No. 5, Bandar Lampung
                    </div>
                    <div class="flex items-center gap-1.5 text-xs text-green-600 font-semibold">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Layanan selesai tepat waktu
                    </div>
                </div>

                <div class="flex justify-between items-center border-t border-gray-100 pt-4">
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=80&h=80&fit=crop&crop=face"
                             class="w-9 h-9 rounded-full object-cover border-2 border-gray-200" alt="Petugas">
                        <div>
                            <p class="text-xs font-bold text-gray-800">Dewi Kusuma</p>
                            <p class="text-xs text-gray-400">Petugas Regular &bull; ID-754</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="btn-outline">Lihat Detail</button>
                        <button class="btn-solid" style="background:linear-gradient(135deg,#f59e0b,#d97706);box-shadow:0 4px 12px rgba(245,158,11,0.25);">
                            Beri Ulasan ★
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD 3: Dibatalkan -->
    <div class="order-card" data-status="dibatalkan">
        <div class="flex gap-0">
            <div class="w-44 flex-shrink-0 relative">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80"
                     class="w-full h-full object-cover" style="min-height:180px;filter:grayscale(60%);" alt="Window Cleaning">
                <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent 70%,white);"></div>
            </div>
            <div class="flex-1 p-6">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="font-bold text-gray-900 text-base">Window Cleaning</h3>
                            <span class="badge" style="background:#fee2e2;color:#dc2626;">DIBATALKAN</span>
                        </div>
                        <p class="text-xs text-gray-400">Rabu, 5 Mei 2025 &bull; 13.00 WIB &bull; <span class="font-mono bg-gray-100 px-1.5 py-0.5 rounded text-xs">#BSH-98877</span></p>
                    </div>
                    <p class="text-lg font-extrabold text-gray-400 line-through" style="font-family:'Sora',sans-serif;">Rp 150.000</p>
                </div>

                <div class="flex items-center gap-1.5 text-xs text-red-400 mb-4">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    Dibatalkan oleh pengguna — 2 jam sebelum jadwal
                </div>

                <div class="flex justify-between items-center border-t border-gray-100 pt-4">
                    <p class="text-xs text-gray-400">Refund sudah dikembalikan ke metode pembayaran asal</p>
                    <div class="flex gap-2">
                        <button class="btn-outline">Lihat Detail</button>
                        <button class="btn-outline" style="border-color:#16a34a;color:#16a34a;">Pesan Ulang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BANNER PROMO -->
<div class="mt-6 rounded-2xl overflow-hidden relative fade-up fade-up-4" style="background:linear-gradient(135deg,#0a2e1f,#145c3e);">
    <div class="p-8 relative z-10">
        <div class="flex items-center justify-between">
            <div class="max-w-lg">
                <span class="badge mb-3" style="background:rgba(34,197,94,0.2);color:#4ade80;">✦ PENAWARAN TERBATAS</span>
                <h2 class="text-2xl font-extrabold text-white mt-2 mb-2" style="font-family:'Sora',sans-serif;">Diskon 30% untuk Pesanan Berikutnya!</h2>
                <p class="text-green-300 text-sm leading-relaxed mb-5">Nikmati kebersihan maksimal bersama petugas profesional kami. Berlaku untuk semua kategori layanan rumah dan kantor.</p>
                <a href="/bersihin/booking" class="inline-flex items-center gap-2 bg-white text-green-800 font-bold text-sm px-6 py-3 rounded-xl hover:bg-green-50 transition">
                    Klaim & Pesan Sekarang
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="hidden lg:block">
                <img src="https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?w=300&h=200&fit=crop" class="w-56 h-36 object-cover rounded-xl opacity-60" alt="Promo">
            </div>
        </div>
    </div>
</div>

<script>
function filterTab(btn, status) {
    // Update tab active
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // Filter cards
    document.querySelectorAll('.order-card').forEach(card => {
        if (status === 'semua' || card.dataset.status === status) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

@endsection