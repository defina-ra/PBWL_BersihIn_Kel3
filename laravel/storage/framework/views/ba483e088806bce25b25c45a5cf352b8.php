<?php $__env->startSection('page-title', 'Pengaturan Profil'); ?>
<?php $__env->startSection('page-subtitle', 'Kelola informasi akun dan preferensi kerja Anda'); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm font-semibold">
    ✅ <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<?php if(session('error')): ?>
<div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm font-semibold">
    ❌ <?php echo e(session('error')); ?>

</div>
<?php endif; ?>

<form method="POST" action="/bersihin/petugas/pengaturan" enctype="multipart/form-data">
<?php echo csrf_field(); ?>

<div class="grid grid-cols-3 gap-6">

    
    <div class="col-span-1 space-y-4">

        
        <div class="bg-white rounded-2xl border border-gray-100 p-6 text-center">
            <div class="relative inline-block mb-4">
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-emerald-100 shadow-md mx-auto">
                    <?php if(auth()->user()->avatar): ?>
                        <img src="<?php echo e(asset('storage/' . auth()->user()->avatar)); ?>"
                            alt="Foto Profil"
                            class="w-full h-full object-cover"
                            id="preview-foto">
                    <?php else: ?>
                        <div class="w-full h-full bg-[#064E3B] flex items-center justify-center text-white text-2xl font-bold" id="avatar-initials">
                            <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                        </div>
                        <img src="" alt="" class="hidden w-full h-full object-cover" id="preview-foto">
                    <?php endif; ?>
                </div>
                <label for="avatar-upload" class="absolute bottom-0 right-0 w-7 h-7 bg-[#064E3B] rounded-full flex items-center justify-center shadow border-2 border-white hover:bg-emerald-700 transition cursor-pointer">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </label>
                <input type="file" name="avatar" id="avatar-upload" class="hidden" accept="image/*"
                    onchange="previewFoto(this)">
            </div>

            <h2 class="text-lg font-extrabold text-gray-900"><?php echo e(auth()->user()->name); ?></h2>
            <p class="text-sm text-gray-400 mt-0.5">ID: BRS-<?php echo e(str_pad(auth()->user()->id, 4, '0', STR_PAD_LEFT)); ?></p>

            <div class="border-t border-gray-100 my-4"></div>

            <div class="space-y-3 text-left">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Total Tugas Selesai</span>
                    <span class="text-sm font-extrabold text-gray-900"><?php echo e($totalSelesai); ?></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Bergabung Sejak</span>
                    <span class="text-sm font-semibold text-gray-700"><?php echo e(\Carbon\Carbon::parse(auth()->user()->created_at)->format('M Y')); ?></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Rating Rata-rata</span>
                    <div class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span class="text-sm font-extrabold text-gray-900"><?php echo e($rating ? number_format($rating, 1) : '-'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="bg-[#064E3B] rounded-2xl p-5">
            <p class="text-xs font-bold text-green-300 uppercase tracking-widest mb-3">Pencapaian Terbaru</p>
            <div class="space-y-2.5">
                <div class="flex items-center gap-2.5">
                    <div class="w-7 h-7 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-white text-xs font-semibold"><?php echo e($totalSelesai); ?> Tugas Selesai</p>
                </div>
                <div class="flex items-center gap-2.5">
                    <div class="w-7 h-7 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-white text-xs font-semibold">Zero Komplain 30 Hari</p>
                </div>
            </div>
        </div>

    </div>

    
    <div class="col-span-2 space-y-4">

        
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-8 bg-emerald-50 rounded-xl flex items-center justify-center">
                    <svg class="w-4 h-4 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Informasi Akun</h3>
                    <p class="text-xs text-gray-400">Data diri yang terdaftar di sistem BersihIn</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5 block">Nama Lengkap</label>
                    <input type="text" name="name" value="<?php echo e(auth()->user()->name); ?>"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 font-medium focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-50">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5 block">ID Pegawai</label>
                    <input type="text" value="BRS-<?php echo e(str_pad(auth()->user()->id, 4, '0', STR_PAD_LEFT)); ?>" readonly
                        class="w-full border border-gray-100 rounded-xl px-4 py-2.5 text-sm text-gray-400 bg-gray-50 cursor-not-allowed">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5 block">Nomor WhatsApp</label>
                    <input type="text" name="phone" value="<?php echo e(auth()->user()->phone); ?>"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 font-medium focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-50">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5 block">Email</label>
                    <input type="email" name="email" value="<?php echo e(auth()->user()->email); ?>"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 font-medium focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-50">
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-8 bg-amber-50 rounded-xl flex items-center justify-center">
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Keamanan Akun</h3>
                    <p class="text-xs text-gray-400">Ubah password akun kamu</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5 block">Password Lama</label>
                    <input type="password" name="password_lama" placeholder="••••••••"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5 block">Password Baru</label>
                    <input type="password" name="password_baru" placeholder="••••••••"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400">
                </div>
            </div>
        </div>

        
        <div class="flex justify-end">
            <button type="submit" class="flex items-center gap-2 bg-[#064E3B] text-white text-sm font-bold px-6 py-3 rounded-xl hover:bg-emerald-800 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Simpan Perubahan
            </button>
        </div>

    </div>

</div>

</form>

<script>
function previewFoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview-foto');
            const initials = document.getElementById('avatar-initials');
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            if (initials) initials.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/petugas/pengaturan.blade.php ENDPATH**/ ?>