<?php $__env->startSection('page-title', 'Layanan & Promo'); ?>
<?php $__env->startSection('page-subtitle', 'Kelola daftar layanan dan promosi'); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<div class="mb-4 flex items-center gap-2 bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm font-semibold">
    ✅ <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<?php if(session('error')): ?>
<div class="mb-4 flex items-center gap-2 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm font-semibold">
    ⚠️ <?php echo e(session('error')); ?>

</div>
<?php endif; ?>


<div class="flex items-start justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Layanan & Promo</h1>
        <p class="text-sm text-gray-400 mt-0.5">Kelola daftar layanan dan program promosi aktif di platform BersihIn</p>
    </div>
    <button onclick="bukaModalTambah()" class="flex items-center gap-2 px-4 py-2.5 bg-[#064E3B] text-white text-sm font-semibold rounded-lg hover:bg-emerald-800 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Baru
    </button>
</div>


<div class="flex gap-0 border-b border-gray-200 mb-6">
    <button id="tab-layanan" onclick="switchTab('layanan')"
        class="px-4 pb-3 text-sm font-semibold text-[#064E3B] border-b-2 border-[#064E3B] -mb-px transition">
        Daftar Layanan
    </button>
    <button id="tab-promo" onclick="switchTab('promo')"
        class="px-4 pb-3 text-sm font-medium text-gray-400 hover:text-gray-600 border-b-2 border-transparent -mb-px transition">
        Manajemen Promo
    </button>
</div>


<div id="konten-layanan">
    <div class="grid grid-cols-3 gap-4">
        <?php $__empty_1 = true; $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden hover:shadow-sm transition">
            <div class="h-36 bg-emerald-50 flex items-center justify-center relative">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-sm">
                    <svg class="w-7 h-7 text-[#064E3B]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </div>
                <span class="absolute top-3 right-3 text-[10px] font-bold text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded-full uppercase tracking-wide">Aktif</span>

                
                <form method="POST" action="/bersihin/admin/layanan/hapus"
                      onsubmit="return confirm('Hapus layanan <?php echo e($l->service_name); ?>?')"
                      class="absolute top-3 left-3">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="layanan_id" value="<?php echo e($l->id); ?>">
                    <button type="submit" class="w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm hover:bg-red-50 transition">
                        <svg class="w-4 h-4 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="p-4">
                <h3 class="font-bold text-gray-800 text-sm"><?php echo e($l->service_name); ?></h3>
                <p class="text-xs text-gray-400 mt-0.5 mb-3"><?php echo e($l->description); ?></p>
                <div class="flex items-center justify-between">
                    <span class="text-base font-extrabold text-[#064E3B]">Rp <?php echo e(number_format($l->price, 0, ',', '.')); ?></span>
                    <button onclick="bukaModalEdit(<?php echo e($l->id); ?>, '<?php echo e(addslashes($l->service_name)); ?>', '<?php echo e(addslashes($l->description)); ?>', <?php echo e($l->price); ?>, <?php echo e($l->duration ?? 60); ?>)"
                        class="flex items-center gap-1 text-xs font-semibold text-gray-500 hover:text-[#064E3B] transition">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-span-3 text-center py-8 text-sm text-gray-400">Belum ada layanan</div>
        <?php endif; ?>
    </div>
</div>


<div id="konten-promo" class="hidden">
    <div class="bg-white rounded-xl border border-gray-100">
        <div class="px-5 py-4 border-b border-gray-100">
            <p class="text-sm text-gray-400">Voucher aktif dan penawaran khusus untuk pelanggan.</p>
        </div>
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Nama Promo</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Tipe</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Berlaku Hingga</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php $__currentLoopData = $promos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-50/60 transition">
                    <td class="px-5 py-4">
                        <p class="text-sm font-semibold text-gray-800"><?php echo e($pr->title); ?></p>
                        <p class="text-xs text-gray-400 mt-0.5"><?php echo e($pr->subtitle); ?></p>
                    </td>
                    <td class="px-5 py-4">
                        <span class="text-xs font-bold px-3 py-1.5 rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200">
                            <?php echo e(ucfirst($pr->type)); ?>

                        </span>
                    </td>
                    <td class="px-5 py-4">
                        <span class="text-sm text-gray-600"><?php echo e($pr->valid_until); ?></span>
                    </td>
                    <td class="px-5 py-4">
                        <span class="text-xs font-semibold <?php echo e($pr->is_active ? 'text-emerald-600' : 'text-gray-400'); ?>">
                            <?php echo e($pr->is_active ? 'Aktif' : 'Nonaktif'); ?>

                        </span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>


<div id="modalTambah" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
     onclick="if(event.target===this) tutupModal('modalTambah')">
    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md z-10">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-900">Tambah Layanan Baru</h3>
            <button onclick="tutupModal('modalTambah')" class="text-gray-400 hover:text-gray-600">✕</button>
        </div>
        <form method="POST" action="/bersihin/admin/layanan">
            <?php echo csrf_field(); ?>
            <div class="px-6 py-5 space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1.5">Nama Layanan</label>
                    <input type="text" name="service_name" required placeholder="cth: Cuci Sofa"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1.5">Deskripsi</label>
                    <textarea name="description" rows="2" placeholder="Deskripsi layanan..."
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 resize-none"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1.5">Harga (Rp)</label>
                        <input type="number" name="price" required placeholder="150000"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1.5">Durasi (menit)</label>
                        <input type="number" name="duration" placeholder="60"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400">
                    </div>
                </div>
            </div>
            <div class="px-6 pb-5 flex justify-end gap-3">
                <button type="button" onclick="tutupModal('modalTambah')"
                    class="px-4 py-2 text-sm font-semibold text-gray-600 border border-gray-200 rounded-xl hover:bg-gray-50">Batal</button>
                <button type="submit"
                    class="px-5 py-2 text-sm font-bold text-white bg-[#064E3B] rounded-xl hover:bg-emerald-800">Simpan</button>
            </div>
        </form>
    </div>
</div>


<div id="modalEdit" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
     onclick="if(event.target===this) tutupModal('modalEdit')">
    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md z-10">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-900">Edit Layanan</h3>
            <button onclick="tutupModal('modalEdit')" class="text-gray-400 hover:text-gray-600">✕</button>
        </div>
        <form method="POST" action="/bersihin/admin/layanan/edit">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="layanan_id" id="edit_id">
            <div class="px-6 py-5 space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1.5">Nama Layanan</label>
                    <input type="text" name="service_name" id="edit_name" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1.5">Deskripsi</label>
                    <textarea name="description" id="edit_desc" rows="2"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 resize-none"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1.5">Harga (Rp)</label>
                        <input type="number" name="price" id="edit_price" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1.5">Durasi (menit)</label>
                        <input type="number" name="duration" id="edit_duration"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400">
                    </div>
                </div>
            </div>
            <div class="px-6 pb-5 flex justify-end gap-3">
                <button type="button" onclick="tutupModal('modalEdit')"
                    class="px-4 py-2 text-sm font-semibold text-gray-600 border border-gray-200 rounded-xl hover:bg-gray-50">Batal</button>
                <button type="submit"
                    class="px-5 py-2 text-sm font-bold text-white bg-[#064E3B] rounded-xl hover:bg-emerald-800">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
function switchTab(tab) {
    document.getElementById('konten-layanan').classList.add('hidden');
    document.getElementById('konten-promo').classList.add('hidden');
    document.getElementById('tab-layanan').className = 'px-4 pb-3 text-sm font-medium text-gray-400 hover:text-gray-600 border-b-2 border-transparent -mb-px transition';
    document.getElementById('tab-promo').className   = 'px-4 pb-3 text-sm font-medium text-gray-400 hover:text-gray-600 border-b-2 border-transparent -mb-px transition';
    document.getElementById('konten-' + tab).classList.remove('hidden');
    document.getElementById('tab-' + tab).className = 'px-4 pb-3 text-sm font-semibold text-[#064E3B] border-b-2 border-[#064E3B] -mb-px transition';
}

function bukaModalTambah() {
    document.getElementById('modalTambah').classList.remove('hidden');
}

function bukaModalEdit(id, nama, desc, harga, durasi) {
    document.getElementById('edit_id').value       = id;
    document.getElementById('edit_name').value     = nama;
    document.getElementById('edit_desc').value     = desc;
    document.getElementById('edit_price').value    = harga;
    document.getElementById('edit_duration').value = durasi;
    document.getElementById('modalEdit').classList.remove('hidden');
}

function tutupModal(id) {
    document.getElementById(id).classList.add('hidden');
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/admin/layanan.blade.php ENDPATH**/ ?>