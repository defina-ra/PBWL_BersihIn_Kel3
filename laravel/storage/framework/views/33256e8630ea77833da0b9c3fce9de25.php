<?php $__env->startSection('page-title', 'Performa & Riwayat'); ?>
<?php $__env->startSection('page-subtitle', 'Pantau kemajuan layanan dan ulasan pelanggan Anda secara real-time.'); ?>

<?php $__env->startSection('content'); ?>


<div class="flex items-start justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Performa & Riwayat Saya</h1>
        <p class="text-sm text-gray-400 mt-0.5">Pantau kemajuan layanan dan ulasan pelanggan Anda secara real-time.</p>
    </div>
</div>


<div class="grid grid-cols-4 gap-4 mb-6">

    
    <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-emerald-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Total Pesanan Selesai</p>
        <p class="text-3xl font-extrabold text-gray-900 mt-1"><?php echo e($totalSelesai); ?></p>
    </div>

    
    <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-amber-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Rating Keseluruhan</p>
        <?php $avgRating = $riwayat->whereNotNull('rating')->avg('rating'); ?>
        <p class="text-3xl font-extrabold text-gray-900 mt-1"><?php echo e($avgRating ? number_format($avgRating, 1) : '-'); ?> <span class="text-base font-semibold text-gray-400">/5</span></p>
    </div>

    
    <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-blue-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Efisiensi Kerja</p>
        <p class="text-3xl font-extrabold text-gray-900 mt-1">96%</p>
    </div>

    
    <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-purple-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Total Ulasan</p>
        <p class="text-3xl font-extrabold text-gray-900 mt-1"><?php echo e($riwayat->whereNotNull('rating')->count()); ?></p>
    </div>

</div>


<div class="grid grid-cols-3 gap-4 mb-6">

    
    <div class="col-span-2 bg-white rounded-2xl border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="font-bold text-gray-800">Aktivitas Mingguan</h3>
                <p class="text-xs text-gray-400 mt-0.5">Jumlah tugas selesai per hari</p>
            </div>
        </div>
        <div class="flex items-end justify-between gap-2 h-28 px-2">
            <?php
            $bars = [
                ['day' => 'Sen', 'val' => 60, 'count' => 3],
                ['day' => 'Sel', 'val' => 85, 'count' => 4],
                ['day' => 'Rab', 'val' => 100,'count' => 5],
                ['day' => 'Kam', 'val' => 70, 'count' => 3],
                ['day' => 'Jum', 'val' => 90, 'count' => 4],
                ['day' => 'Sab', 'val' => 50, 'count' => 2],
                ['day' => 'Min', 'val' => 30, 'count' => 1],
            ];
            ?>
            <?php $__currentLoopData = $bars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex flex-col items-center gap-1 flex-1">
                <span class="text-[10px] font-bold text-gray-500"><?php echo e($b['count']); ?></span>
                <div class="w-full rounded-t-lg <?php echo e($b['day'] === 'Rab' ? 'bg-[#064E3B]' : 'bg-emerald-100'); ?>"
                     style="height: <?php echo e($b['val']); ?>%"></div>
                <span class="text-[10px] text-gray-400"><?php echo e($b['day']); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <h3 class="font-bold text-gray-800 mb-4">Pencapaian</h3>
        <div class="space-y-3">
            <div class="flex items-center gap-3 p-3 bg-amber-50 rounded-xl border border-amber-100">
                <div class="w-9 h-9 bg-amber-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-amber-700">Top Performer</p>
                    <p class="text-[10px] text-amber-500">Bulan ini</p>
                </div>
            </div>
            <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-xl border border-blue-100">
                <div class="w-9 h-9 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-blue-700"><?php echo e($totalSelesai); ?> Tugas Selesai</p>
                    <p class="text-[10px] text-blue-500">Total keseluruhan</p>
                </div>
            </div>
            <div class="flex items-center gap-3 p-3 bg-emerald-50 rounded-xl border border-emerald-100">
                <div class="w-9 h-9 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-emerald-700">Zero Komplain</p>
                    <p class="text-[10px] text-emerald-500">30 hari berturut-turut</p>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="bg-white rounded-2xl border border-gray-100">

    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
        <div>
            <h3 class="font-bold text-gray-800">Riwayat Aktivitas Layanan</h3>
            <p class="text-xs text-gray-400 mt-0.5">Seluruh riwayat tugas dan ulasan pelanggan Anda</p>
        </div>
    </div>

    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Tanggal & Jam</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Nama Pelanggan</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Jenis Layanan</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Rating</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Komentar</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            <?php $__empty_1 = true; $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="hover:bg-gray-50/60 transition">
                <td class="px-5 py-4">
                    <p class="text-sm font-semibold text-gray-800"><?php echo e(\Carbon\Carbon::parse($r->booking_date)->format('d M Y')); ?></p>
                    <p class="text-xs text-gray-400 mt-0.5"><?php echo e($r->booking_time); ?></p>
                </td>
                <td class="px-5 py-4">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                            <?php echo e(strtoupper(substr($r->customer_name, 0, 2))); ?>

                        </div>
                        <span class="text-sm font-semibold text-gray-800"><?php echo e($r->customer_name); ?></span>
                    </div>
                </td>
                <td class="px-5 py-4">
                    <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-600">
                        <?php echo e($r->service_name); ?>

                    </span>
                </td>
                <td class="px-5 py-4">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span class="text-sm font-bold text-gray-800"><?php echo e($r->rating ?? '-'); ?></span>
                    </div>
                </td>
                <td class="px-5 py-4 max-w-xs">
                    <p class="text-sm text-gray-500 italic truncate">"<?php echo e($r->comment ?? 'Belum ada ulasan'); ?>"</p>
                </td>
                <td class="px-5 py-4">
                    <button class="text-sm font-semibold text-[#064E3B] hover:underline">Detail</button>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="px-5 py-8 text-center text-sm text-gray-400">Belum ada riwayat tugas</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="flex items-center justify-between px-5 py-4 border-t border-gray-100">
        <p class="text-xs text-gray-400">Menampilkan <?php echo e($riwayat->count()); ?> pesanan</p>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/petugas/performance.blade.php ENDPATH**/ ?>