<?php $__env->startSection('page-title', 'Overview Dashboard'); ?>
<?php $__env->startSection('page-subtitle', 'Pantau performa layanan BersihIn hari ini'); ?>

<?php $__env->startSection('content'); ?>


<div class="flex items-start justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Overview Dashboard</h1>
        <p class="text-sm text-gray-400 mt-0.5">Pantau performa layanan BersihIn hari ini.</p>
    </div>
    <div class="flex gap-2">
        <a href="/bersihin/admin/laporan"
           class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 inline-block">
            Unduh Laporan
        </a>
        <a href="/bersihin/admin/petugas"
           class="px-4 py-2 bg-[#064E3B] text-white rounded-lg text-sm font-semibold hover:bg-emerald-800 inline-block">
            Tambah Petugas
        </a>
    </div>
</div>


<div class="grid grid-cols-4 gap-4 mb-6">

    
    <div class="bg-white rounded-xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-emerald-50 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
            </div>
            <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">+12.5%</span>
        </div>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Total Pendapatan</p>
        <p class="text-2xl font-extrabold text-gray-900 mt-1">Rp <?php echo e(number_format($totalPendapatan, 0, ',', '.')); ?></p>
    </div>

    
    <div class="bg-white rounded-xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-red-50 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <span class="text-xs font-semibold text-red-500 bg-red-50 px-2 py-0.5 rounded-full"><?php echo e($perluVerifikasi); ?></span>
        </div>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Perlu Verifikasi</p>
        <p class="text-2xl font-extrabold text-gray-900 mt-1"><?php echo e($perluVerifikasi); ?> Transaksi</p>
    </div>

    
    <div class="bg-white rounded-xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Belum Dijadwalkan</p>
        <p class="text-2xl font-extrabold text-gray-900 mt-1"><?php echo e($belumDijadwalkan); ?> Pesanan</p>
    </div>

    
    <div class="bg-white rounded-xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-purple-50 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Petugas Aktif</p>
        <p class="text-2xl font-extrabold text-gray-900 mt-1"><?php echo e($petugasAktif); ?> Orang</p>
    </div>

</div>


<div class="grid grid-cols-3 gap-4 mb-6">

    
    <div class="col-span-2 bg-white rounded-xl border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-bold text-gray-800">Pendapatan Mingguan</h2>
            <div class="flex gap-1">
                <button class="px-3 py-1 bg-[#064E3B] text-white text-xs font-semibold rounded-full">Weekly</button>
                <button class="px-3 py-1 text-gray-400 text-xs font-medium rounded-full hover:bg-gray-100">Monthly</button>
            </div>
        </div>
        <div class="relative h-44">
            <svg viewBox="0 0 500 140" class="w-full h-full" preserveAspectRatio="none">
                <rect x="20"  y="60"  width="40" height="70" rx="4" fill="#D1FAE5" opacity="0.7"/>
                <rect x="90"  y="50"  width="40" height="80" rx="4" fill="#D1FAE5" opacity="0.7"/>
                <rect x="160" y="30"  width="40" height="100" rx="4" fill="#D1FAE5" opacity="0.7"/>
                <rect x="230" y="45"  width="40" height="85" rx="4" fill="#D1FAE5" opacity="0.7"/>
                <rect x="300" y="20"  width="40" height="110" rx="4" fill="#6EE7B7" opacity="0.9"/>
                <rect x="370" y="55"  width="40" height="75" rx="4" fill="#D1FAE5" opacity="0.7"/>
                <rect x="440" y="40"  width="40" height="90" rx="4" fill="#D1FAE5" opacity="0.7"/>
                <polyline
                    points="40,55 110,45 180,25 250,40 320,15 390,50 460,35"
                    fill="none" stroke="#064E3B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="320" cy="15" r="4" fill="#064E3B"/>
                <circle cx="320" cy="15" r="7" fill="#064E3B" opacity="0.2"/>
            </svg>
            <div class="flex justify-between px-2 mt-1">
                <?php $__currentLoopData = ['Sen','Sel','Rab','Kam','Jum','Sab','Min']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="text-[11px] text-gray-400"><?php echo e($day); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-xl border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-bold text-gray-800">Petugas Standby</h2>
        </div>

        <div class="space-y-3">
            <?php
            $colors = ['bg-blue-500', 'bg-pink-500', 'bg-amber-500', 'bg-purple-500', 'bg-teal-500'];
            ?>

            <?php $__empty_1 = true; $__currentLoopData = $daftarPetugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 <?php echo e($colors[$index % count($colors)]); ?> rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0">
                        <?php echo e(strtoupper(substr($p->name, 0, 2))); ?>

                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800 leading-none"><?php echo e($p->name); ?></p>
                        <p class="text-xs text-gray-400 mt-0.5"><?php echo e($p->email); ?></p>
                    </div>
                </div>
                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full uppercase tracking-wide">Ready</span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-sm text-gray-400 text-center py-4">Belum ada petugas</p>
            <?php endif; ?>
        </div>

        <a href="/bersihin/admin/petugas" class="mt-4 w-full border border-gray-200 text-sm text-gray-500 font-medium py-2 rounded-lg hover:bg-gray-50 block text-center">
            Lihat Semua Petugas
        </a>
    </div>

</div>


<div class="bg-white rounded-xl border border-gray-100">
    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
        <h2 class="font-bold text-gray-800">Pesanan Terbaru</h2>
    </div>

    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">ID Pesanan</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Customer</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Layanan</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Status</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            <?php $__empty_1 = true; $__currentLoopData = $pesananTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="hover:bg-gray-50/50">
                <td class="px-5 py-3.5 text-sm font-semibold text-[#064E3B]">#BRS-<?php echo e($p->id); ?></td>
                <td class="px-5 py-3.5 text-sm text-gray-700"><?php echo e($p->customer_name); ?></td>
                <td class="px-5 py-3.5">
                    <p class="text-sm font-semibold text-gray-800"><?php echo e($p->service_name); ?></p>
                    <p class="text-xs text-gray-400"><?php echo e($p->address); ?></p>
                </td>
                <td class="px-5 py-3.5">
                    <?php if($p->status === 'done'): ?>
                        <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">Done</span>
                    <?php elseif($p->status === 'pending'): ?>
                        <span class="text-xs font-semibold text-amber-500 bg-amber-50 px-3 py-1 rounded-full">Pending</span>
                    <?php elseif($p->status === 'confirmed'): ?>
                        <span class="text-xs font-semibold text-blue-500 bg-blue-50 px-3 py-1 rounded-full">Confirmed</span>
                    <?php elseif($p->status === 'progress'): ?>
                        <span class="text-xs font-semibold text-purple-500 bg-purple-50 px-3 py-1 rounded-full">Progress</span>
                    <?php else: ?>
                        <span class="text-xs font-semibold text-gray-500 bg-gray-50 px-3 py-1 rounded-full"><?php echo e($p->status); ?></span>
                    <?php endif; ?>
                </td>
                <td class="px-5 py-3.5">
                    <a href="/bersihin/admin/detail-pesanan"
                       class="px-4 py-1.5 bg-[#064E3B] text-white text-xs font-semibold rounded-lg hover:bg-emerald-800 inline-block">
                        Lihat Detail
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" class="px-5 py-8 text-center text-sm text-gray-400">Belum ada pesanan</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/admin/dashboardAdmin.blade.php ENDPATH**/ ?>