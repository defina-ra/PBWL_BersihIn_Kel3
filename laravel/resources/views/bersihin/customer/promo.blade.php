@extends('bersihin.layouts.app')

@section('page-title', 'Promo & Voucher')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap');

    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .promo-hero {
        background: linear-gradient(135deg, #0d3d2e 0%, #1a5c42 40%, #0f4d35 100%);
        position: relative;
        overflow: hidden;
        border-radius: 20px;
    }
    .promo-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(52,211,153,0.15) 0%, transparent 70%);
        border-radius: 50%;
    }
    .promo-hero::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: 20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(16,185,129,0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .featured-badge {
        background: linear-gradient(135deg, #f59e0b, #f97316);
        color: white;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .voucher-card {
        position: relative;
        background: white;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        border: 1px solid #f0fdf4;
    }
    .voucher-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 40px rgba(15,77,53,0.15);
        border-color: #bbf7d0;
    }
    .voucher-card::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(180deg, #10b981, #059669);
    }
    .voucher-card.blue::before { background: linear-gradient(180deg, #3b82f6, #2563eb); }
    .voucher-card.amber::before { background: linear-gradient(180deg, #f59e0b, #d97706); }
    .voucher-card.purple::before { background: linear-gradient(180deg, #8b5cf6, #7c3aed); }

    .klaim-btn {
        background: linear-gradient(135deg, #059669, #10b981);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 6px 18px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .klaim-btn:hover {
        background: linear-gradient(135deg, #047857, #059669);
        transform: scale(1.03);
        box-shadow: 0 4px 12px rgba(5,150,105,0.3);
    }
    .klaim-btn.used {
        background: #e5e7eb;
        color: #9ca3af;
        cursor: not-allowed;
    }

    .tier-badge-gold {
        background: linear-gradient(135deg, #f59e0b, #fbbf24);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 800;
    }

    .stat-card {
        background: white;
        border-radius: 14px;
        border: 1px solid #f0fdf4;
        transition: all 0.2s;
    }
    .stat-card:hover {
        border-color: #bbf7d0;
        box-shadow: 0 4px 16px rgba(16,185,129,0.1);
    }

    .progress-bar {
        height: 8px;
        background: #dcfce7;
        border-radius: 99px;
        overflow: hidden;
    }
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #10b981, #34d399);
        border-radius: 99px;
        transition: width 1s ease;
    }

    .weekly-card {
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        border: 1.5px solid #bbf7d0;
        border-radius: 16px;
    }

    .flash-banner {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        border: 1.5px solid #fcd34d;
        border-radius: 14px;
        animation: flashPulse 3s ease-in-out infinite;
    }
    @keyframes flashPulse {
        0%, 100% { border-color: #fcd34d; }
        50% { border-color: #f59e0b; box-shadow: 0 0 16px rgba(245,158,11,0.2); }
    }

    .countdown-box {
        background: rgba(0,0,0,0.08);
        border-radius: 8px;
        padding: 4px 10px;
        font-weight: 800;
        font-size: 16px;
        color: #1a5c42;
        letter-spacing: 1px;
        font-variant-numeric: tabular-nums;
    }

    .tab-btn {
        padding: 8px 20px;
        border-radius: 99px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        border: none;
        background: transparent;
        color: #6b7280;
    }
    .tab-btn.active {
        background: linear-gradient(135deg, #059669, #10b981);
        color: white;
        box-shadow: 0 4px 12px rgba(5,150,105,0.25);
    }
    .tab-btn:hover:not(.active) { background: #f0fdf4; color: #059669; }

    .loyalty-progress {
        background: linear-gradient(135deg, #0d3d2e 0%, #1a5c42 100%);
        border-radius: 20px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .loyalty-progress::before {
        content: '';
        position: absolute;
        top: 0; right: 0; bottom: 0; left: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Ccircle cx='30' cy='30' r='20'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .section-title {
        font-size: 17px;
        font-weight: 700;
        color: #064e3b;
    }
</style>

<div class="p-6 max-w-6xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Promo & Reward</h1>
            <p class="text-gray-500 text-sm mt-0.5">Hemat lebih banyak dengan penawaran eksklusif khusus kamu</p>
        </div>
        <div class="flex items-center gap-2 bg-amber-50 border border-amber-200 rounded-full px-4 py-2">
            <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
            <span class="text-sm font-700 text-amber-700 font-bold">Gold Member</span>
        </div>
    </div>

    {{-- Hero Banner --}}
    <div class="promo-hero p-0 flex flex-col md:flex-row overflow-hidden" style="min-height:200px">
        <div class="flex-1 p-8 z-10 relative flex flex-col justify-center">
            <span class="featured-badge inline-block w-fit mb-3">⚡ Flash Deal · Hari Ini Saja</span>
            <h2 class="text-white font-bold text-2xl md:text-3xl leading-tight mb-2" style="font-family:'DM Serif Display',serif;">
                Deep Cleaning Special<br>
                <span class="text-emerald-300">Diskon 30%</span> Semua Layanan
            </h2>
            <p class="text-emerald-100 text-sm mb-5 max-w-sm">Rumah bersih bintang lima kini lebih terjangkau. Berlaku untuk pemesanan hari ini hingga pukul 23:59.</p>
            <div class="flex items-center gap-4 flex-wrap">
                <a href="#" class="bg-white text-emerald-800 font-bold text-sm px-6 py-2.5 rounded-full hover:bg-emerald-50 transition inline-block">Klaim Sekarang →</a>
                <div class="flex items-center gap-2">
                    <span class="text-emerald-300 text-xs font-medium">Berakhir dalam</span>
                    <div class="flex gap-1">
                        <span class="countdown-box" id="jam">05</span>
                        <span class="text-white font-bold text-lg">:</span>
                        <span class="countdown-box" id="menit">42</span>
                        <span class="text-white font-bold text-lg">:</span>
                        <span class="countdown-box" id="detik">17</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:w-80 relative overflow-hidden" style="min-height:180px">
            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&q=80"
                 alt="Cleaning" class="w-full h-full object-cover opacity-80"
                 style="position:absolute;inset:0">
            <div class="absolute inset-0" style="background:linear-gradient(90deg,#0d3d2e 0%,transparent 40%)"></div>
        </div>
    </div>

    {{-- Tantangan & Loyalty Row --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Weekly Challenge --}}
        <div class="weekly-card p-5">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <p class="font-700 text-gray-900 font-bold text-sm">Tantangan Mingguan</p>
                        <p class="text-xs text-gray-500">Reset setiap Senin</p>
                    </div>
                </div>
                <span class="featured-badge text-xs">Limited</span>
            </div>
            <div class="flex items-end justify-between mb-2">
                <div>
                    <span class="text-2xl font-black text-emerald-700">3</span>
                    <span class="text-gray-400 font-medium">/5</span>
                    <p class="text-xs text-gray-500 mt-0.5">pesanan selesai</p>
                </div>
                <p class="text-xs text-emerald-600 font-medium text-right">Selesaikan 2 lagi<br>untuk unlock diskon <span class="font-bold">15%</span></p>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width:60%"></div>
            </div>
            <p class="text-xs text-gray-400 mt-2">🎯 Reward: Diskon 15% untuk semua layanan minggu depan</p>
        </div>

        {{-- Loyalty Tier --}}
        <div class="loyalty-progress p-5">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-emerald-300 text-xs font-medium mb-1">Status Keanggotaan</p>
                    <p class="text-white font-bold text-lg">Defina Ramadhani</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-emerald-300 mb-1">Tier saat ini</p>
                    <span class="text-2xl font-black" style="background:linear-gradient(135deg,#f59e0b,#fbbf24);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Gold ✦</span>
                </div>
            </div>
            <div class="flex justify-between text-xs text-emerald-300 mb-1.5">
                <span>Silver</span><span>Gold ← kamu disini</span><span>Platinum</span>
            </div>
            <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                <div class="h-full rounded-full" style="width:65%;background:linear-gradient(90deg,#f59e0b,#fbbf24)"></div>
            </div>
            <p class="text-emerald-200 text-xs mt-2">Butuh <span class="font-bold text-white">350 poin lagi</span> untuk naik ke Platinum 🚀</p>
        </div>

    </div>

    {{-- Flash Sale Kecil --}}
    <div class="flash-banner p-4 flex items-center justify-between flex-wrap gap-3">
        <div class="flex items-center gap-3">
            <span class="text-2xl">🔥</span>
            <div>
                <p class="font-bold text-amber-900 text-sm">Flash Voucher — Cuci Kasur Pro</p>
                <p class="text-amber-700 text-xs">Tersisa <span class="font-bold">12 klaim</span> · Potongan Rp 40.000</p>
            </div>
        </div>
        <button class="klaim-btn" style="background:linear-gradient(135deg,#d97706,#f59e0b)">Klaim Cepat →</button>
    </div>

    {{-- Voucher Section --}}
    <div>
        <div class="flex items-center justify-between mb-4">
            <p class="section-title">Voucher Tersedia</p>
            <div class="flex gap-1 bg-gray-50 p-1 rounded-full border border-gray-100">
                <button class="tab-btn active" onclick="filterVoucher(this,'semua')">Semua</button>
                <button class="tab-btn" onclick="filterVoucher(this,'diskon')">Diskon</button>
                <button class="tab-btn" onclick="filterVoucher(this,'gratis')">Gratis Ongkir</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4" id="voucherGrid">

            {{-- Voucher 1 --}}
            <div class="voucher-card p-4" data-type="diskon">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background:#dcfce7">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a2 2 0 012-2z"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="font-bold text-gray-900 text-sm">Potongan Rp 15.000</p>
                            <span class="text-xs bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-full font-medium">Aktif</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-0.5">Khusus Cuci AC · Min. order Rp 100.000</p>
                    </div>
                </div>
                <div class="border-t border-dashed border-gray-100 pt-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400">Berlaku hingga</p>
                        <p class="text-xs font-semibold text-gray-600">30 Nov 2025</p>
                    </div>
                    <button class="klaim-btn">KLAIM</button>
                </div>
            </div>

            {{-- Voucher 2 --}}
            <div class="voucher-card blue p-4" data-type="diskon">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background:#dbeafe">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="font-bold text-gray-900 text-sm">Potongan Rp 25.000</p>
                            <span class="text-xs bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full font-medium">Hot 🔥</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-0.5">Cuci Kasur Pro · Min. order Rp 150.000</p>
                    </div>
                </div>
                <div class="border-t border-dashed border-gray-100 pt-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400">Berlaku hingga</p>
                        <p class="text-xs font-semibold text-gray-600">21 Nov 2025</p>
                    </div>
                    <button class="klaim-btn" style="background:linear-gradient(135deg,#2563eb,#3b82f6)">KLAIM</button>
                </div>
            </div>

            {{-- Voucher 3 --}}
            <div class="voucher-card amber p-4" data-type="gratis">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background:#fef3c7">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="font-bold text-gray-900 text-sm">Hemat 10%</p>
                            <span class="text-xs bg-amber-50 text-amber-600 px-2 py-0.5 rounded-full font-medium">Eksklusif</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-0.5">Hydro-Vacuum · Semua kategori</p>
                    </div>
                </div>
                <div class="border-t border-dashed border-gray-100 pt-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400">Berlaku hingga</p>
                        <p class="text-xs font-semibold text-gray-600">30 Nov 2025</p>
                    </div>
                    <button class="klaim-btn" style="background:linear-gradient(135deg,#d97706,#f59e0b)">KLAIM</button>
                </div>
            </div>

            {{-- Voucher 4 --}}
            <div class="voucher-card purple p-4" data-type="diskon">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background:#ede9fe">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="font-bold text-gray-900 text-sm">Gold Reward: Rp 50.000</p>
                            <span class="text-xs bg-purple-50 text-purple-600 px-2 py-0.5 rounded-full font-medium">Gold ✦</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-0.5">Khusus member Gold · Semua layanan</p>
                    </div>
                </div>
                <div class="border-t border-dashed border-gray-100 pt-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400">Berlaku hingga</p>
                        <p class="text-xs font-semibold text-gray-600">31 Des 2025</p>
                    </div>
                    <button class="klaim-btn" style="background:linear-gradient(135deg,#7c3aed,#8b5cf6)">KLAIM</button>
                </div>
            </div>

            {{-- Voucher 5 (sudah diklaim) --}}
            <div class="voucher-card p-4 opacity-60" data-type="gratis">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 bg-gray-100">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="font-bold text-gray-600 text-sm">Gratis Biaya Perjalanan</p>
                            <span class="text-xs bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full font-medium">Terpakai</span>
                        </div>
                        <p class="text-xs text-gray-400 mt-0.5">Semua layanan · Radius 10 km</p>
                    </div>
                </div>
                <div class="border-t border-dashed border-gray-100 pt-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400">Kadaluarsa</p>
                        <p class="text-xs font-semibold text-gray-400">10 Nov 2025</p>
                    </div>
                    <button class="klaim-btn used" disabled>TERPAKAI</button>
                </div>
            </div>

            {{-- Voucher 6 --}}
            <div class="voucher-card p-4" data-type="diskon">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background:#dcfce7">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="font-bold text-gray-900 text-sm">Deep Clean Bundle −20%</p>
                            <span class="text-xs bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-full font-medium">Baru</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-0.5">Paket rumah lengkap · Min. 2 layanan</p>
                    </div>
                </div>
                <div class="border-t border-dashed border-gray-100 pt-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400">Berlaku hingga</p>
                        <p class="text-xs font-semibold text-gray-600">15 Des 2025</p>
                    </div>
                    <button class="klaim-btn">KLAIM</button>
                </div>
            </div>

        </div>
    </div>

    {{-- Stats Row --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        <div class="stat-card p-4 text-center">
            <p class="text-2xl font-black text-emerald-700">124</p>
            <p class="text-xs text-gray-500 mt-1 font-medium">Promo Digunakan</p>
        </div>
        <div class="stat-card p-4 text-center">
            <p class="text-2xl font-black text-blue-600">18.5%</p>
            <p class="text-xs text-gray-500 mt-1 font-medium">Rata-rata Hemat</p>
        </div>
        <div class="stat-card p-4 text-center">
            <p class="text-2xl font-black text-amber-600">1.2K</p>
            <p class="text-xs text-gray-500 mt-1 font-medium">Poin Terkumpul</p>
        </div>
        <div class="stat-card p-4 text-center">
            <p class="text-2xl font-black" style="background:linear-gradient(135deg,#f59e0b,#fbbf24);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Gold</p>
            <p class="text-xs text-gray-500 mt-1 font-medium">Loyalty Tier</p>
        </div>
    </div>

</div>

<script>
// Countdown timer
function updateCountdown() {
    const now = new Date();
    const end = new Date();
    end.setHours(23, 59, 59, 0);
    let diff = Math.max(0, Math.floor((end - now) / 1000));
    const j = Math.floor(diff / 3600);
    diff %= 3600;
    const m = Math.floor(diff / 60);
    const s = diff % 60;
    document.getElementById('jam').textContent = String(j).padStart(2,'0');
    document.getElementById('menit').textContent = String(m).padStart(2,'0');
    document.getElementById('detik').textContent = String(s).padStart(2,'0');
}
updateCountdown();
setInterval(updateCountdown, 1000);

// Filter voucher
function filterVoucher(btn, type) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('#voucherGrid .voucher-card').forEach(card => {
        if (type === 'semua' || card.dataset.type === type) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}

// Klaim button interaction
document.querySelectorAll('.klaim-btn:not(.used)').forEach(btn => {
    btn.addEventListener('click', function() {
        const orig = this.textContent;
        this.textContent = '✓ Diklaim!';
        this.style.background = 'linear-gradient(135deg,#059669,#10b981)';
        setTimeout(() => { this.textContent = orig; }, 2000);
    });
});
</script>

@endsection