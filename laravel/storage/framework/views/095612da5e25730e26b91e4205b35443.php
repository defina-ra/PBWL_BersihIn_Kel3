<?php $__env->startSection('page-title', 'Laporan Transaksi'); ?>
<?php $__env->startSection('page-subtitle', 'Rekap keuangan dan audit transaksi'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-8 bg-gray-50 min-h-screen">

    
    <div class="flex items-start justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Laporan Transaksi</h1>
            <p class="text-gray-500 mt-1">Pantau performa keuangan dan rincian transaksi layanan</p>
        </div>

        
        <button onclick="showToast()"
            class="flex items-center gap-2 px-5 py-2.5 bg-green-800 text-white rounded-xl text-sm font-semibold hover:bg-green-700 transition shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Unduh Laporan
        </button>
    </div>

    
    <div class="grid grid-cols-3 gap-5 mb-8">

        
        <div class="col-span-2 bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-3">Total Pendapatan Periode Ini</p>
            <p class="text-4xl font-bold text-gray-900 mb-4">Rp <?php echo e(number_format($totalPendapatan, 0, ',', '.')); ?></p>
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1.5 text-sm font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                    </svg>
                    +12.5%
                </span>
                <span class="text-sm text-gray-500">vs bulan lalu</span>
                <div class="w-px h-4 bg-gray-200"></div>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Total Transaksi: <span class="font-semibold text-gray-800"><?php echo e($totalTransaksi); ?></span>
                </div>
            </div>
        </div>

        
        <div class="bg-green-800 rounded-2xl p-6 shadow-sm">
            <p class="text-xs font-semibold text-green-300 uppercase tracking-widest mb-3">Estimasi Laba Bersih</p>
            <p class="text-3xl font-bold text-white mb-5">Rp 12.840.500</p>
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-green-300">Target Bulanan</span>
                    <span class="font-bold text-white">85%</span>
                </div>
                <div class="w-full bg-green-700 rounded-full h-2">
                    <div class="bg-white rounded-full h-2" style="width: 85%"></div>
                </div>
            </div>
        </div>

    </div>

    
    <div class="bg-white rounded-2xl border border-gray-200 p-5 mb-6 shadow-sm">
        <div class="flex items-end gap-4">
            <div class="flex-1">
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Pilih Tanggal</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </span>
                    <select class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-700 bg-white appearance-none focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option>September 2023</option>
                        <option>Oktober 2023</option>
                        <option>November 2023</option>
                    </select>
                </div>
            </div>
            <div class="flex-1">
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Kategori Layanan</label>
                <select class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-700 bg-white appearance-none focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option>Semua Layanan</option>
                    <option>Deep Cleaning</option>
                    <option>Bersih Rutin</option>
                    <option>Sedot Tungau</option>
                    <option>Cuci Kasur</option>
                </select>
            </div>
            <div class="flex-1">
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Metode Pembayaran</label>
                <select class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-700 bg-white appearance-none focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option>Semua Metode</option>
                    <option>Transfer Bank</option>
                    <option>E-Wallet</option>
                    <option>Tunai</option>
                </select>
            </div>
            <button class="px-6 py-2.5 bg-green-800 text-white rounded-xl text-sm font-semibold hover:bg-green-700 transition shadow-sm whitespace-nowrap">
                Terapkan Filter
            </button>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-6">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Detail Transaksi</h2>
            <p class="text-sm text-gray-400 flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Menampilkan 1 - 8 dari 184 transaksi
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px]">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Tanggal & Jam</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">ID Pesanan</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Nama Customer</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="text-right px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Nominal</th>
                        <th class="text-right px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Laba</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">

                   <?php $__empty_1 = true; $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr class="hover:bg-gray-50 transition">
    <td class="px-6 py-4 whitespace-nowrap">
        <p class="text-sm font-semibold text-gray-800"><?php echo e(\Carbon\Carbon::parse($t->created_at)->format('d M Y')); ?></p>
        <p class="text-xs text-gray-400 mt-0.5"><?php echo e(\Carbon\Carbon::parse($t->created_at)->format('H:i')); ?> WIB</p>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm font-semibold text-green-700">#INV-<?php echo e($t->id); ?></span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm font-medium text-gray-800"><?php echo e($t->customer_name); ?></span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="inline-block px-3 py-1 rounded-lg text-xs font-semibold bg-green-100 text-green-700">
            <?php echo e($t->service_name); ?>

        </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="inline-flex items-center gap-1.5 text-sm font-medium text-emerald-600">
            <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
            <?php echo e(ucfirst($t->payment_status)); ?>

        </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right">
        <span class="text-sm font-semibold text-gray-800">Rp <?php echo e(number_format($t->amount, 0, ',', '.')); ?></span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right">
        <span class="text-sm font-bold text-emerald-600">Rp <?php echo e(number_format($t->amount * 0.3, 0, ',', '.')); ?></span>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<tr>
    <td colspan="7" class="px-6 py-8 text-center text-sm text-gray-400">Belum ada transaksi</td>
</tr>
<?php endif; ?>

                </tbody>
            </table>
        </div>

        
        <div class="flex items-center justify-between px-6 py-4 border-t border-gray-100">
            <div class="flex items-center gap-1.5">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-100 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-green-800 text-white text-sm font-semibold">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 transition text-sm">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 transition text-sm">3</button>
                <span class="text-gray-400 text-sm px-1">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 transition text-sm">23</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-100 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-500">
                Tampilkan:
                <select class="border border-gray-200 rounded-lg px-3 py-1.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option>10 Baris</option>
                    <option>25 Baris</option>
                    <option>50 Baris</option>
                </select>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-3 gap-5">
        <div class="bg-white rounded-2xl border border-gray-200 p-5 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Pembayaran Terverifikasi</p>
                <p class="text-2xl font-bold text-gray-900 mt-0.5">172 <span class="text-sm font-normal text-gray-500">(93.4%)</span></p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-5 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-amber-500 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Menunggu Konfirmasi</p>
                <p class="text-2xl font-bold text-gray-900 mt-0.5">12 <span class="text-sm font-normal text-gray-500">(6.6%)</span></p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-5 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Profit Margin Rata-rata</p>
                <p class="text-2xl font-bold text-gray-900 mt-0.5">28.4%</p>
            </div>
        </div>
    </div>

</div>


<div id="toast"
    class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-gray-900 text-white text-sm font-medium px-5 py-3.5 rounded-2xl shadow-xl
           opacity-0 translate-y-4 pointer-events-none transition-all duration-300">
    <svg class="w-4 h-4 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
    Fitur unduh akan segera tersedia
</div>

<script>
function showToast() {
    const toast = document.getElementById('toast');
    toast.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
    toast.classList.add('opacity-100', 'translate-y-0');
    setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
        toast.classList.remove('opacity-100', 'translate-y-0');
    }, 3000);
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/admin/laporan.blade.php ENDPATH**/ ?>