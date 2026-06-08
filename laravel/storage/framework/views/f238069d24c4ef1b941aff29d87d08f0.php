<?php $__env->startSection('page-title', 'Konfirmasi & Pembayaran'); ?>
<?php $__env->startSection('page-subtitle', 'Selesaikan pembayaran pesanan kamu'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-5 pb-6">

    
    <div class="flex items-center gap-0 mb-4">
        <div class="flex items-center gap-2 text-xs font-semibold text-green-600">
            <div class="w-6 h-6 rounded-full bg-green-600 flex items-center justify-center text-white text-xs">✓</div>
            <span>Booking</span>
        </div>
        <div class="flex-1 h-0.5 bg-green-500 mx-2"></div>
        <div class="flex items-center gap-2 text-xs font-semibold text-blue-600">
            <div class="w-6 h-6 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs">2</div>
            <span>Pembayaran</span>
        </div>
        <div class="flex-1 h-0.5 bg-gray-200 mx-2"></div>
        <div class="flex items-center gap-2 text-xs font-semibold text-gray-400">
            <div class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs">3</div>
            <span>Selesai</span>
        </div>
    </div>

    <div class="flex gap-6">

        
        <div class="flex-1">

            
            <div class="bg-white rounded-2xl border-2 border-green-500 p-5 mb-4 flex items-center justify-between">
                <div>
                    <p class="font-bold text-gray-800 text-sm">Transfer Bank</p>
                    <p class="text-gray-400 text-xs mt-0.5">Lakukan pembayaran manual</p>
                </div>
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            
            <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm">
                <h3 class="font-bold text-gray-800 mb-4">Transfer ke Rekening</h3>
                <div class="bg-green-50 rounded-xl p-4 mb-4">
                    <p class="font-bold text-gray-800 text-sm">BCA</p>
                    <p class="text-gray-700 text-sm mt-1">1234-5678-9012</p>
                    <p class="text-gray-500 text-sm">a.n BersihIn Indonesia</p>
                </div>
                <button onclick="navigator.clipboard.writeText('1234567890 12');this.innerText='Tersalin!';setTimeout(()=>this.innerText='Salin Nomor Rekening',2000)"
                    class="border border-green-500 text-green-600 text-sm font-semibold px-4 py-2 rounded-full hover:bg-green-50 transition mb-6">
                    Salin Nomor Rekening
                </button>

                <h3 class="font-bold text-gray-800 mb-3">Upload Bukti</h3>
                <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 mb-4">
                    <input type="file" class="w-full text-sm text-gray-500">
                </div>
                <textarea rows="2" placeholder="Catatan (opsional)"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-500 resize-none focus:outline-none focus:border-green-500 mb-4"></textarea>
               <form method="POST" action="/bersihin/pembayaran" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="booking_id" value="<?php echo e($booking->id ?? ''); ?>">
    
    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-xl text-base transition mb-3">
        Kirim Bukti
    </button>
</form>
                <p class="text-amber-500 text-sm font-medium">Status: Menunggu upload</p>
            </div>
        </div>

        
        <div class="w-72 flex-shrink-0">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="h-40 bg-emerald-50 flex items-center justify-center">
                    <svg class="w-16 h-16 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <div class="p-5">
                    <?php if($booking): ?>
                    <h3 class="font-bold text-gray-900 text-lg mb-1"><?php echo e($booking->service_name); ?></h3>
                    <div class="space-y-2 border-t border-gray-100 pt-4 mt-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Tanggal</span>
                            <span class="text-gray-800 font-medium"><?php echo e(\Carbon\Carbon::parse($booking->booking_date)->format('d M Y')); ?></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Waktu</span>
                            <span class="text-gray-800 font-medium"><?php echo e($booking->booking_time); ?></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Alamat</span>
                            <span class="text-gray-800 font-medium text-right max-w-32"><?php echo e(Str::limit($booking->address, 30)); ?></span>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 mt-4 pt-4">
                        <div class="flex justify-between font-bold">
                            <span class="text-gray-700">Total</span>
                            <span class="text-green-600">Rp <?php echo e(number_format($booking->price, 0, ',', '.')); ?></span>
                        </div>
                    </div>
                    <?php else: ?>
                    <p class="text-gray-400 text-sm text-center py-4">Data pesanan tidak ditemukan</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/customer/pembayaran.blade.php ENDPATH**/ ?>