@extends('bersihin.layouts.app')

@section('page-title', 'Beri Ulasan')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap');
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .ulasan-wrapper {
        max-width: 680px;
        margin: 0 auto;
    }

    .main-card {
        background: white;
        border-radius: 24px;
        box-shadow: 0 4px 32px rgba(0,0,0,0.07);
        border: 1px solid #f0fdf4;
        overflow: hidden;
    }

    .card-top {
        background: linear-gradient(135deg, #0d3d2e 0%, #1a5c42 100%);
        padding: 32px 32px 28px;
        position: relative;
        overflow: hidden;
        text-align: center;
    }
    .card-top::before {
        content: '';
        position: absolute;
        top: -60px; right: -40px;
        width: 220px; height: 220px;
        background: radial-gradient(circle, rgba(52,211,153,0.18) 0%, transparent 70%);
        border-radius: 50%;
    }
    .card-top::after {
        content: '';
        position: absolute;
        bottom: -40px; left: 10%;
        width: 160px; height: 160px;
        background: radial-gradient(circle, rgba(16,185,129,0.12) 0%, transparent 70%);
        border-radius: 50%;
    }

    .card-body { padding: 28px 32px 32px; }

    .order-info-box {
        background: #f8fffe;
        border: 1.5px solid #d1fae5;
        border-radius: 14px;
        padding: 14px 16px;
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 28px;
    }
    .order-info-box img {
        width: 56px; height: 56px;
        border-radius: 12px;
        object-fit: cover;
        flex-shrink: 0;
    }

    /* Rating Stars */
    .rating-section { text-align: center; margin-bottom: 28px; }
    .rating-label {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #6b7280;
        margin-bottom: 12px;
    }
    .stars-row {
        display: flex;
        justify-content: center;
        gap: 8px;
    }
    .star-btn {
        font-size: 40px;
        cursor: pointer;
        transition: all 0.15s cubic-bezier(0.34,1.56,0.64,1);
        line-height: 1;
        filter: grayscale(1) opacity(0.3);
        transform-origin: center bottom;
    }
    .star-btn.active {
        filter: none;
        transform: scale(1.15);
    }
    .star-btn:hover { transform: scale(1.2); filter: none; }

    .rating-text {
        margin-top: 10px;
        font-size: 13px;
        font-weight: 600;
        color: #059669;
        min-height: 20px;
        transition: all 0.2s;
    }

    /* Aspek Rating */
    .aspek-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin-bottom: 24px;
    }
    .aspek-card {
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        padding: 12px 14px;
        cursor: pointer;
        transition: all 0.2s;
        text-align: center;
        user-select: none;
    }
    .aspek-card:hover { border-color: #10b981; background: #f0fdf4; }
    .aspek-card.selected {
        border-color: #10b981;
        background: #f0fdf4;
        box-shadow: 0 0 0 2px rgba(16,185,129,0.15);
    }
    .aspek-card .aspek-icon { font-size: 22px; margin-bottom: 4px; }
    .aspek-card .aspek-name { font-size: 12px; font-weight: 600; color: #374151; }
    .aspek-card .aspek-stars { font-size: 11px; color: #f59e0b; margin-top: 2px; }

    /* Form inputs */
    .form-label {
        display: block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #6b7280;
        margin-bottom: 8px;
    }
    .form-textarea {
        width: 100%;
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 13px;
        color: #111827;
        font-family: 'Plus Jakarta Sans', sans-serif;
        resize: none;
        outline: none;
        transition: all 0.2s;
        line-height: 1.6;
    }
    .form-textarea:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16,185,129,0.1);
    }

    /* Upload zona */
    .upload-zone {
        border: 2px dashed #d1fae5;
        border-radius: 14px;
        padding: 28px 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        background: #fafffe;
        position: relative;
    }
    .upload-zone:hover {
        border-color: #10b981;
        background: #f0fdf4;
    }
    .upload-zone.dragover {
        border-color: #059669;
        background: #ecfdf5;
        transform: scale(1.01);
    }
    .preview-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 8px;
        margin-top: 12px;
    }
    .preview-item {
        position: relative;
        aspect-ratio: 1;
        border-radius: 10px;
        overflow: hidden;
    }
    .preview-item img {
        width: 100%; height: 100%;
        object-fit: cover;
    }
    .preview-remove {
        position: absolute;
        top: 4px; right: 4px;
        width: 20px; height: 20px;
        background: rgba(0,0,0,0.6);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        font-size: 11px;
        color: white;
        transition: background 0.2s;
    }
    .preview-remove:hover { background: #ef4444; }

    /* Tag pilihan cepat */
    .quick-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 20px; }
    .quick-tag {
        border: 1.5px solid #e5e7eb;
        border-radius: 99px;
        padding: 5px 14px;
        font-size: 12px;
        font-weight: 600;
        color: #6b7280;
        cursor: pointer;
        transition: all 0.2s;
        user-select: none;
    }
    .quick-tag:hover { border-color: #10b981; color: #059669; background: #f0fdf4; }
    .quick-tag.selected {
        background: #059669;
        border-color: #059669;
        color: white;
    }

    /* Submit button */
    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, #059669, #10b981);
        color: white;
        border: none;
        border-radius: 14px;
        padding: 16px;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.25s;
        font-family: 'Plus Jakarta Sans', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: 8px;
    }
    .btn-submit:hover {
        background: linear-gradient(135deg, #047857, #059669);
        box-shadow: 0 8px 24px rgba(5,150,105,0.35);
        transform: translateY(-1px);
    }
    .btn-submit:active { transform: translateY(0); }

    .btn-skip {
        width: 100%;
        background: transparent;
        color: #9ca3af;
        border: none;
        padding: 10px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: color 0.2s;
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin-top: 4px;
    }
    .btn-skip:hover { color: #6b7280; }

    .char-count {
        text-align: right;
        font-size: 11px;
        color: #9ca3af;
        margin-top: 4px;
    }

    /* Success screen */
    .success-screen {
        display: none;
        text-align: center;
        padding: 48px 32px;
    }
    .success-screen.show { display: block; }
    .success-circle {
        width: 80px; height: 80px;
        background: linear-gradient(135deg, #059669, #10b981);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 20px;
        animation: popIn 0.4s cubic-bezier(0.34,1.56,0.64,1);
    }
    @keyframes popIn { from{transform:scale(0);opacity:0} to{transform:scale(1);opacity:1} }

    .divider {
        height: 1px;
        background: #f3f4f6;
        margin: 24px 0;
    }

    @media (max-width: 640px) {
        .card-top { padding: 24px 20px 20px; }
        .card-body { padding: 20px; }
        .aspek-grid { grid-template-columns: 1fr 1fr; }
    }
</style>

<div class="p-6 ulasan-wrapper">

    {{-- Header --}}
    <div class="mb-5">
        <a href="/bersihin/customer/riwayat-pesanan" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-emerald-600 transition mb-3">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Riwayat Pesanan
        </a>
        <h1 class="text-2xl font-bold text-gray-900">Beri Ulasan</h1>
        <p class="text-gray-500 text-sm mt-0.5">Pendapatmu sangat berarti untuk meningkatkan kualitas layanan kami</p>
    </div>

    <div class="main-card">

        {{-- Top Banner --}}
        <div class="card-top relative z-10">
            <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur rounded-full px-4 py-1.5 mb-4">
                <svg class="w-3.5 h-3.5 text-emerald-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <span class="text-white text-xs font-semibold">Ulasanmu membantu ribuan pelanggan lain</span>
            </div>
            <h2 class="text-white font-bold text-xl" style="font-family:'DM Serif Display',serif;">Bagaimana pengalamanmu?</h2>
            <p class="text-emerald-200 text-sm mt-1">Ceritakan layanan BersihIn hari ini kepada kami</p>
        </div>

        {{-- Form --}}
        <div class="card-body" id="formArea">

            {{-- Info Pesanan --}}
            <div class="order-info-box">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=120&q=80" alt="Deep Cleaning">
                <div class="flex-1 min-w-0">
                    <p class="font-bold text-gray-900 text-sm">Deep Cleaning</p>
                    <p class="text-xs text-gray-500 mt-0.5">24 Jan 2024 &nbsp;·&nbsp; <span class="font-mono">#BSN-99201</span></p>
                    <p class="text-xs text-gray-400 mt-0.5">Petugas: <span class="font-medium text-gray-600">Budi Santoso</span></p>
                </div>
                <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full flex-shrink-0">✓ Selesai</span>
            </div>

            {{-- Rating Utama --}}
            <div class="rating-section">
                <p class="rating-label">Kualitas Layanan</p>
                <div class="stars-row" id="mainStars">
                    <span class="star-btn" onclick="setMainRating(1)" onmouseover="hoverRating(1)" onmouseout="unhoverRating()">⭐</span>
                    <span class="star-btn" onclick="setMainRating(2)" onmouseover="hoverRating(2)" onmouseout="unhoverRating()">⭐</span>
                    <span class="star-btn" onclick="setMainRating(3)" onmouseover="hoverRating(3)" onmouseout="unhoverRating()">⭐</span>
                    <span class="star-btn" onclick="setMainRating(4)" onmouseover="hoverRating(4)" onmouseout="unhoverRating()">⭐</span>
                    <span class="star-btn" onclick="setMainRating(5)" onmouseover="hoverRating(5)" onmouseout="unhoverRating()">⭐</span>
                </div>
                <p class="rating-text" id="ratingText">Ketuk bintang untuk memberi nilai</p>
            </div>

            <div class="divider"></div>

            {{-- Aspek Penilaian --}}
            <div class="mb-6">
                <p class="form-label mb-3">Nilai Per Aspek</p>
                <div class="aspek-grid">
                    <div class="aspek-card" onclick="toggleAspek(this,1)">
                        <div class="aspek-icon">🧹</div>
                        <div class="aspek-name">Kebersihan</div>
                        <div class="aspek-stars" id="aspek-stars-1">☆☆☆☆☆</div>
                    </div>
                    <div class="aspek-card" onclick="toggleAspek(this,2)">
                        <div class="aspek-icon">⏰</div>
                        <div class="aspek-name">Ketepatan Waktu</div>
                        <div class="aspek-stars" id="aspek-stars-2">☆☆☆☆☆</div>
                    </div>
                    <div class="aspek-card" onclick="toggleAspek(this,3)">
                        <div class="aspek-icon">😊</div>
                        <div class="aspek-name">Keramahan</div>
                        <div class="aspek-stars" id="aspek-stars-3">☆☆☆☆☆</div>
                    </div>
                    <div class="aspek-card" onclick="toggleAspek(this,4)">
                        <div class="aspek-icon">💰</div>
                        <div class="aspek-name">Harga Sesuai</div>
                        <div class="aspek-stars" id="aspek-stars-4">☆☆☆☆☆</div>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            {{-- Quick Tags --}}
            <div class="mb-6">
                <p class="form-label mb-3">Pilih yang Paling Sesuai</p>
                <div class="quick-tags">
                    <span class="quick-tag" onclick="toggleTag(this)">✨ Hasil memuaskan</span>
                    <span class="quick-tag" onclick="toggleTag(this)">⏱ Tepat waktu</span>
                    <span class="quick-tag" onclick="toggleTag(this)">😊 Petugas ramah</span>
                    <span class="quick-tag" onclick="toggleTag(this)">🧴 Peralatan lengkap</span>
                    <span class="quick-tag" onclick="toggleTag(this)">💬 Komunikatif</span>
                    <span class="quick-tag" onclick="toggleTag(this)">🔄 Mau pesan lagi</span>
                    <span class="quick-tag" onclick="toggleTag(this)">💡 Perlu peningkatan</span>
                    <span class="quick-tag" onclick="toggleTag(this)">🌟 Rekomendasi ke teman</span>
                </div>
            </div>

            {{-- Komentar --}}
            <div class="mb-6">
                <label class="form-label">Tulis Komentar <span class="text-gray-400 font-normal normal-case">(opsional)</span></label>
                <textarea class="form-textarea" rows="4"
                    placeholder="Ceritakan detail pengalamanmu — apa yang paling kamu suka? Ada yang bisa diperbaiki?"
                    id="komentarInput" maxlength="500"
                    oninput="updateCharCount(this)"></textarea>
                <p class="char-count"><span id="charCount">0</span>/500</p>
            </div>

            {{-- Upload Foto --}}
            <div class="mb-6">
                <label class="form-label">Unggah Foto Hasil Pembersihan <span class="text-gray-400 font-normal normal-case">(opsional)</span></label>
                <div class="upload-zone" id="uploadZone"
                     onclick="document.getElementById('fotoInput').click()"
                     ondragover="event.preventDefault();this.classList.add('dragover')"
                     ondragleave="this.classList.remove('dragover')"
                     ondrop="handleDrop(event)">
                    <input type="file" id="fotoInput" accept="image/*" multiple class="hidden" onchange="handleFiles(this.files)">
                    <div id="uploadPlaceholder">
                        <svg class="w-10 h-10 text-emerald-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <p class="text-sm font-semibold text-gray-600">Klik atau seret foto ke sini</p>
                        <p class="text-xs text-gray-400 mt-1">Maksimal 3 foto · JPG/PNG · Maks. 5MB per foto</p>
                    </div>
                    <div class="preview-grid" id="previewGrid"></div>
                </div>
            </div>

            {{-- Submit --}}
            <button class="btn-submit" onclick="kirimUlasan()">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                Kirim Ulasan
            </button>
            <button class="btn-skip" onclick="history.back()">Lewati untuk saat ini</button>

        </div>

        {{-- Success Screen --}}
        <div class="success-screen" id="successScreen">
            <div class="success-circle">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Terima Kasih! 🎉</h3>
            <p class="text-gray-500 text-sm mb-2">Ulasanmu sudah kami terima dan akan membantu pelanggan lain memilih layanan terbaik.</p>
            <div class="inline-flex items-center gap-2 bg-amber-50 border border-amber-200 rounded-full px-4 py-2 my-4">
                <span class="text-amber-500 font-bold">+50 Poin</span>
                <span class="text-amber-700 text-sm">ditambahkan ke akunmu! 🌟</span>
            </div>
            <div class="flex gap-3 justify-center mt-4">
                <a href="/bersihin/customer/riwayat-pesanan"
                   class="btn-submit" style="width:auto;padding:12px 24px;border-radius:10px;text-decoration:none">
                    Kembali ke Riwayat
                </a>
            </div>
        </div>

    </div>
</div>

<script>
let mainRating = 0;
const ratingLabels = ['', 'Sangat mengecewakan 😞', 'Kurang memuaskan 😕', 'Cukup baik 😊', 'Bagus sekali! 😄', 'Luar biasa! Sempurna! 🤩'];

function setMainRating(n) {
    mainRating = n;
    updateStars(n);
    document.getElementById('ratingText').textContent = ratingLabels[n];
}

function hoverRating(n) { updateStars(n); }
function unhoverRating() { updateStars(mainRating); }

function updateStars(n) {
    document.querySelectorAll('#mainStars .star-btn').forEach((s, i) => {
        s.classList.toggle('active', i < n);
    });
}

const aspekRatings = {1:0, 2:0, 3:0, 4:0};
function toggleAspek(card, id) {
    card.classList.add('selected');
    const r = aspekRatings[id] < 5 ? aspekRatings[id] + 1 : 1;
    aspekRatings[id] = r;
    document.getElementById('aspek-stars-' + id).textContent = '★'.repeat(r) + '☆'.repeat(5 - r);
}

function toggleTag(el) { el.classList.toggle('selected'); }

function updateCharCount(el) {
    document.getElementById('charCount').textContent = el.value.length;
}

let uploadedFiles = [];
function handleFiles(files) {
    Array.from(files).forEach(f => {
        if (uploadedFiles.length >= 3) return;
        uploadedFiles.push(f);
        const reader = new FileReader();
        reader.onload = e => addPreview(e.target.result, uploadedFiles.length - 1);
        reader.readAsDataURL(f);
    });
    if (uploadedFiles.length > 0) {
        document.getElementById('uploadPlaceholder').style.display = 'none';
    }
}
function handleDrop(e) {
    e.preventDefault();
    document.getElementById('uploadZone').classList.remove('dragover');
    handleFiles(e.dataTransfer.files);
}
function addPreview(src, idx) {
    const grid = document.getElementById('previewGrid');
    const div = document.createElement('div');
    div.className = 'preview-item';
    div.innerHTML = `<img src="${src}"><div class="preview-remove" onclick="removePreview(${idx})">✕</div>`;
    grid.appendChild(div);
}
function removePreview(idx) {
    uploadedFiles.splice(idx, 1);
    const grid = document.getElementById('previewGrid');
    grid.innerHTML = '';
    uploadedFiles.forEach((f, i) => {
        const reader = new FileReader();
        reader.onload = e => addPreview(e.target.result, i);
        reader.readAsDataURL(f);
    });
    if (uploadedFiles.length === 0) {
        document.getElementById('uploadPlaceholder').style.display = '';
    }
}

function kirimUlasan() {
    if (mainRating === 0) {
        document.getElementById('ratingText').textContent = '⚠ Pilih rating dulu ya!';
        document.getElementById('ratingText').style.color = '#ef4444';
        document.querySelector('.stars-row').style.animation = 'shake 0.3s ease';
        setTimeout(() => document.querySelector('.stars-row').style.animation = '', 300);
        return;
    }
    document.getElementById('formArea').style.display = 'none';
    document.getElementById('successScreen').classList.add('show');
    window.scrollTo({top: 0, behavior: 'smooth'});
}
</script>

@endsection