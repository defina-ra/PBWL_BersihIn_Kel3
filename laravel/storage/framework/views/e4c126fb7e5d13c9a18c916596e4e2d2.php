<?php $__env->startSection('page-title', 'Form Booking'); ?>
<?php $__env->startSection('page-subtitle', 'Isi detail pesanan kebersihan kamu'); ?>

<?php $__env->startSection('content'); ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap');
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .form-card {
        background: white;
        border-radius: 20px;
        border: 1px solid rgba(0,0,0,0.07);
        padding: 24px;
    }

    .service-card {
        border: 2px solid #e5e7eb;
        border-radius: 14px;
        padding: 16px;
        cursor: pointer;
        transition: all 0.2s;
        position: relative;
    }
    .service-card:hover {
        border-color: #2563eb;
        background: #eff6ff;
    }
    .service-card.selected {
        border-color: #2563eb;
        background: #eff6ff;
    }
    .service-card .check {
        display: none;
        position: absolute;
        top: 10px; right: 10px;
        width: 22px; height: 22px;
        background: #2563eb;
        border-radius: 50%;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 12px;
        font-weight: bold;
    }
    .service-card.selected .check {
        display: flex;
    }

    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 6px;
    }

    .form-input {
        width: 100%;
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        padding: 12px 14px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #111827;
        background: white;
    }
    .form-input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37,99,235,0.08);
    }

    .time-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 8px;
    }
    .time-btn {
        padding: 10px 6px;
        border-radius: 10px;
        border: 1.5px solid #e5e7eb;
        background: white;
        font-size: 13px;
        font-weight: 600;
        color: #6b7280;
        cursor: pointer;
        transition: all 0.2s;
        text-align: center;
    }
    .time-btn:hover, .time-btn.selected {
        border-color: #2563eb;
        background: #2563eb;
        color: white;
    }

    .summary-card {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        border-radius: 16px;
        padding: 20px;
        color: white;
    }

    .submit-btn {
        width: 100%;
        padding: 15px;
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
    .submit-btn:disabled { opacity: 0.5; cursor: not-allowed; }

    .step-indicator {
        display: flex;
        align-items: center;
        gap: 0;
        margin-bottom: 4px;
    }
    .step {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 600;
        color: #9ca3af;
    }
    .step.active { color: #2563eb; }
    .step.done { color: #16a34a; }
    .step-dot {
        width: 24px; height: 24px;
        border-radius: 50%;
        background: #e5e7eb;
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 700; color: #9ca3af;
        flex-shrink: 0;
    }
    .step.active .step-dot { background: #2563eb; color: white; }
    .step.done .step-dot { background: #16a34a; color: white; }
    .step-line { flex: 1; height: 2px; background: #e5e7eb; margin: 0 4px; }
    .step-line.done { background: #16a34a; }

    .alert-error {
        background: #fee2e2;
        color: #dc2626;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 16px;
    }
</style>

<div class="space-y-5 pb-6">

    
    <div class="step-indicator">
        <div class="step active">
            <div class="step-dot">1</div>
            <span>Booking</span>
        </div>
        <div class="step-line"></div>
        <div class="step">
            <div class="step-dot">2</div>
            <span>Pembayaran</span>
        </div>
        <div class="step-line"></div>
        <div class="step">
            <div class="step-dot">3</div>
            <span>Selesai</span>
        </div>
    </div>

    
    <?php if(session('error')): ?>
    <div class="alert-error">❌ <?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <form action="/bersihin/booking" method="POST" id="bookingForm">
        <?php echo csrf_field(); ?>

        
        <div class="form-card mb-4">
            <h3 class="font-bold text-gray-800 mb-1">Pilih Layanan</h3>
            <p class="text-gray-400 text-xs mb-4">Pilih jenis kebersihan yang kamu butuhkan</p>

            <input type="hidden" name="service_id" id="service_id" value="<?php echo e($service->id ?? ''); ?>">

            <div class="space-y-3" id="serviceList">
                <?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="service-card <?php echo e(isset($service) && $service->id == $l->id ? 'selected' : ''); ?>"
                     onclick="selectService(<?php echo e($l->id); ?>, '<?php echo e($l->service_name); ?>', <?php echo e($l->price); ?>, this)">
                    <div class="check">✓</div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-bold text-gray-800 text-sm"><?php echo e($l->service_name); ?></p>
                            <p class="text-gray-400 text-xs mt-0.5"><?php echo e($l->description ?? 'Layanan kebersihan profesional'); ?></p>
                            <?php if($l->duration): ?>
                            <p class="text-gray-400 text-xs mt-0.5">⏱ <?php echo e($l->duration); ?> menit</p>
                            <?php endif; ?>
                        </div>
                        <div class="text-right flex-shrink-0 ml-3">
                            <p class="font-bold text-blue-600 text-sm">Rp <?php echo e(number_format($l->price, 0, ',', '.')); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <div class="form-card mb-4">
            <h3 class="font-bold text-gray-800 mb-4">Jadwal Kunjungan</h3>

            <div class="mb-4">
                <label class="form-label">Tanggal</label>
                <input type="date" name="booking_date" id="booking_date" class="form-input"
                    min="<?php echo e(date('Y-m-d', strtotime('+1 day'))); ?>"
                    value="<?php echo e(old('booking_date')); ?>" required>
            </div>

            <div>
                <label class="form-label">Waktu</label>
                <input type="hidden" name="booking_time" id="booking_time" value="<?php echo e(old('booking_time')); ?>">
                <div class="time-grid">
                    <?php $__currentLoopData = ['07:00', '08:00', '09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" class="time-btn <?php echo e(old('booking_time') == $time ? 'selected' : ''); ?>"
                        onclick="selectTime('<?php echo e($time); ?>', this)">
                        <?php echo e($time); ?>

                    </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        
        <div class="form-card mb-4">
            <h3 class="font-bold text-gray-800 mb-4">Lokasi Pembersihan</h3>

            <div class="mb-3">
                <label class="form-label">Alamat Lengkap</label>
                <textarea name="address" class="form-input" rows="3"
                    placeholder="Contoh: Jl. Melati No. 12, RT 03/RW 05, Kel. Sukamaju, Kec. Cikarang Utara"
                    required><?php echo e(old('address')); ?></textarea>
            </div>

            <div>
                <label class="form-label">Catatan Tambahan (opsional)</label>
                <input type="text" class="form-input"
                    placeholder="Contoh: Rumah 2 lantai, pagar warna biru..."
                    name="notes">
            </div>
        </div>

        
        <div class="summary-card mb-4" id="summaryCard" style="display:none">
            <p class="text-white/60 text-xs mb-3">Ringkasan Pesanan</p>
            <div class="space-y-2">
                <div class="flex justify-between text-sm">
                    <span class="text-white/70">Layanan</span>
                    <span class="text-white font-semibold" id="sumService">-</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-white/70">Tanggal</span>
                    <span class="text-white font-semibold" id="sumDate">-</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-white/70">Waktu</span>
                    <span class="text-white font-semibold" id="sumTime">-</span>
                </div>
                <div class="border-t border-white/20 my-2"></div>
                <div class="flex justify-between">
                    <span class="text-white/70 text-sm">Total</span>
                    <span class="text-white font-bold text-lg" id="sumPrice">-</span>
                </div>
            </div>
        </div>

        <button type="submit" class="submit-btn" id="submitBtn">
            Lanjut ke Pembayaran →
        </button>

    </form>

</div>

<script>
let selectedServiceName = '';
let selectedServicePrice = 0;
let selectedTime = '<?php echo e(old('booking_time')); ?>';

// Init jika ada service dari query string
<?php if(isset($service)): ?>
selectedServiceName = '<?php echo e($service->service_name); ?>';
selectedServicePrice = <?php echo e($service->price); ?>;
<?php endif; ?>

function selectService(id, name, price, el) {
    document.querySelectorAll('.service-card').forEach(c => c.classList.remove('selected'));
    el.classList.add('selected');
    document.getElementById('service_id').value = id;
    selectedServiceName = name;
    selectedServicePrice = price;
    updateSummary();
}

function selectTime(time, btn) {
    document.querySelectorAll('.time-btn').forEach(b => b.classList.remove('selected'));
    btn.classList.add('selected');
    document.getElementById('booking_time').value = time;
    selectedTime = time;
    updateSummary();
}

document.getElementById('booking_date').addEventListener('change', updateSummary);

function updateSummary() {
    const date = document.getElementById('booking_date').value;
    const serviceId = document.getElementById('service_id').value;

    if (serviceId && date && selectedTime) {
        document.getElementById('summaryCard').style.display = 'block';
        document.getElementById('sumService').textContent = selectedServiceName;
        document.getElementById('sumDate').textContent = formatDate(date);
        document.getElementById('sumTime').textContent = selectedTime + ' WIB';
        document.getElementById('sumPrice').textContent = 'Rp ' + selectedServicePrice.toLocaleString('id-ID');
    }
}

function formatDate(dateStr) {
    const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const d = new Date(dateStr);
    return `${days[d.getDay()]}, ${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`;
}

// Validasi sebelum submit
document.getElementById('bookingForm').addEventListener('submit', function(e) {
    const serviceId = document.getElementById('service_id').value;
    const bookingTime = document.getElementById('booking_time').value;
    const bookingDate = document.getElementById('booking_date').value;

    if (!serviceId) {
        e.preventDefault();
        alert('Pilih layanan terlebih dahulu!');
        return;
    }
    if (!bookingDate) {
        e.preventDefault();
        alert('Pilih tanggal terlebih dahulu!');
        return;
    }
    if (!bookingTime) {
        e.preventDefault();
        alert('Pilih waktu terlebih dahulu!');
        return;
    }
});

// Init summary kalau ada data
updateSummary();
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bersihin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/customer/booking.blade.php ENDPATH**/ ?>