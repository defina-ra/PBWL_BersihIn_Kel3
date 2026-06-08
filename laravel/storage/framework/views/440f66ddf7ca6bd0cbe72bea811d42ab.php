<?php $__env->startSection('page-title', 'Beri Ulasan'); ?>

<?php $__env->startSection('content'); ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap');
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .hero-card {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        border-radius: 20px;
        padding: 24px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .hero-card::before {
        content: '';
        position: absolute;
        top: -40px; right: -40px;
        width: 150px; height: 150px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }

    .form-card {
        background: white;
        border-radius: 20px;
        border: 1px solid rgba(0,0,0,0.07);
        padding: 24px;
    }

    /* Star Rating */
    .star-group {
        display: flex;
        gap: 8px;
        justify-content: center;
        margin: 8px 0;
    }
    .star-group input[type="radio"] { display: none; }
    .star-group label {
        font-size: 40px;
        color: #d1d5db;
        cursor: pointer;
        transition: color 0.15s, transform 0.15s;
        line-height: 1;
    }
    .star-group label:hover,
    .star-group label:hover ~ label,
    .star-group input:checked ~ label {
        color: #f59e0b;
    }
    /* Reverse trick for CSS-only star rating */
    .star-group {
        flex-direction: row-reverse;
        justify-content: center;
    }
    .star-group label:hover,
    .star-group label:hover ~ label {
        color: #f59e0b;
        transform: scale(1.15);
    }
    .star-group input:checked ~ label {
        color: #f59e0b;
    }

    .rating-label {
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        color: #6b7280;
        min-height: 20px;
        transition: color 0.2s;
    }

    textarea.review-input {
        width: 100%;
        border: 1.5px solid #e5e7eb;
        border-radius: 14px;
        padding: 14px 16px;
        font-size: 14px;
        resize: none;
        outline: none;
        transition: border-color 0.2s;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    textarea.review-input:focus {
        border-color: #2563eb;
    }

    .submit-btn {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        border: none;
        border-radius: 14px;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.1s;
    }
    .submit-btn:hover { opacity: 0.92; }
    .submit-btn:active { transform: scale(0.98); }

    .alert-success {
        background: #dcfce7;
        color: #16a34a;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 16px;
    }
    .alert-error {
        background: #fee2e2;
        color: #dc2626;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 16px;
    }

    .no-booking {
        text-align: center;
        padding: 60px 20px;
    }
</style>

<div class="space-y-5 pb-6">

    
    <?php if(session('success')): ?>
    <div class="alert-success">✅ <?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
    <div class="alert-error">❌ <?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <?php if($booking): ?>

    
    <div class="hero-card">
        <p class="text-white/60 text-xs mb-1">Ulasan untuk pesanan</p>
        <h2 class="text-xl font-bold mb-3"><?php echo e($booking->service_name); ?></h2>
        <div class="flex gap-4 text-sm">
            <div>
                <p class="text-white/60 text-xs">No. Pesanan</p>
                <p class="text-white font-semibold">#<?php echo e(str_pad($booking->id, 5, '0', STR_PAD_LEFT)); ?></p>
            </div>
            <div class="w-px bg-white/20"></div>
            <div>
                <p class="text-white/60 text-xs">Tanggal</p>
                <p class="text-white font-semibold">
                    <?php echo e($booking->booking_date ? \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') : \Carbon\Carbon::parse($booking->created_at)->format('d M Y')); ?>

                </p>
            </div>
            <div class="w-px bg-white/20"></div>
            <div>
                <p class="text-white/60 text-xs">Status</p>
                <p class="text-white font-semibold">✅ Selesai</p>
            </div>
        </div>
    </div>

    
    <div class="form-card">
        <h3 class="font-bold text-gray-800 text-base mb-1">Bagaimana pengalamanmu?</h3>
        <p class="text-gray-400 text-sm mb-6">Ulasanmu membantu kami terus berkembang 🙏</p>

        <form action="/bersihin/customer/ulasan" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="booking_id" value="<?php echo e($booking->id); ?>">

            
            <div class="mb-5">
                <p class="text-sm font-semibold text-gray-700 mb-3 text-center">Beri penilaian</p>
                <div class="star-group" id="starGroup">
                    <input type="radio" name="rating" id="star5" value="5">
                    <label for="star5" title="Luar biasa">★</label>
                    <input type="radio" name="rating" id="star4" value="4">
                    <label for="star4" title="Bagus">★</label>
                    <input type="radio" name="rating" id="star3" value="3">
                    <label for="star3" title="Cukup">★</label>
                    <input type="radio" name="rating" id="star2" value="2">
                    <label for="star2" title="Kurang">★</label>
                    <input type="radio" name="rating" id="star1" value="1">
                    <label for="star1" title="Buruk">★</label>
                </div>
                <p class="rating-label" id="ratingLabel">Tap bintang untuk memberi nilai</p>
                <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs text-center mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mb-5">
                <p class="text-sm font-semibold text-gray-700 mb-2">Pilih yang sesuai (opsional)</p>
                <div class="flex flex-wrap gap-2" id="tagGroup">
                    <?php $__currentLoopData = ['Petugas ramah', 'Hasil bersih', 'Tepat waktu', 'Harga terjangkau', 'Komunikatif', 'Profesional']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="button"
                        onclick="toggleTag(this)"
                        class="tag-btn px-3 py-1.5 rounded-full text-xs font-semibold border border-gray-200 text-gray-500 bg-white hover:border-blue-400 hover:text-blue-600 transition">
                        <?php echo e($tag); ?>

                    </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="mb-6">
                <p class="text-sm font-semibold text-gray-700 mb-2">Ceritakan pengalamanmu</p>
                <textarea name="comment" id="commentBox" class="review-input" rows="4"
                    placeholder="Tulis ulasan kamu di sini... (opsional)"><?php echo e(old('comment')); ?></textarea>
                <p class="text-xs text-gray-400 mt-1 text-right"><span id="charCount">0</span>/300</p>
            </div>

            <button type="submit" class="submit-btn">⭐ Kirim Ulasan</button>
        </form>
    </div>

    <?php else: ?>

    
    <div class="form-card no-booking">
        <div style="font-size:56px; margin-bottom:16px;">⭐</div>
        <h3 class="font-bold text-gray-700 text-lg mb-2">Pilih pesanan dulu</h3>
        <p class="text-gray-400 text-sm mb-5">Pergi ke riwayat pesanan dan tekan tombol "Beri Ulasan" pada pesanan yang sudah selesai.</p>
        <a href="/bersihin/customer/riwayat-pesanan"
           class="inline-block px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold text-sm hover:bg-blue-700 transition">
            Lihat Riwayat Pesanan
        </a>
    </div>

    <?php endif; ?>

</div>

<script>
// Star rating label
const labels = {
    1: '😞 Buruk',
    2: '😕 Kurang memuaskan',
    3: '😐 Cukup',
    4: '😊 Bagus!',
    5: '🤩 Luar biasa!'
};
document.querySelectorAll('input[name="rating"]').forEach(input => {
    input.addEventListener('change', () => {
        const lbl = document.getElementById('ratingLabel');
        lbl.textContent = labels[input.value] || '';
        lbl.style.color = '#f59e0b';
    });
});

// Quick tags → append to comment
function toggleTag(btn) {
    btn.classList.toggle('active');
    if (btn.classList.contains('active')) {
        btn.style.cssText = 'background:#eff6ff;color:#2563eb;border-color:#2563eb;';
    } else {
        btn.style.cssText = '';
    }
    // Rebuild comment from tags
    const tags = [...document.querySelectorAll('.tag-btn.active')].map(b => b.textContent.trim());
    const box = document.getElementById('commentBox');
    const manual = box.dataset.manual || '';
    box.value = tags.length ? tags.join(', ') + (manual ? '. ' + manual : '') : manual;
    updateCount();
}

// Char counter
const box = document.getElementById('commentBox');
if (box) {
    box.addEventListener('input', function() {
        this.dataset.manual = this.value;
        if (this.value.length > 300) this.value = this.value.slice(0, 300);
        updateCount();
    });
}
function updateCount() {
    const box = document.getElementById('commentBox');
    if (box) document.getElementById('charCount').textContent = box.value.length;
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/customer/ulasan.blade.php ENDPATH**/ ?>