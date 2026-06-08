<?php $__env->startSection('page-title', 'Jadwal Kerja Saya'); ?>
<?php $__env->startSection('page-subtitle', 'Kelola jadwal tugasmu'); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<div class="notif-bukti mb-4">
    <div class="notif-bukti-icon">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
    </div>
    <div class="notif-bukti-text"><strong><?php echo e(session('success')); ?></strong></div>
</div>
<?php endif; ?>

<?php if(session('error')): ?>
<div class="bg-red-50 border border-red-200 rounded-xl px-4 py-3 mb-4 flex items-center gap-3">
    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#dc2626" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
    <strong class="text-red-700 text-sm"><?php echo e(session('error')); ?></strong>
</div>
<?php endif; ?>


<div class="flex items-start justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Jadwal Kerja Saya</h1>
        <p class="text-sm text-gray-400 mt-0.5">Kelola dan lihat jadwal pembersihan harian Anda dengan mudah.</p>
    </div>
    <div class="flex items-center gap-3">
        <div class="bg-emerald-50 border border-emerald-200 rounded-xl px-4 py-2 text-center">
            <p class="text-[10px] text-emerald-600 font-bold uppercase tracking-wide">Total Tugas</p>
            <p class="text-xl font-extrabold text-[#064E3B]"><?php echo e($jadwal->count()); ?></p>
        </div>
        <div class="bg-blue-50 border border-blue-100 rounded-xl px-4 py-2 text-center">
            <p class="text-[10px] text-blue-500 font-bold uppercase tracking-wide">Selesai</p>
            <p class="text-xl font-extrabold text-blue-600"><?php echo e($jadwal->where('status', 'done')->count()); ?></p>
        </div>
        <div class="bg-amber-50 border border-amber-100 rounded-xl px-4 py-2 text-center">
            <p class="text-[10px] text-amber-500 font-bold uppercase tracking-wide">Aktif</p>
            <p class="text-xl font-extrabold text-amber-600"><?php echo e($jadwal->whereIn('status', ['confirmed', 'on_the_way', 'in_progress'])->count()); ?></p>
        </div>
    </div>
</div>


<div class="space-y-4 mb-6">
    <?php $__empty_1 = true; $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="bg-white rounded-2xl border <?php echo e($j->status === 'done' ? 'border-gray-100' : 'border-gray-200'); ?> p-5 hover:shadow-sm transition <?php echo e($j->status === 'done' ? 'opacity-70' : ''); ?>">

        
        <div class="flex items-center gap-5">
            
            <div class="text-center w-14 flex-shrink-0">
                <p class="text-sm font-extrabold <?php echo e($j->status === 'done' ? 'text-gray-400' : 'text-gray-900'); ?>">
                    <?php echo e(\Carbon\Carbon::parse($j->booking_time)->format('H:i')); ?>

                </p>
                <div class="w-px h-6 bg-gray-200 mx-auto my-1"></div>
                <p class="text-xs text-gray-400"><?php echo e(\Carbon\Carbon::parse($j->booking_date)->format('d M')); ?></p>
            </div>

            
            <div class="w-1 h-16 rounded-full flex-shrink-0
                <?php if($j->status === 'done'): ?> bg-gray-300
                <?php elseif($j->status === 'on_the_way'): ?> bg-blue-400
                <?php elseif($j->status === 'in_progress'): ?> bg-amber-400
                <?php else: ?> bg-emerald-500
                <?php endif; ?>">
            </div>

            
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-1.5">
                    
                    <?php if($j->status === 'done'): ?>
                        <span class="text-[10px] font-bold text-gray-400 bg-gray-100 px-2.5 py-1 rounded-full uppercase tracking-wide">✓ Selesai</span>
                    <?php elseif($j->status === 'confirmed'): ?>
                        <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full uppercase tracking-wide">⏳ Menunggu</span>
                    <?php elseif($j->status === 'on_the_way'): ?>
                        <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full uppercase tracking-wide">🚗 Dalam Perjalanan</span>
                    <?php elseif($j->status === 'in_progress'): ?>
                        <span class="text-[10px] font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full uppercase tracking-wide">🧹 Sedang Dikerjakan</span>
                    <?php else: ?>
                        <span class="text-[10px] font-bold text-gray-400 bg-gray-100 px-2.5 py-1 rounded-full uppercase tracking-wide"><?php echo e($j->status); ?></span>
                    <?php endif; ?>

                    <div class="flex items-center gap-1 text-gray-400">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-xs text-gray-400"><?php echo e(Str::limit($j->address, 35)); ?></span>
                    </div>
                </div>
                <p class="font-bold <?php echo e($j->status === 'done' ? 'text-gray-500' : 'text-gray-900'); ?>"><?php echo e($j->customer_name); ?></p>
                <p class="text-sm text-gray-400 mt-0.5"><?php echo e($j->service_name); ?> · #BRS-<?php echo e($j->id); ?></p>
            </div>
        </div>

        
        <?php if($j->status !== 'done'): ?>
        <div class="mt-4 pt-4 border-t border-gray-100 flex items-center gap-3">
            <?php if($j->status === 'confirmed'): ?>
                
                <form method="POST" action="/bersihin/petugas/update-status" class="flex-1">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="booking_id" value="<?php echo e($j->id); ?>">
                    <input type="hidden" name="status" value="on_the_way">
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2.5 rounded-xl transition">
                        🚗 Mulai Perjalanan
                    </button>
                </form>

            <?php elseif($j->status === 'on_the_way'): ?>
                
                <div class="flex-1 bg-blue-50 border border-blue-100 rounded-xl px-4 py-2.5 text-center">
                    <p class="text-xs font-semibold text-blue-600">🚗 Sedang dalam perjalanan ke lokasi...</p>
                </div>
                <form method="POST" action="/bersihin/petugas/update-status">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="booking_id" value="<?php echo e($j->id); ?>">
                    <input type="hidden" name="status" value="in_progress">
                    <button type="submit"
                        class="flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition">
                        🧹 Mulai Kerjakan
                    </button>
                </form>

            <?php elseif($j->status === 'in_progress'): ?>
                
                <div class="flex-1 bg-amber-50 border border-amber-100 rounded-xl px-4 py-2.5 text-center">
                    <p class="text-xs font-semibold text-amber-600">🧹 Sedang mengerjakan layanan...</p>
                </div>
                <form method="POST" action="/bersihin/petugas/update-status"
                    onsubmit="return confirm('Tandai pesanan #BRS-<?php echo e($j->id); ?> sebagai selesai?')">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="booking_id" value="<?php echo e($j->id); ?>">
                    <input type="hidden" name="status" value="done">
                    <button type="submit"
                        class="flex items-center gap-2 bg-[#064E3B] hover:bg-emerald-800 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition">
                        ✅ Tandai Selesai
                    </button>
                </form>
            <?php endif; ?>
        </div>
        <?php else: ?>
        
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-center text-gray-400">✓ Tugas ini sudah selesai dikerjakan</p>
        </div>
        <?php endif; ?>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="bg-white rounded-2xl border border-gray-100 p-10 text-center">
        <svg class="w-10 h-10 text-gray-200 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
        </svg>
        <p class="text-gray-400 text-sm">Belum ada jadwal tugas</p>
    </div>
    <?php endif; ?>
</div>


<div class="grid grid-cols-2 gap-4">
    <div class="relative rounded-2xl overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#064E3B] to-emerald-700"></div>
        <div class="relative z-10 p-6">
            <div class="flex items-center gap-2 mb-3">
                <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <p class="text-white font-bold text-sm">Tips Performa Hari Ini</p>
            </div>
            <p class="text-green-100 text-sm leading-relaxed">
                Ketepatan waktu dan dokumentasi foto <span class="font-bold text-white">'Sebelum & Sesudah'</span>
                adalah kunci utama kepuasan pelanggan dan rating performa Anda.
            </p>
            <div class="mt-4 flex items-center gap-2">
                <div class="w-1.5 h-1.5 bg-green-300 rounded-full"></div>
                <p class="text-green-300 text-xs font-semibold">Update status secara real-time</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Progress Tugas</p>
                <p class="text-2xl font-extrabold text-gray-900">
                    <?php echo e($jadwal->where('status','done')->count()); ?>

                    <span class="text-base font-semibold text-gray-400">/ <?php echo e($jadwal->count()); ?></span>
                </p>
            </div>
        </div>
        <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
            <?php $pct = $jadwal->count() > 0 ? ($jadwal->where('status','done')->count() / $jadwal->count()) * 100 : 0; ?>
            <div class="h-2 bg-[#064E3B] rounded-full transition-all" style="width: <?php echo e($pct); ?>%"></div>
        </div>
        <p class="text-xs text-gray-400 mt-2"><?php echo e(round($pct)); ?>% tugas selesai</p>

        
        <div class="mt-4 space-y-1.5">
            <div class="flex items-center justify-between text-xs">
                <span class="text-gray-400 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-emerald-500 inline-block"></span> Menunggu</span>
                <span class="font-semibold text-gray-700"><?php echo e($jadwal->where('status','confirmed')->count()); ?></span>
            </div>
            <div class="flex items-center justify-between text-xs">
                <span class="text-gray-400 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-blue-400 inline-block"></span> Perjalanan</span>
                <span class="font-semibold text-gray-700"><?php echo e($jadwal->where('status','on_the_way')->count()); ?></span>
            </div>
            <div class="flex items-center justify-between text-xs">
                <span class="text-gray-400 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-amber-400 inline-block"></span> Dikerjakan</span>
                <span class="font-semibold text-gray-700"><?php echo e($jadwal->where('status','in_progress')->count()); ?></span>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/petugas/jadwal.blade.php ENDPATH**/ ?>