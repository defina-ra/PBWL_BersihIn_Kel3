<?php $__env->startSection('page-title', 'Verifikasi Pembayaran'); ?>
<?php $__env->startSection('page-subtitle', 'Kelola dan verifikasi bukti transfer pelanggan'); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<div class="notif-bukti mb-4">
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

<?php if(session('error')): ?>
<div class="bg-red-50 border border-red-200 rounded-xl px-4 py-3 mb-4 flex items-center gap-3">
    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#dc2626" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
    <strong class="text-red-700 text-sm"><?php echo e(session('error')); ?></strong>
</div>
<?php endif; ?>

<div class="flex gap-5">

    
    <div class="flex-1">
        <div class="mb-5">
            <h1 class="text-xl font-bold text-gray-900">Verifikasi Pembayaran</h1>
            <p class="text-sm text-gray-400 mt-0.5">Kelola dan verifikasi bukti transfer pembayaran layanan pelanggan.</p>
        </div>

        
        <div class="bg-white rounded-xl border border-gray-100">
            <div class="flex items-center justify-between px-5 py-3.5 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800 text-sm">Antrean Verifikasi</h2>
                <span class="text-xs font-bold text-amber-500 bg-amber-50 px-3 py-1 rounded-full">
                    <?php echo e($antrean->count()); ?> Pending
                </span>
            </div>

            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Tanggal & Jam</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">ID Pesanan</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Customer</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Nominal</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Status</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php $__empty_1 = true; $__currentLoopData = $antrean; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50/60 cursor-pointer"
                        onclick="pilihPesanan(<?php echo e($item->id); ?>, '<?php echo e($item->customer_name); ?>', '<?php echo e(number_format($item->amount, 0, ',', '.')); ?>', '<?php echo e($item->payment_method); ?>', <?php echo e($item->payment_id); ?>, '<?php echo e($item->payment_proof); ?>')">
                        <td class="px-5 py-3.5">
                            <p class="text-sm text-gray-700 font-medium"><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d M Y')); ?></p>
                            <p class="text-xs text-gray-400"><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('H:i')); ?> WIB</p>
                        </td>
                        <td class="px-5 py-3.5">
                            <span class="text-sm font-bold text-[#064E3B]">#BRS-<?php echo e($item->id); ?></span>
                        </td>
                        <td class="px-5 py-3.5">
                            <span class="text-sm text-gray-700"><?php echo e($item->customer_name); ?></span>
                        </td>
                        <td class="px-5 py-3.5">
                            <span class="text-sm font-semibold text-gray-800">Rp <?php echo e(number_format($item->amount, 0, ',', '.')); ?></span>
                        </td>
                        <td class="px-5 py-3.5">
                            <span class="text-xs font-semibold text-amber-500 bg-amber-50 border border-amber-200 px-2.5 py-1 rounded-full">● Pending</span>
                        </td>
                        <td class="px-5 py-3.5">
                            <div class="flex gap-1" onclick="event.stopPropagation()">
                                <button type="button"
                                    onclick="bukaModalAssign(<?php echo e($item->id); ?>, <?php echo e($item->payment_id); ?>, '<?php echo e($item->customer_name); ?>')"
                                    class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-1.5 rounded-lg transition">
                                    ✓ Terima
                                </button>
                                <form method="POST" action="/bersihin/admin/verifikasi/reject">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="booking_id" value="<?php echo e($item->id); ?>">
                                    <input type="hidden" name="payment_id" value="<?php echo e($item->payment_id); ?>">
                                    <button type="submit" class="text-xs font-bold text-red-500 border border-red-300 hover:bg-red-50 px-3 py-1.5 rounded-lg transition">✕ Tolak</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-5 py-8 text-center text-sm text-gray-400">Tidak ada antrean verifikasi</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="bg-white rounded-xl border border-gray-100 mt-5">
            <div class="flex items-center justify-between px-5 py-3.5 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800 text-sm">Sudah Diverifikasi & Belum Ditugaskan</h2>
                <span class="text-xs font-bold text-blue-500 bg-blue-50 px-3 py-1 rounded-full">
                    <?php echo e($sudahVerifikasi->count()); ?> Pesanan
                </span>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">ID Pesanan</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Customer</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Layanan</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Jadwal</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Petugas</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php $__empty_1 = true; $__currentLoopData = $sudahVerifikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50/60">
                        <td class="px-5 py-3.5">
                            <span class="text-sm font-bold text-[#064E3B]">#BRS-<?php echo e($item->id); ?></span>
                        </td>
                        <td class="px-5 py-3.5">
                            <span class="text-sm text-gray-700"><?php echo e($item->customer_name); ?></span>
                        </td>
                        <td class="px-5 py-3.5">
                            <span class="text-sm text-gray-700"><?php echo e($item->service_name); ?></span>
                        </td>
                        <td class="px-5 py-3.5">
                            <p class="text-sm text-gray-700"><?php echo e(\Carbon\Carbon::parse($item->booking_date)->format('d M Y')); ?></p>
                            <p class="text-xs text-gray-400"><?php echo e($item->booking_time); ?></p>
                        </td>
                        <td class="px-5 py-3.5">
                            <?php if($item->petugas_name): ?>
                                <span class="text-xs font-semibold text-green-700 bg-green-50 px-2.5 py-1 rounded-full"><?php echo e($item->petugas_name); ?></span>
                            <?php else: ?>
                                <span class="text-xs text-gray-400 italic">Belum ditugaskan</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-5 py-3.5">
                            <?php if(!$item->petugas_id): ?>
                            <button type="button"
                                onclick="bukaModalAssignSaja(<?php echo e($item->id); ?>, '<?php echo e($item->customer_name); ?>')"
                                class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-lg transition">
                                👤 Tugaskan
                            </button>
                            <?php else: ?>
                            <span class="text-xs text-gray-400">✓ Sudah ditugaskan</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-5 py-8 text-center text-sm text-gray-400">Semua pesanan sudah ditugaskan</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="w-80 shrink-0">
        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden sticky top-5">
            <div class="px-5 py-3.5 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800 text-sm">Review Pembayaran</h2>
            </div>

            
            <div class="p-4">
                <div class="bg-gray-100 rounded-lg overflow-hidden" style="aspect-ratio:4/3;">
                    <div id="bukti-container" class="w-full h-full flex flex-col items-center justify-center gap-2 bg-gradient-to-br from-gray-200 to-gray-300">
                        <?php if($antrean->count() > 0 && $antrean->first()->payment_proof): ?>
                            <img src="<?php echo e(asset('storage/' . $antrean->first()->payment_proof)); ?>"
                                 class="w-full h-full object-contain cursor-pointer"
                                 onclick="window.open(this.src,'_blank')"
                                 title="Klik untuk perbesar">
                        <?php else: ?>
                            <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-xs text-gray-400 font-medium">Klik baris untuk lihat bukti</p>
                        <?php endif; ?>
                    </div>
                </div>
                <p class="text-center text-xs text-gray-400 mt-2">Klik gambar untuk perbesar</p>
            </div>

            
            <div class="px-5 pb-4 space-y-3 border-t border-gray-100 pt-4">
                <?php if($antrean->count() > 0): ?>
                <?php $first = $antrean->first(); ?>
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide">ID Pesanan</span>
                    <span class="text-sm font-bold text-[#064E3B]" id="detail-id">#BRS-<?php echo e($first->id); ?></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide">Customer</span>
                    <span class="text-sm font-bold text-gray-800" id="detail-customer"><?php echo e($first->customer_name); ?></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide">Total Tagihan</span>
                    <span class="text-sm font-bold text-gray-800" id="detail-amount">Rp <?php echo e(number_format($first->amount, 0, ',', '.')); ?></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide">Metode</span>
                    <span class="text-sm text-gray-700" id="detail-method"><?php echo e($first->payment_method); ?></span>
                </div>
                <?php else: ?>
                <p class="text-sm text-gray-400 text-center py-4">Pilih pesanan untuk review</p>
                <?php endif; ?>
            </div>

            
            <div id="sidebar-actions" class="px-5 pb-5 flex flex-col gap-2">
                <?php if($antrean->count() > 0): ?>
                <?php $first = $antrean->first(); ?>
                <button type="button"
                    onclick="bukaModalAssign(<?php echo e($first->id); ?>, <?php echo e($first->payment_id); ?>, '<?php echo e($first->customer_name); ?>')"
                    id="btn-terima"
                    class="w-full py-2.5 rounded-xl font-bold text-sm text-white flex items-center justify-center gap-2"
                    style="background:linear-gradient(135deg,#064e3b,#16a34a);">
                    ✓ Terima & Verifikasi
                </button>
                <form method="POST" action="/bersihin/admin/verifikasi/reject" id="form-tolak-sidebar">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="booking_id" id="sidebar-booking-id" value="<?php echo e($first->id); ?>">
                    <input type="hidden" name="payment_id" id="sidebar-payment-id" value="<?php echo e($first->payment_id); ?>">
                    <button type="submit"
                        class="w-full py-2.5 rounded-xl font-bold text-sm text-red-600 border-2 border-red-200 hover:bg-red-50 transition">
                        ✕ Tolak Pembayaran
                    </button>
                </form>
                <?php endif; ?>
            </div>

            <div class="mx-5 mb-5 bg-emerald-50 border border-emerald-100 rounded-lg p-3 flex gap-2">
                <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <p class="text-xs font-semibold text-emerald-700">Catatan Admin</p>
                    <p class="text-xs text-emerald-600 mt-0.5 leading-relaxed">Pastikan nominal transfer sesuai dengan total tagihan sebelum verifikasi.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="modalAssign"
     class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50"
     onclick="if(event.target===this)tutupModalAssign()">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4" onclick="event.stopPropagation()">

        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <div>
                <h3 class="font-bold text-gray-900">Tugaskan Petugas</h3>
                <p class="text-xs text-gray-400 mt-0.5" id="modal-subtitle">Pilih petugas untuk pesanan ini</p>
            </div>
            <button onclick="tutupModalAssign()" class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="px-6 py-4 bg-emerald-50 border-b border-emerald-100">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-emerald-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-emerald-600 font-medium">Pesanan</p>
                    <p class="text-sm font-bold text-emerald-800" id="modal-order-id">#BRS-</p>
                </div>
                <div class="ml-auto text-right">
                    <p class="text-xs text-emerald-600 font-medium">Customer</p>
                    <p class="text-sm font-bold text-emerald-800" id="modal-customer-name">-</p>
                </div>
            </div>
        </div>

        <form method="POST" action="/bersihin/admin/verifikasi/approve-assign" id="formAssign">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="booking_id" id="assign-booking-id">
            <input type="hidden" name="payment_id" id="assign-payment-id">
            <input type="hidden" name="skip_payment" id="assign-skip-payment" value="0">

            <div class="px-6 py-5">
                <label class="block text-sm font-semibold text-gray-700 mb-3">Pilih Petugas</label>
                <div class="space-y-2 max-h-60 overflow-y-auto" id="daftar-petugas-radio">
                    <?php $__empty_1 = true; $__currentLoopData = $daftarPetugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:border-emerald-400 hover:bg-emerald-50 transition has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50">
                        <input type="radio" name="petugas_id" value="<?php echo e($p->id); ?>" class="accent-emerald-600" required>
                        <div class="w-9 h-9 bg-emerald-600 rounded-full flex items-center justify-center text-white text-sm font-bold shrink-0">
                            <?php echo e(strtoupper(substr($p->name, 0, 2))); ?>

                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800"><?php echo e($p->name); ?></p>
                            <p class="text-xs text-gray-400"><?php echo e($p->email); ?></p>
                        </div>
                        <span class="text-xs font-semibold text-green-700 bg-green-100 px-2 py-0.5 rounded-full">Ready</span>
                    </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-sm text-gray-400 text-center py-4">Belum ada petugas terdaftar</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="px-6 py-4 border-t border-gray-100 flex gap-3">
                <button type="button" onclick="tutupModalAssign()"
                    class="flex-1 border border-gray-200 text-gray-600 text-sm font-semibold py-2.5 rounded-xl hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit"
                    class="flex-1 bg-[#064E3B] text-white text-sm font-semibold py-2.5 rounded-xl hover:bg-emerald-800 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Tugaskan Petugas
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Klik baris → update sidebar kanan + gambar bukti
function pilihPesanan(id, customer, amount, method, paymentId, proof) {
    document.getElementById('detail-id').textContent = '#BRS-' + id;
    document.getElementById('detail-customer').textContent = customer;
    document.getElementById('detail-amount').textContent = 'Rp ' + amount;
    document.getElementById('detail-method').textContent = method;

    // Update tombol sidebar
    const btnTerima = document.getElementById('btn-terima');
    if (btnTerima) {
        btnTerima.onclick = function() { bukaModalAssign(id, paymentId, customer); };
    }
    const sbBookingId = document.getElementById('sidebar-booking-id');
    const sbPaymentId = document.getElementById('sidebar-payment-id');
    if (sbBookingId) sbBookingId.value = id;
    if (sbPaymentId) sbPaymentId.value = paymentId;

    // Update gambar bukti transfer
    const container = document.getElementById('bukti-container');
    if (proof && proof !== 'null' && proof !== '') {
        container.innerHTML = `<img src="/storage/${proof}"
            class="w-full h-full object-contain cursor-pointer"
            onclick="window.open(this.src,'_blank')"
            title="Klik untuk perbesar"
            onerror="this.parentElement.innerHTML='<p class=\\'text-xs text-red-400 p-4 text-center\\'>Gambar tidak ditemukan.<br>Cek storage:link</p>'">`;
    } else {
        container.innerHTML = `
            <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <p class="text-xs text-gray-400">Tidak ada bukti transfer</p>`;
    }
}

// Terima + assign (dari tabel antrean)
function bukaModalAssign(bookingId, paymentId, customerName) {
    document.getElementById('modal-order-id').textContent = '#BRS-' + bookingId;
    document.getElementById('modal-customer-name').textContent = customerName;
    document.getElementById('modal-subtitle').textContent = 'Verifikasi pembayaran & tugaskan petugas';
    document.getElementById('assign-booking-id').value = bookingId;
    document.getElementById('assign-payment-id').value = paymentId;
    document.getElementById('assign-skip-payment').value = '0';
    document.getElementById('modalAssign').classList.remove('hidden');
}

// Assign saja (dari tabel sudah verifikasi)
function bukaModalAssignSaja(bookingId, customerName) {
    document.getElementById('modal-order-id').textContent = '#BRS-' + bookingId;
    document.getElementById('modal-customer-name').textContent = customerName;
    document.getElementById('modal-subtitle').textContent = 'Tugaskan petugas ke pesanan ini';
    document.getElementById('assign-booking-id').value = bookingId;
    document.getElementById('assign-payment-id').value = '';
    document.getElementById('assign-skip-payment').value = '1';
    document.getElementById('modalAssign').classList.remove('hidden');
}

function tutupModalAssign() {
    document.getElementById('modalAssign').classList.add('hidden');
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/admin/verifikasi.blade.php ENDPATH**/ ?>