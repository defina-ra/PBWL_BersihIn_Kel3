<?php $__env->startSection('page-title', 'Dashboard'); ?>
<?php $__env->startSection('page-subtitle', 'Selamat datang kembali'); ?>

<?php $__env->startSection('content'); ?>
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
    .card-section {
        background: white; border-radius: 20px;
        border: 1px solid rgba(0,0,0,0.06);
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        overflow: hidden;
    }
</style>

<!-- GREETING -->
<div class="mb-6">
    <h1 class="text-2xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;">Halo, <?php echo e($user->name); ?>! 👋</h1>
    <p class="text-gray-400 text-sm mt-1">Rumah bersih, hati tenang — apa yang bisa kami bantu hari ini?</p>
</div>

<!-- STAT CARDS -->
<div class="grid grid-cols-3 gap-4 mb-6">
    <div class="stat-card">
        <div class="stat-icon" style="background:#eff6ff;">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#2563eb" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Total Pesanan</p>
            <p class="text-3xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;"><?php echo e($totalPesanan); ?></p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background:#f0fdf4;">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#16a34a" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Status Aktif</p>
            <?php if($pesananAktif): ?>
            <p class="text-sm font-bold text-green-600 leading-tight mt-0.5">Ada pesanan<br>aktif</p>
            <?php else: ?>
            <p class="text-sm font-bold text-gray-400 leading-tight mt-0.5">Tidak ada<br>pesanan aktif</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background:#fffbeb;">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Voucher</p>
            <p class="text-3xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;"><?php echo e($totalVoucher); ?> <span class="text-sm font-medium text-gray-400">Tersedia</span></p>
        </div>
    </div>
</div>

<!-- PESANAN AKTIF -->
<?php if($pesananAktif): ?>
<div class="card-section mb-6">
    <div class="p-6 border-b border-gray-100 flex justify-between items-start">
        <div>
            <h2 class="font-bold text-gray-900 text-base">Pesanan Aktif</h2>
            <p class="text-sm text-gray-400 mt-0.5">ID: <span class="font-mono text-xs bg-gray-100 px-2 py-0.5 rounded">#BRS-<?php echo e($pesananAktif->id); ?></span></p>
        </div>
        <span class="text-xs font-bold px-3 py-1.5 rounded-full" style="background:#dbeafe;color:#1d4ed8;"><?php echo e(strtoupper($pesananAktif->status)); ?></span>
    </div>
    <div class="p-6">
        <div class="flex gap-4 mb-4">
            <div class="flex-1 bg-green-50 rounded-xl p-3 flex items-center gap-3">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#16a34a" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Tanggal</p>
                    <p class="text-sm font-bold text-gray-800"><?php echo e(\Carbon\Carbon::parse($pesananAktif->booking_date)->format('d M Y')); ?></p>
                </div>
            </div>
            <div class="flex-1 bg-blue-50 rounded-xl p-3 flex items-center gap-3">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#2563eb" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Alamat</p>
                    <p class="text-sm font-bold text-gray-800"><?php echo e(Str::limit($pesananAktif->address, 25)); ?></p>
                </div>
            </div>
        </div>
        <a href="/bersihin/customer/pesanan" class="block text-center w-full bg-[#064E3B] text-white font-bold py-3 rounded-xl text-sm hover:bg-emerald-800 transition">
            Lihat Detail Pesanan →
        </a>
    </div>
</div>
<?php else: ?>
<div class="card-section mb-6 p-8 text-center">
    <p class="text-gray-400 text-sm mb-3">Belum ada pesanan aktif</p>
    <a href="/bersihin/booking" class="inline-block bg-[#064E3B] text-white font-bold px-6 py-3 rounded-xl text-sm hover:bg-emerald-800 transition">
        Pesan Layanan Sekarang →
    </a>
</div>
<?php endif; ?>

<!-- BANNER PROMO -->
<div class="grid grid-cols-2 gap-4">
    <div class="card-section relative overflow-hidden" style="min-height:220px;">
        <div class="absolute inset-0" style="background:linear-gradient(135deg,#064E3B,#145c3e);"></div>
        <div class="absolute inset-0 p-6 flex flex-col justify-end relative z-10">
            <span class="text-xs font-bold text-green-300 uppercase tracking-wider">Layanan Terpercaya</span>
            <p class="text-white font-bold text-base mt-1 leading-tight">Bersih Profesional,<br>Hasil Memuaskan</p>
            <a href="/bersihin/layanan" class="mt-3 inline-block text-xs font-bold text-white border border-white/30 px-4 py-2 rounded-lg hover:bg-white/10 transition w-fit">
                Lihat Layanan →
            </a>
        </div>
    </div>

    <div class="card-section p-6" style="background:linear-gradient(135deg,#0d3d2b,#145c3e);">
        <span class="text-xs font-bold px-3 py-1 rounded-full" style="background:rgba(255,255,255,0.15);color:#86efac;">✦ DISKON KHUSUS</span>
        <h3 class="text-white text-2xl font-extrabold mt-3 leading-tight" style="font-family:'Sora',sans-serif;">Dapatkan<br>30% Off</h3>
        <p class="text-green-300 text-xs mt-2 leading-relaxed">Berlaku untuk semua layanan kebersihan rumah.</p>
        <div class="mt-4 bg-white/10 rounded-xl p-3 flex justify-between items-center">
            <div>
                <p class="text-green-300 text-xs font-medium">Kode Promo</p>
                <p class="text-white font-bold tracking-widest text-sm font-mono">BERSIH30</p>
            </div>
            <button onclick="navigator.clipboard.writeText('BERSIH30')" class="text-xs font-bold text-green-300 hover:text-white transition px-3 py-1.5 rounded-lg hover:bg-white/10">SALIN</button>
        </div>
        <a href="/bersihin/booking" class="mt-4 block w-full py-3 rounded-xl font-bold text-sm text-center transition" style="background:#22c55e;color:#0d3d2b;">
            KLAIM SEKARANG →
        </a>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/customer/dashboard.blade.php ENDPATH**/ ?>