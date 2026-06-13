<?php $__env->startSection('page-title', 'Manajemen Petugas'); ?>
<?php $__env->startSection('page-subtitle', 'Kelola seluruh staf lapangan'); ?>

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

<div class="p-1">

    
    <div class="flex items-start justify-between mb-6">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Manajemen Petugas</h1>
            <p class="text-sm text-gray-400 mt-0.5">Kelola seluruh staf lapangan dan pantau performa mereka.</p>
        </div>
        <button onclick="document.getElementById('modalTambahPetugas').classList.remove('hidden')"
            class="flex items-center gap-2 px-5 py-2.5 bg-[#064E3B] text-white text-sm font-semibold rounded-xl hover:bg-emerald-800">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Petugas
        </button>
    </div>

    
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-gray-100 px-6 py-5 flex items-center gap-4">
            <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Total Petugas</p>
                <p class="text-2xl font-bold text-gray-900"><?php echo e($totalPetugas); ?></p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-6 py-5 flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Rata-rata Rating</p>
                <p class="text-2xl font-bold text-gray-900">4.9 <span class="text-sm font-normal text-gray-400">/ 5.0</span></p>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-xl border border-gray-100">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h2 class="font-bold text-gray-800">Daftar Seluruh Petugas</h2>
            <span class="text-xs text-gray-400"><?php echo e($totalPetugas); ?> petugas terdaftar</span>
        </div>

        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-6 py-3">Petugas</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-6 py-3">Kontak</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-6 py-3">Tugas Selesai</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-6 py-3">Status</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php $__empty_1 = true; $__currentLoopData = $daftarPetugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $tugasSelesai = \DB::table('bookings')
                        ->where('petugas_id', $p->id)
                        ->where('status', 'done')
                        ->count();
                    $tugasAktif = \DB::table('bookings')
                        ->where('petugas_id', $p->id)
                        ->whereIn('status', ['confirmed', 'on_the_way', 'in_progress'])
                        ->count();
                ?>
                <tr class="hover:bg-gray-50/50">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#064E3B] rounded-full flex items-center justify-center text-white text-sm font-bold shrink-0">
                                <?php echo e(strtoupper(substr($p->name, 0, 2))); ?>

                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800"><?php echo e($p->name); ?></p>
                                <p class="text-xs text-gray-400">ID #<?php echo e($p->id); ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-700"><?php echo e($p->email); ?></p>
                        <p class="text-xs text-gray-400"><?php echo e($p->phone ?? '-'); ?></p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm font-bold text-gray-800"><?php echo e($tugasSelesai); ?></span>
                        <span class="text-xs text-gray-400 ml-1">tugas</span>
                        <?php if($tugasAktif > 0): ?>
                        <p class="text-xs text-amber-500 mt-0.5"><?php echo e($tugasAktif); ?> sedang berjalan</p>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php if($tugasAktif > 0): ?>
                        <span class="text-xs font-semibold text-amber-600 border border-amber-300 bg-amber-50 px-3 py-1 rounded-full">● Bertugas</span>
                        <?php else: ?>
                        <span class="text-xs font-semibold text-green-700 border border-green-300 bg-green-50 px-3 py-1 rounded-full">● Ready</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="/bersihin/admin/petugas/hapus"
                            onsubmit="return confirm('Hapus petugas <?php echo e($p->name); ?>? Tindakan ini tidak bisa dibatalkan.')">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="user_id" value="<?php echo e($p->id); ?>">
                            <button type="submit"
                                class="text-xs font-semibold text-red-500 border border-red-200 hover:bg-red-50 px-3 py-1.5 rounded-lg transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center">
                        <p class="text-sm text-gray-400">Belum ada petugas terdaftar</p>
                        <button onclick="document.getElementById('modalTambahPetugas').classList.remove('hidden')"
                            class="mt-3 text-sm font-semibold text-[#064E3B] hover:underline">
                            + Tambah petugas pertama
                        </button>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<div id="modalTambahPetugas"
     class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50"
     onclick="if(event.target===this)this.classList.add('hidden')">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4" onclick="event.stopPropagation()">

        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-900">Tambah Petugas Baru</h3>
            <button onclick="document.getElementById('modalTambahPetugas').classList.add('hidden')"
                class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <form method="POST" action="/bersihin/admin/petugas">
            <?php echo csrf_field(); ?>
            <div class="px-6 py-5 space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-400">*</span></label>
                    <input type="text" name="name" placeholder="Masukkan nama lengkap" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-600">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email <span class="text-red-400">*</span></label>
                    <input type="email" name="email" placeholder="email@example.com" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-600">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nomor Telepon</label>
                    <input type="tel" name="phone" placeholder="08xxxxxxxxxx"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-600">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Password <span class="text-red-400">*</span></label>
                    <input type="password" name="password" placeholder="Min. 8 karakter" required minlength="8"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-600">
                </div>
            </div>

            <div class="px-6 py-4 border-t border-gray-100 flex gap-3">
                <button type="button" onclick="document.getElementById('modalTambahPetugas').classList.add('hidden')"
                    class="flex-1 border border-gray-200 text-gray-600 text-sm font-semibold py-2.5 rounded-xl hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit"
                    class="flex-1 bg-[#064E3B] text-white text-sm font-semibold py-2.5 rounded-xl hover:bg-emerald-800">
                    Simpan Petugas
                </button>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/admin/petugas.blade.php ENDPATH**/ ?>