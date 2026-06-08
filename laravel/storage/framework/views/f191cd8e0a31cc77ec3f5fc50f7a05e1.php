<?php $__env->startSection('page-title', 'Pesanan Saya'); ?>
<?php $__env->startSection('page-subtitle', 'Kelola semua pesanan kebersihan kamu'); ?>

<?php $__env->startSection('content'); ?>

<!-- NOTIFIKASI -->
<?php if(session('success')): ?>
<div class="notif-bukti">
    <div class="notif-bukti-icon">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
    </div>
    <div class="notif-bukti-text">
        <strong><?php echo e(session('success')); ?></strong>
    </div>
</div>
<?php endif; ?>

<!-- HEADER -->
<div class="flex justify-between items-center mb-6">
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
<div class="grid grid-cols-3 gap-4 mb-6">
    <div class="stat-card">
        <div class="stat-icon" style="background:#eff6ff;">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#2563eb" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Total</p>
            <p class="text-xl font-extrabold text-gray-900"><?php echo e($totalPesanan); ?> <span class="text-sm font-medium text-gray-400">Pesanan</span></p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fffbeb;">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Proses</p>
            <p class="text-xl font-extrabold text-gray-900"><?php echo e($pesananProses); ?> <span class="text-sm font-medium text-gray-400">Aktif</span></p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#f0fdf4;">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#16a34a" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Selesai</p>
            <p class="text-xl font-extrabold text-gray-900"><?php echo e($pesananSelesai); ?> <span class="text-sm font-medium text-gray-400">Layanan</span></p>
        </div>
    </div>
</div>

<!-- TAB FILTER -->
<div class="flex items-center gap-2 mb-5 bg-white rounded-xl p-1.5 border border-gray-100 shadow-sm w-fit">
    <button class="tab-btn active" onclick="filterTab(this, 'semua')">Semua</button>
    <button class="tab-btn" onclick="filterTab(this, 'proses')">Sedang Proses</button>
    <button class="tab-btn" onclick="filterTab(this, 'selesai')">Selesai</button>
    <button class="tab-btn" onclick="filterTab(this, 'pending')">Pending</button>
</div>

<!-- ORDER CARDS -->
<div class="space-y-4">
    <?php $__empty_1 = true; $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="order-card" data-status="<?php echo e(in_array($p->status, ['done']) ? 'selesai' : ($p->status === 'pending' ? 'pending' : 'proses')); ?>">
        <div class="p-6">
            <!-- ROW 1: Nama + Badge + Harga -->
            <div class="flex justify-between items-start mb-2">
                <div class="flex items-center gap-2 flex-wrap">
                    <h3 class="font-bold text-gray-900 text-base"><?php echo e($p->service_name); ?></h3>
                    <?php if($p->status === 'done'): ?>
                        <span class="badge" style="background:#dcfce7;color:#15803d;">✓ SELESAI</span>
                    <?php elseif($p->status === 'pending'): ?>
                        <span class="badge-menunggu">Menunggu Verifikasi</span>
                    <?php elseif($p->status === 'confirmed'): ?>
                        <span class="badge" style="background:#dbeafe;color:#1d4ed8;">CONFIRMED</span>
                    <?php elseif($p->status === 'on_the_way'): ?>
                        <span class="badge" style="background:#ede9fe;color:#6d28d9;">🚗 DALAM PERJALANAN</span>
                    <?php elseif($p->status === 'in_progress'): ?>
                        <span class="badge" style="background:#fef3c7;color:#b45309;">🧹 SEDANG DIKERJAKAN</span>
                    <?php elseif($p->status === 'cancelled'): ?>
                        <span class="badge" style="background:#fee2e2;color:#dc2626;">✕ DIBATALKAN</span>
                    <?php endif; ?>
                </div>
                <p class="text-lg font-extrabold text-green-700 flex-shrink-0">Rp <?php echo e(number_format($p->price, 0, ',', '.')); ?></p>
            </div>

            <!-- ROW 2: Tanggal + ID -->
            <p class="text-xs text-gray-400 mb-3">
                <?php echo e(\Carbon\Carbon::parse($p->booking_date)->format('d M Y')); ?> &bull;
                <?php echo e($p->booking_time); ?> &bull;
                <span class="font-mono bg-gray-100 px-1.5 py-0.5 rounded">#BRS-<?php echo e($p->id); ?></span>
            </p>

            <!-- ROW 3: Alamat + Petugas -->
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-1.5 text-xs text-gray-500">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <?php echo e(Str::limit($p->address, 35)); ?>

                </div>
                <div class="text-xs text-right">
                    <?php if($p->petugas_name): ?>
                    <p class="text-gray-500">Petugas: <span class="font-semibold text-gray-700"><?php echo e($p->petugas_name); ?></span></p>
                    <?php else: ?>
                    <p class="text-gray-400">Petugas belum ditugaskan</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- ROW 4: INFO STATUS REAL-TIME -->
            <?php if($p->status === 'on_the_way'): ?>
            <div class="flex items-center gap-2 px-4 py-3 rounded-xl mb-3" style="background:#ede9fe;">
                <span class="text-lg">🚗</span>
                <div>
                    <p class="text-xs font-bold text-purple-700">Petugas Dalam Perjalanan</p>
                    <p class="text-xs text-purple-500"><?php echo e($p->petugas_name ?? 'Petugas'); ?> sedang menuju lokasimu. Harap siapkan akses masuk.</p>
                </div>
            </div>
            <?php elseif($p->status === 'in_progress'): ?>
            <div class="flex items-center gap-2 px-4 py-3 rounded-xl mb-3" style="background:#fef3c7;">
                <span class="text-lg">🧹</span>
                <div>
                    <p class="text-xs font-bold text-yellow-700">Sedang Dikerjakan</p>
                    <p class="text-xs text-yellow-600"><?php echo e($p->petugas_name ?? 'Petugas'); ?> sedang membersihkan. Mohon jangan ganggu proses pengerjaan.</p>
                </div>
            </div>
            <?php elseif($p->status === 'confirmed' && $p->petugas_name): ?>
            <div class="flex items-center gap-2 px-4 py-3 rounded-xl mb-3" style="background:#eff6ff;">
                <span class="text-lg">⏳</span>
                <div>
                    <p class="text-xs font-bold text-blue-700">Menunggu Petugas Berangkat</p>
                    <p class="text-xs text-blue-500"><?php echo e($p->petugas_name); ?> akan segera menuju lokasimu sesuai jadwal.</p>
                </div>
            </div>
            <?php elseif($p->status === 'done'): ?>
            <div class="flex items-center gap-2 px-4 py-3 rounded-xl mb-3" style="background:#f0fdf4;">
                <span class="text-lg">✅</span>
                <div>
                    <p class="text-xs font-bold text-green-700">Layanan Selesai</p>
                    <p class="text-xs text-green-600">Terima kasih! Jangan lupa beri ulasan untuk layanan ini.</p>
                </div>
            </div>
            <?php endif; ?>

            <!-- ROW 5: Tombol -->
            <div class="flex justify-end items-center gap-2 border-t border-gray-100 pt-4">
                <button class="btn-outline"
                    onclick="lihatDetail({
                        id: '<?php echo e($p->id); ?>',
                        service: '<?php echo e($p->service_name); ?>',
                        status: '<?php echo e($p->status); ?>',
                        date: '<?php echo e(\Carbon\Carbon::parse($p->booking_date)->format('d M Y')); ?>',
                        time: '<?php echo e($p->booking_time); ?>',
                        address: '<?php echo e(addslashes($p->address)); ?>',
                        price: '<?php echo e(number_format($p->price, 0, ',', '.')); ?>',
                        petugas: '<?php echo e($p->petugas_name ?? 'Belum ditugaskan'); ?>'
                    })">
                    Lihat Detail
                </button>
                <?php if($p->status === 'done'): ?>
                <a href="/bersihin/customer/ulasan?booking_id=<?php echo e($p->id); ?>"
                   class="btn-solid" style="background:linear-gradient(135deg,#f59e0b,#d97706);text-decoration:none;display:inline-flex;align-items:center;">
                    Beri Ulasan ★
                </a>
                <?php elseif(in_array($p->status, ['confirmed', 'on_the_way', 'in_progress'])): ?>
                <button class="btn-solid"
                    onclick="hubungiPetugas('<?php echo e($p->petugas_name ?? '-'); ?>', '<?php echo e($p->petugas_phone ?? '-'); ?>', '<?php echo e($p->service_name); ?>')">
                    Hubungi Petugas
                </button>
                <?php elseif($p->status === 'pending'): ?>
                <a href="/bersihin/pembayaran?booking_id=<?php echo e($p->id); ?>"
                   class="btn-outline" style="border-color:#f59e0b;color:#b45309;">
                    Lihat Pembayaran
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="bg-white rounded-2xl border border-gray-100 p-12 text-center">
        <p class="text-gray-400 text-sm mb-3">Belum ada pesanan</p>
        <a href="/bersihin/booking" class="inline-block bg-[#064E3B] text-white font-bold px-6 py-3 rounded-xl text-sm hover:bg-emerald-800 transition">
            Pesan Layanan Sekarang
        </a>
    </div>
    <?php endif; ?>
</div>

<!-- BANNER PROMO -->
<div class="mt-6 rounded-2xl overflow-hidden relative" style="background:linear-gradient(135deg,#0a2e1f,#145c3e);">
    <div class="p-8">
        <div class="max-w-lg">
            <h2 class="text-2xl font-extrabold text-white mt-2 mb-2">Diskon 30% untuk Pesanan Berikutnya!</h2>
            <p class="text-green-300 text-sm leading-relaxed mb-5">Nikmati kebersihan maksimal bersama petugas profesional kami.</p>
            <a href="/bersihin/booking" class="inline-flex items-center gap-2 bg-white text-green-800 font-bold text-sm px-6 py-3 rounded-xl hover:bg-green-50 transition">
                Klaim & Pesan Sekarang →
            </a>
        </div>
    </div>
</div>

<!-- MODAL HUBUNGI PETUGAS -->
<div id="modalHubungi" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
     onclick="if(event.target===this) document.getElementById('modalHubungi').classList.add('hidden')">
    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-sm z-10 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100"
             style="background:linear-gradient(135deg,#064e3b,#16a34a);">
            <div>
                <h3 class="font-bold text-white text-base">Hubungi Petugas</h3>
                <p class="text-green-200 text-xs mt-0.5" id="hubungi-service">-</p>
            </div>
            <button onclick="document.getElementById('modalHubungi').classList.add('hidden')" class="text-white/70 hover:text-white">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="px-6 py-6 text-center">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="#16a34a" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <p class="font-bold text-gray-900 text-lg mb-1" id="hubungi-nama">-</p>
            <p class="text-gray-400 text-xs mb-5">Petugas Lapangan BersihIn</p>
            <div class="bg-gray-50 rounded-xl px-5 py-4 mb-5 flex items-center justify-between">
                <div class="text-left">
                    <p class="text-xs text-gray-400 mb-1">Nomor Telepon</p>
                    <p class="font-bold text-gray-800 text-base" id="hubungi-phone">-</p>
                </div>
                <button onclick="salinNomor()" class="text-xs font-bold text-green-600 border border-green-300 px-3 py-1.5 rounded-lg hover:bg-green-50 transition">Salin</button>
            </div>
            <button onclick="document.getElementById('modalHubungi').classList.add('hidden')"
                class="w-full py-3 rounded-xl font-bold text-sm text-white"
                style="background:linear-gradient(135deg,#064e3b,#16a34a);">
                Tutup
            </button>
        </div>
    </div>
</div>

<!-- MODAL DETAIL PESANAN -->
<div id="modalDetail" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
     onclick="if(event.target===this) tutupModal()">
    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md z-10 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100" style="background:linear-gradient(135deg,#064e3b,#16a34a);">
            <div>
                <h3 class="font-bold text-white text-base" id="modal-service">-</h3>
                <p class="text-green-200 text-xs mt-0.5">Detail Pesanan</p>
            </div>
            <button onclick="tutupModal()" class="text-white/70 hover:text-white transition">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="px-6 py-5 space-y-3">
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <span class="text-xs text-gray-400 font-medium">ID Pesanan</span>
                <span class="text-xs font-mono font-bold text-gray-700" id="modal-id">-</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <span class="text-xs text-gray-400 font-medium">Status</span>
                <span id="modal-status" class="text-xs font-bold px-3 py-1 rounded-full">-</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <span class="text-xs text-gray-400 font-medium">Tanggal</span>
                <span class="text-xs font-semibold text-gray-700" id="modal-date">-</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <span class="text-xs text-gray-400 font-medium">Waktu</span>
                <span class="text-xs font-semibold text-gray-700" id="modal-time">-</span>
            </div>
            <div class="flex justify-between items-start py-2 border-b border-gray-50">
                <span class="text-xs text-gray-400 font-medium">Alamat</span>
                <span class="text-xs font-semibold text-gray-700 text-right max-w-48" id="modal-address">-</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <span class="text-xs text-gray-400 font-medium">Petugas</span>
                <span class="text-xs font-semibold text-gray-700" id="modal-petugas">-</span>
            </div>
            <div class="flex justify-between items-center py-2">
                <span class="text-sm text-gray-700 font-bold">Total Pembayaran</span>
                <span class="text-base font-extrabold text-green-700" id="modal-price">-</span>
            </div>
        </div>
        <div class="px-6 pb-5">
            <button onclick="tutupModal()" class="w-full py-3 rounded-xl font-bold text-sm text-white transition"
                style="background:linear-gradient(135deg,#064e3b,#16a34a);">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
function filterTab(btn, status) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.order-card').forEach(card => {
        if (status === 'semua' || card.dataset.status === status) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}

function lihatDetail(data) {
    document.getElementById('modal-service').textContent = data.service;
    document.getElementById('modal-id').textContent = '#BRS-' + data.id;
    document.getElementById('modal-date').textContent = data.date;
    document.getElementById('modal-time').textContent = data.time;
    document.getElementById('modal-address').textContent = data.address;
    document.getElementById('modal-petugas').textContent = data.petugas;
    document.getElementById('modal-price').textContent = 'Rp ' + data.price;

    const statusEl = document.getElementById('modal-status');
    const statusMap = {
        'done':        { label: '✓ Selesai',           bg: '#dcfce7', color: '#15803d' },
        'confirmed':   { label: '⏳ Menunggu Petugas',  bg: '#dbeafe', color: '#1d4ed8' },
        'on_the_way':  { label: '🚗 Dalam Perjalanan',  bg: '#ede9fe', color: '#6d28d9' },
        'in_progress': { label: '🧹 Sedang Dikerjakan', bg: '#fef3c7', color: '#b45309' },
        'pending':     { label: 'Menunggu Verifikasi',  bg: '#fef9c3', color: '#92400e' },
        'cancelled':   { label: '✕ Dibatalkan',         bg: '#fee2e2', color: '#dc2626' },
    };
    const s = statusMap[data.status] || { label: data.status, bg: '#f3f4f6', color: '#374151' };
    statusEl.textContent = s.label;
    statusEl.style.background = s.bg;
    statusEl.style.color = s.color;

    document.getElementById('modalDetail').classList.remove('hidden');
}

function tutupModal() {
    document.getElementById('modalDetail').classList.add('hidden');
}

function hubungiPetugas(nama, phone, service) {
    document.getElementById('hubungi-nama').textContent = nama;
    document.getElementById('hubungi-phone').textContent = (phone && phone !== '-' && phone !== 'null') ? phone : 'Nomor tidak tersedia';
    document.getElementById('hubungi-service').textContent = service;
    document.getElementById('modalHubungi').classList.remove('hidden');
}

function salinNomor() {
    const phone = document.getElementById('hubungi-phone').textContent;
    navigator.clipboard.writeText(phone).then(() => {
        const btn = event.target;
        btn.textContent = '✓ Disalin!';
        setTimeout(() => btn.textContent = 'Salin', 2000);
    });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/customer/pesanan.blade.php ENDPATH**/ ?>