@extends('bersihin.layouts.app')

@section('page-title', 'Riwayat Pesanan')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap');
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .order-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #f0fdf4;
        transition: all 0.25s cubic-bezier(0.4,0,0.2,1);
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        overflow: hidden;
    }
    .order-card:hover {
        border-color: #bbf7d0;
        box-shadow: 0 8px 28px rgba(15,77,53,0.10);
        transform: translateY(-2px);
    }

    .status-badge {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 3px 10px;
        border-radius: 99px;
    }
    .badge-selesai   { background:#dcfce7; color:#15803d; }
    .badge-batal     { background:#fee2e2; color:#b91c1c; }
    .badge-proses    { background:#fef3c7; color:#b45309; }
    .badge-pending   { background:#e0f2fe; color:#0369a1; }

    .btn-outline {
        border: 1.5px solid #d1d5db;
        color: #374151;
        background: white;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-outline:hover { border-color:#10b981; color:#059669; background:#f0fdf4; }

    .btn-primary {
        background: linear-gradient(135deg,#059669,#10b981);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-primary:hover { background:linear-gradient(135deg,#047857,#059669); box-shadow:0 4px 12px rgba(5,150,105,0.3); }

    .btn-danger {
        border: 1.5px solid #fecaca;
        color: #b91c1c;
        background: white;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-danger:hover { background:#fef2f2; }

    .stat-hero {
        background: linear-gradient(135deg, #0d3d2e 0%, #1a5c42 50%, #0f4d35 100%);
        border-radius: 20px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .stat-hero::before {
        content:'';
        position:absolute;
        top:-40%;right:-10%;
        width:280px;height:280px;
        background:radial-gradient(circle,rgba(52,211,153,0.18) 0%,transparent 70%);
        border-radius:50%;
    }
    .stat-hero::after {
        content:'';
        position:absolute;
        bottom:-30%;left:30%;
        width:200px;height:200px;
        background:radial-gradient(circle,rgba(16,185,129,0.12) 0%,transparent 70%);
        border-radius:50%;
    }

    .mini-stat {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 12px;
        padding: 12px 16px;
    }

    .promo-widget {
        background: linear-gradient(135deg,#f0fdf4,#dcfce7);
        border: 1.5px solid #bbf7d0;
        border-radius: 16px;
    }
    .promo-klaim {
        width:100%;
        background: linear-gradient(135deg,#059669,#10b981);
        color:white;
        border:none;
        border-radius:10px;
        padding:10px;
        font-size:13px;
        font-weight:700;
        cursor:pointer;
        transition:all 0.2s;
    }
    .promo-klaim:hover { background:linear-gradient(135deg,#047857,#059669); box-shadow:0 4px 12px rgba(5,150,105,0.3); }

    .help-card {
        background:white;
        border:1px solid #f0fdf4;
        border-radius:16px;
        transition:all 0.2s;
    }
    .help-card:hover { border-color:#bbf7d0; box-shadow:0 4px 16px rgba(16,185,129,0.1); }

    .filter-tab {
        padding:7px 16px;
        border-radius:99px;
        font-size:12px;
        font-weight:600;
        cursor:pointer;
        border:none;
        background:transparent;
        color:#6b7280;
        transition:all 0.2s;
    }
    .filter-tab.active {
        background:linear-gradient(135deg,#059669,#10b981);
        color:white;
        box-shadow:0 3px 10px rgba(5,150,105,0.25);
    }
    .filter-tab:hover:not(.active) { background:#f0fdf4; color:#059669; }

    .order-img {
        width:52px; height:52px;
        border-radius:12px;
        object-fit:cover;
        flex-shrink:0;
    }

    .rating-star { color:#f59e0b; font-size:14px; }
    .rating-star.empty { color:#e5e7eb; }

    .search-input {
        border:1.5px solid #e5e7eb;
        border-radius:10px;
        padding:8px 14px 8px 36px;
        font-size:13px;
        outline:none;
        transition:all 0.2s;
        background:white;
        width:220px;
    }
    .search-input:focus { border-color:#10b981; box-shadow:0 0 0 3px rgba(16,185,129,0.1); }

    .empty-state { display:none; }

    /* Modal */
    .modal-overlay {
        display:none;
        position:fixed;inset:0;
        background:rgba(0,0,0,0.5);
        z-index:999;
        align-items:center;
        justify-content:center;
    }
    .modal-overlay.open { display:flex; }
    .modal-box {
        background:white;
        border-radius:20px;
        padding:28px;
        max-width:420px;
        width:90%;
        animation: popIn 0.2s ease;
    }
    @keyframes popIn { from{transform:scale(0.95);opacity:0} to{transform:scale(1);opacity:1} }
</style>

<div class="p-6 max-w-6xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between flex-wrap gap-3">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Riwayat Pesanan</h1>
            <p class="text-gray-500 text-sm mt-0.5">Lihat, ulang, dan kelola semua pesanan kebersihanmu</p>
        </div>
        <a href="/bersihin/booking"
           class="flex items-center gap-2 text-sm font-bold text-white px-5 py-2.5 rounded-full"
           style="background:linear-gradient(135deg,#059669,#10b981);box-shadow:0 4px 14px rgba(5,150,105,0.3)">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Pesan Layanan Baru
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

        {{-- LEFT: Order List --}}
        <div class="lg:col-span-2 space-y-4">

            {{-- Filters --}}
            <div class="flex items-center justify-between flex-wrap gap-3">
                <div class="flex gap-1 bg-gray-50 p-1 rounded-full border border-gray-100">
                    <button class="filter-tab active" onclick="filterOrder(this,'semua')">Semua</button>
                    <button class="filter-tab" onclick="filterOrder(this,'selesai')">Selesai</button>
                    <button class="filter-tab" onclick="filterOrder(this,'proses')">Diproses</button>
                    <button class="filter-tab" onclick="filterOrder(this,'batal')">Dibatalkan</button>
                </div>
                <div class="relative">
                    <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" class="search-input" placeholder="Cari pesanan..." oninput="searchOrder(this.value)">
                </div>
            </div>

            {{-- Order Cards --}}
            <div id="orderList" class="space-y-3">

                {{-- 1. Deep Cleaning - Selesai --}}
                <div class="order-card" data-status="selesai" data-name="deep cleaning">
                    <div class="p-4">
                        <div class="flex items-start gap-3">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=100&q=80"
                                 alt="Deep Cleaning" class="order-img">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2 flex-wrap">
                                    <div>
                                        <p class="font-bold text-gray-900">Deep Cleaning</p>
                                        <p class="text-xs text-gray-500 mt-0.5">📅 15 Mei 2024 · 09:00 WIB &nbsp;·&nbsp; 🏠 Rumah, 3 Lantai</p>
                                        <p class="text-xs text-gray-400 mt-0.5">Petugas: <span class="font-medium text-gray-600">Budi Santoso</span></p>
                                    </div>
                                    <span class="status-badge badge-selesai">✓ Selesai</span>
                                </div>
                                <div class="flex items-center justify-between mt-3 flex-wrap gap-2">
                                    <div>
                                        <p class="text-xs text-gray-400">Total Pembayaran</p>
                                        <p class="font-bold text-gray-900">Rp 250.000</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="btn-outline" onclick="showDetail('deep-cleaning')">Detail</button>
                                        <button class="btn-outline">Pesan Lagi</button>
                                        <button class="btn-primary" onclick="openUlasan('Deep Cleaning')">Beri Ulasan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Rating bar --}}
                    <div class="px-4 pb-3 border-t border-gray-50 pt-3 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <p class="text-xs text-gray-500">Kamu belum memberi ulasan untuk pesanan ini</p>
                        <span class="text-xs text-emerald-600 font-medium cursor-pointer hover:underline ml-auto" onclick="openUlasan('Deep Cleaning')">Beri Ulasan →</span>
                    </div>
                </div>

                {{-- 2. Bersih Rutin - Dibatalkan --}}
                <div class="order-card" data-status="batal" data-name="bersih rutin">
                    <div class="p-4">
                        <div class="flex items-start gap-3">
                            <img src="https://images.unsplash.com/photo-1527515545081-5db817172677?w=100&q=80"
                                 alt="Bersih Rutin" class="order-img">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2 flex-wrap">
                                    <div>
                                        <p class="font-bold text-gray-900">Bersih Rutin</p>
                                        <p class="text-xs text-gray-500 mt-0.5">📅 10 Mei 2024 · 13:00 WIB &nbsp;·&nbsp; 🏠 Apartemen</p>
                                        <p class="text-xs text-red-400 mt-0.5">Alasan: Jadwal bentrok</p>
                                    </div>
                                    <span class="status-badge badge-batal">✕ Dibatalkan</span>
                                </div>
                                <div class="flex items-center justify-between mt-3 flex-wrap gap-2">
                                    <div>
                                        <p class="text-xs text-gray-400">Total Pembayaran</p>
                                        <p class="font-bold text-gray-400 line-through">Rp 100.000</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="btn-outline">Detail</button>
                                        <button class="btn-outline">Pesan Lagi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 3. Cuci Kasur - Selesai --}}
                <div class="order-card" data-status="selesai" data-name="cuci kasur">
                    <div class="p-4">
                        <div class="flex items-start gap-3">
                            <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=100&q=80"
                                 alt="Cuci Kasur" class="order-img">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2 flex-wrap">
                                    <div>
                                        <p class="font-bold text-gray-900">Cuci Kasur Pro</p>
                                        <p class="text-xs text-gray-500 mt-0.5">📅 01 Mei 2024 · 10:00 WIB &nbsp;·&nbsp; 🛏 2 Kasur</p>
                                        <p class="text-xs text-gray-400 mt-0.5">Petugas: <span class="font-medium text-gray-600">Rina Wati</span></p>
                                    </div>
                                    <span class="status-badge badge-selesai">✓ Selesai</span>
                                </div>
                                {{-- Sudah ada ulasan --}}
                                <div class="flex items-center gap-1 mt-2">
                                    <span class="rating-star">★</span><span class="rating-star">★</span><span class="rating-star">★</span><span class="rating-star">★</span><span class="rating-star empty">★</span>
                                    <span class="text-xs text-gray-500 ml-1">"Kasur jadi bersih dan wangi, petugasnya ramah!"</span>
                                </div>
                                <div class="flex items-center justify-between mt-3 flex-wrap gap-2">
                                    <div>
                                        <p class="text-xs text-gray-400">Total Pembayaran</p>
                                        <p class="font-bold text-gray-900">Rp 150.000</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="btn-outline">Detail</button>
                                        <button class="btn-outline">Pesan Lagi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 4. Pembersihan Kaca - Selesai --}}
                <div class="order-card" data-status="selesai" data-name="pembersihan kaca">
                    <div class="p-4">
                        <div class="flex items-start gap-3">
                            <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=100&q=80"
                                 alt="Pembersihan Kaca" class="order-img">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2 flex-wrap">
                                    <div>
                                        <p class="font-bold text-gray-900">Pembersihan Kaca</p>
                                        <p class="text-xs text-gray-500 mt-0.5">📅 22 Apr 2024 · 08:30 WIB &nbsp;·&nbsp; 🪟 Eksterior</p>
                                        <p class="text-xs text-gray-400 mt-0.5">Petugas: <span class="font-medium text-gray-600">Agus Purnomo</span></p>
                                    </div>
                                    <span class="status-badge badge-selesai">✓ Selesai</span>
                                </div>
                                <div class="flex items-center justify-between mt-3 flex-wrap gap-2">
                                    <div>
                                        <p class="text-xs text-gray-400">Total Pembayaran</p>
                                        <p class="font-bold text-gray-900">Rp 120.000</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="btn-outline">Detail</button>
                                        <button class="btn-outline">Pesan Lagi</button>
                                        <button class="btn-primary" onclick="openUlasan('Pembersihan Kaca')">Beri Ulasan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 5. Hydro Vacuum - Sedang Diproses --}}
                <div class="order-card" data-status="proses" data-name="hydro vacuum">
                    <div class="p-4">
                        <div class="flex items-start gap-3">
                            <img src="https://images.unsplash.com/photo-1563453392212-326f5e854473?w=100&q=80"
                                 alt="Hydro Vacuum" class="order-img">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2 flex-wrap">
                                    <div>
                                        <p class="font-bold text-gray-900">Hydro-Vacuum Sofa</p>
                                        <p class="text-xs text-gray-500 mt-0.5">📅 20 Mei 2024 · 14:00 WIB &nbsp;·&nbsp; 🛋 3 Seater</p>
                                        <p class="text-xs text-amber-600 mt-0.5 font-medium">⏳ Petugas dalam perjalanan</p>
                                    </div>
                                    <span class="status-badge badge-proses">⏳ Diproses</span>
                                </div>
                                <div class="flex items-center justify-between mt-3 flex-wrap gap-2">
                                    <div>
                                        <p class="text-xs text-gray-400">Total Pembayaran</p>
                                        <p class="font-bold text-gray-900">Rp 200.000</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="btn-outline">Lacak Pesanan</button>
                                        <button class="btn-danger">Batalkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Live tracker --}}
                    <div class="px-4 pb-3 border-t border-amber-50 pt-3 bg-amber-50/40">
                        <div class="flex items-center gap-2 text-xs text-amber-700">
                            <span class="w-2 h-2 bg-amber-400 rounded-full animate-pulse"></span>
                            Estimasi tiba: <span class="font-bold">10 menit lagi</span> · Hub. petugas: <a href="tel:08123456789" class="font-bold underline">0812-3456-789</a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Empty state --}}
            <div id="emptyState" class="empty-state text-center py-12">
                <div class="text-5xl mb-3">🔍</div>
                <p class="font-semibold text-gray-700">Pesanan tidak ditemukan</p>
                <p class="text-sm text-gray-400 mt-1">Coba filter atau kata kunci yang berbeda</p>
            </div>

        </div>

        {{-- RIGHT: Sidebar Widgets --}}
        <div class="space-y-4">

            {{-- Total Kebersihan Bulan Ini --}}
            <div class="stat-hero p-5 relative z-10">
                <p class="text-emerald-300 text-xs font-medium mb-1">Total Kebersihan Bulan Ini</p>
                <p class="text-3xl font-black text-white mb-4" style="font-family:'DM Serif Display',serif;">Rp 520.000</p>
                <div class="grid grid-cols-3 gap-2">
                    <div class="mini-stat text-center">
                        <p class="text-xl font-black text-white">4</p>
                        <p class="text-emerald-300 text-xs mt-0.5">Pesanan</p>
                    </div>
                    <div class="mini-stat text-center">
                        <p class="text-xl font-black text-white">3</p>
                        <p class="text-emerald-300 text-xs mt-0.5">Selesai</p>
                    </div>
                    <div class="mini-stat text-center">
                        <p class="text-xl font-black text-white">4.8</p>
                        <p class="text-emerald-300 text-xs mt-0.5">Rating</p>
                    </div>
                </div>
                <p class="text-emerald-400 text-xs mt-3">↑ 12% lebih banyak dari bulan lalu</p>
            </div>

            {{-- Petugas Favorit --}}
            <div class="bg-white border border-gray-100 rounded-16 p-4" style="border-radius:16px">
                <p class="font-bold text-gray-900 text-sm mb-3">⭐ Petugas Favoritmu</p>
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <img src="https://i.pravatar.cc/40?img=11" class="w-9 h-9 rounded-full object-cover">
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Budi Santoso</p>
                            <p class="text-xs text-gray-400">3 kali jasa · ⭐ 4.9</p>
                        </div>
                        <button class="btn-primary text-xs px-3 py-1.5">Pesan</button>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="https://i.pravatar.cc/40?img=5" class="w-9 h-9 rounded-full object-cover">
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Rina Wati</p>
                            <p class="text-xs text-gray-400">2 kali jasa · ⭐ 4.8</p>
                        </div>
                        <button class="btn-primary text-xs px-3 py-1.5">Pesan</button>
                    </div>
                </div>
            </div>

            {{-- Promo Widget --}}
            <div class="promo-widget p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full">PROMO MINGGU INI</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="font-bold text-gray-900 text-sm">Diskon 20% Deep Cleaning</p>
                <p class="text-xs text-gray-500 mt-1">Khusus pelanggan setia! Gunakan kode <span class="font-bold text-emerald-700">BERSIHHEMAT</span> untuk pesanan Deep Cleaning berikutnya.</p>
                <button class="promo-klaim mt-3">Klaim Sekarang</button>
            </div>

            {{-- Statistik Layanan --}}
            <div class="bg-white border border-gray-100 rounded-2xl p-4">
                <p class="font-bold text-gray-900 text-sm mb-3">📊 Layanan Terpopuler</p>
                <div class="space-y-2.5">
                    <div>
                        <div class="flex justify-between text-xs mb-1"><span class="text-gray-700 font-medium">Deep Cleaning</span><span class="text-emerald-600 font-bold">38%</span></div>
                        <div class="h-1.5 bg-gray-100 rounded-full"><div class="h-full bg-emerald-500 rounded-full" style="width:38%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-xs mb-1"><span class="text-gray-700 font-medium">Cuci Kasur</span><span class="text-emerald-600 font-bold">29%</span></div>
                        <div class="h-1.5 bg-gray-100 rounded-full"><div class="h-full bg-emerald-400 rounded-full" style="width:29%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-xs mb-1"><span class="text-gray-700 font-medium">Bersih Rutin</span><span class="text-emerald-600 font-bold">20%</span></div>
                        <div class="h-1.5 bg-gray-100 rounded-full"><div class="h-full bg-emerald-300 rounded-full" style="width:20%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-xs mb-1"><span class="text-gray-700 font-medium">Lainnya</span><span class="text-gray-400 font-bold">13%</span></div>
                        <div class="h-1.5 bg-gray-100 rounded-full"><div class="h-full bg-gray-200 rounded-full" style="width:13%"></div></div>
                    </div>
                </div>
            </div>

            {{-- Help --}}
            <div class="help-card p-4 flex items-center gap-3 cursor-pointer">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" style="background:#dcfce7">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <div>
                    <p class="font-bold text-gray-900 text-sm">Bantuan 24/7</p>
                    <p class="text-xs text-gray-500">Butuh bantuan dengan pesananmu?</p>
                </div>
                <svg class="w-4 h-4 text-gray-400 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </div>

        </div>
    </div>
</div>

{{-- Modal Ulasan --}}
<div class="modal-overlay" id="ulasanModal">
    <div class="modal-box">
        <div class="flex items-center justify-between mb-4">
            <p class="font-bold text-gray-900 text-lg" id="modalTitle">Beri Ulasan</p>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <p class="text-sm text-gray-500 mb-4">Bagikan pengalamanmu agar petugas kami bisa terus meningkatkan kualitas layanan.</p>
        <div class="flex gap-2 mb-4" id="starRating">
            <span class="text-3xl cursor-pointer star" onclick="setRating(1)">☆</span>
            <span class="text-3xl cursor-pointer star" onclick="setRating(2)">☆</span>
            <span class="text-3xl cursor-pointer star" onclick="setRating(3)">☆</span>
            <span class="text-3xl cursor-pointer star" onclick="setRating(4)">☆</span>
            <span class="text-3xl cursor-pointer star" onclick="setRating(5)">☆</span>
        </div>
        <textarea class="w-full border border-gray-200 rounded-12 p-3 text-sm resize-none focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-100 transition" style="border-radius:12px" rows="3" placeholder="Ceritakan pengalamanmu..."></textarea>
        <div class="flex gap-2 mt-4">
            <button onclick="closeModal()" class="btn-outline flex-1">Nanti Saja</button>
            <button class="btn-primary flex-1" onclick="submitUlasan()">Kirim Ulasan</button>
        </div>
    </div>
</div>

<script>
function filterOrder(btn, status) {
    document.querySelectorAll('.filter-tab').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const cards = document.querySelectorAll('#orderList .order-card');
    let visible = 0;
    cards.forEach(c => {
        const show = status === 'semua' || c.dataset.status === status;
        c.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    document.getElementById('emptyState').style.display = visible === 0 ? 'block' : 'none';
}

function searchOrder(val) {
    const q = val.toLowerCase();
    const cards = document.querySelectorAll('#orderList .order-card');
    let visible = 0;
    cards.forEach(c => {
        const show = c.dataset.name.includes(q);
        c.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    document.getElementById('emptyState').style.display = visible === 0 ? 'block' : 'none';
}

function openUlasan(name) {
    document.getElementById('modalTitle').textContent = 'Ulasan untuk ' + name;
    document.getElementById('ulasanModal').classList.add('open');
    setRating(0);
}
function closeModal() {
    document.getElementById('ulasanModal').classList.remove('open');
}
function setRating(n) {
    document.querySelectorAll('.star').forEach((s, i) => {
        s.textContent = i < n ? '★' : '☆';
        s.style.color = i < n ? '#f59e0b' : '#d1d5db';
    });
}
function submitUlasan() {
    closeModal();
    alert('Terima kasih atas ulasanmu! 🎉');
}
function showDetail(id) { alert('Detail pesanan ' + id); }
</script>

@endsection