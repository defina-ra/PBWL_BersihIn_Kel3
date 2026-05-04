<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking - BersihIn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --green-dark: #0a2e1f;
            --green-mid: #0d3d2b;
            --green-accent: #16a34a;
            --green-light: #22c55e;
            --green-pale: #f0fdf4;
            --cream: #f8faf9;
        }

        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Sora', sans-serif; }

        body { background: var(--cream); }

        /* NAVBAR */
        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0,0,0,0.06);
            position: sticky; top: 0; z-index: 50;
        }

        /* PROGRESS STEPS */
        .step-wrapper {
            background: white;
            border-bottom: 1px solid rgba(0,0,0,0.06);
        }

        .step-dot {
            width: 36px; height: 36px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 13px;
            flex-shrink: 0;
        }

        .step-dot.done { background: var(--green-accent); color: white; }
        .step-dot.active { background: var(--green-dark); color: white; box-shadow: 0 0 0 4px rgba(22,163,74,0.2); }
        .step-dot.pending { background: #f3f4f6; color: #9ca3af; }

        .step-line { height: 2px; flex: 1; }
        .step-line.done { background: var(--green-accent); }
        .step-line.pending { background: #e5e7eb; }

        /* FORM */
        .form-card {
            background: white;
            border-radius: 24px;
            border: 1px solid rgba(0,0,0,0.06);
            box-shadow: 0 4px 24px rgba(0,0,0,0.05);
        }

        .form-label {
            display: block;
            font-size: 13px; font-weight: 600;
            color: #374151; margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            border: 1.5px solid #e5e7eb;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 14px; color: #111827;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: all 0.2s;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--green-accent);
            box-shadow: 0 0 0 3px rgba(22,163,74,0.1);
        }

        .form-input::placeholder { color: #9ca3af; }

        .input-icon-wrap { position: relative; }
        .input-icon {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #9ca3af; pointer-events: none;
        }
        .input-icon-wrap .form-input { padding-left: 42px; }

        /* Jam pilihan */
        .time-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 8px; }
        .time-btn {
            padding: 10px 0; border-radius: 10px;
            border: 1.5px solid #e5e7eb;
            font-size: 13px; font-weight: 600; color: #6b7280;
            cursor: pointer; text-align: center;
            transition: all 0.18s;
            background: white;
        }
        .time-btn:hover { border-color: var(--green-accent); color: var(--green-accent); background: var(--green-pale); }
        .time-btn.selected { background: var(--green-accent); border-color: var(--green-accent); color: white; }

        /* Summary card */
        .summary-card {
            background: white;
            border-radius: 24px;
            border: 1px solid rgba(0,0,0,0.06);
            box-shadow: 0 4px 24px rgba(0,0,0,0.05);
            overflow: hidden;
            position: sticky; top: 88px;
        }

        .summary-img {
            width: 100%; height: 180px; object-fit: cover;
            display: block;
        }

        .badge {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 4px 10px; border-radius: 999px;
            font-size: 11px; font-weight: 700;
        }

        .btn-primary {
            width: 100%; padding: 15px;
            background: linear-gradient(135deg, #16a34a, #0d9044);
            color: white; font-weight: 800; font-size: 15px;
            border-radius: 14px; border: none; cursor: pointer;
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-shadow: 0 6px 20px rgba(22,163,74,0.35);
            transition: all 0.2s;
            display: block; text-align: center; text-decoration: none;
            letter-spacing: 0.3px;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(22,163,74,0.4); }
        .btn-primary:active { transform: translateY(0); }

        /* Animasi */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.5s ease forwards; }
        .delay-1 { animation-delay: 0.05s; opacity: 0; }
        .delay-2 { animation-delay: 0.1s; opacity: 0; }
        .delay-3 { animation-delay: 0.15s; opacity: 0; }

        /* Section divider dalam form */
        .form-section-title {
            font-family: 'Sora', sans-serif;
            font-size: 13px; font-weight: 700;
            color: var(--green-mid);
            text-transform: uppercase; letter-spacing: 1.5px;
            display: flex; align-items: center; gap-8px;
            margin-bottom: 16px;
        }

        .form-section-title::after {
            content: ''; flex: 1; height: 1px;
            background: #e5e7eb; margin-left: 12px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar px-10 py-4 flex items-center justify-between">
    <a href="/bersihin" class="font-display text-xl font-800 text-green-800 tracking-tight" style="font-family:'Sora',sans-serif;font-weight:700;">BersihIn</a>

    <div class="flex gap-8 text-sm font-medium text-gray-500">
        <a href="/bersihin/layanan" class="hover:text-green-700 transition">Layanan</a>
        <a href="#" class="hover:text-green-700 transition">Cara Kerja</a>
        <a href="#" class="hover:text-green-700 transition">Harga</a>
        <a href="#" class="hover:text-green-700 transition">Ulasan</a>
    </div>

    <div class="flex items-center gap-3">
    <a href="/bersihin/customer/dashboard" class="text-sm font-semibold text-gray-600 hover:text-green-700 transition flex items-center gap-2">
        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=80&h=80&fit=crop&crop=face" 
             class="w-8 h-8 rounded-full object-cover border-2 border-green-500" alt="Avatar">
        <span>Siti Rahma</span>
    </a>
    <button onclick="document.getElementById('modal-logout-booking').classList.remove('hidden')" 
            class="text-sm font-bold px-5 py-2.5 rounded-full border border-gray-200 text-gray-600 hover:border-red-300 hover:text-red-500 transition">
        Keluar
    </button>
</div>
</nav>

<!-- PROGRESS STEPS -->
<div class="step-wrapper px-10 py-5">
    <div class="flex items-center max-w-lg mx-auto">
        <!-- Step 1 -->
        <div class="flex items-center gap-2.5">
            <div class="step-dot done">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <span class="text-sm font-semibold text-gray-700 whitespace-nowrap">Pilih Layanan</span>
        </div>

        <div class="step-line done mx-4"></div>

        <!-- Step 2 -->
        <div class="flex items-center gap-2.5">
            <div class="step-dot active">2</div>
            <span class="text-sm font-bold text-gray-900 whitespace-nowrap">Detail Pemesanan</span>
        </div>

        <div class="step-line pending mx-4"></div>

        <!-- Step 3 -->
        <div class="flex items-center gap-2.5">
            <div class="step-dot pending">3</div>
            <span class="text-sm text-gray-400 whitespace-nowrap">Pembayaran</span>
        </div>
    </div>
</div>

<!-- BREADCRUMB -->
<div class="px-10 pt-5 pb-1">
    <p class="text-xs text-gray-400">
        <a href="/bersihin" class="hover:text-green-600 transition">Beranda</a>
        <span class="mx-1.5 text-gray-300">›</span>
        <a href="/bersihin/layanan" class="hover:text-green-600 transition">Layanan</a>
        <span class="mx-1.5 text-gray-300">›</span>
        <span class="text-gray-700 font-semibold">Booking</span>
    </p>
</div>

<!-- MAIN CONTENT -->
<section class="px-10 py-6">
    <div class="flex gap-7 max-w-5xl mx-auto items-start">

        <!-- LEFT: FORM -->
        <div class="flex-1 fade-up delay-1">
            <div class="form-card p-8">
                <div class="mb-7">
                    <h2 class="font-display text-2xl font-bold text-gray-900" style="font-family:'Sora',sans-serif;">Isi Detail Pemesanan</h2>
                    <p class="text-sm text-gray-400 mt-1">Lengkapi data di bawah untuk konfirmasi jadwal kebersihan kamu</p>
                </div>

                <!-- SECTION: DATA DIRI -->
                <div class="form-section-title" style="display:flex;align-items:center;gap:0;">
                    <span>Data Diri</span>
                    <span style="flex:1;height:1px;background:#e5e7eb;margin-left:12px;display:block;"></span>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="form-label">Nama Lengkap</label>
                        <div class="input-icon-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </span>
                            <input type="text" class="form-input" placeholder="Masukkan nama lengkap">
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Nomor Telepon</label>
                        <div class="input-icon-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </span>
                            <input type="tel" class="form-input" placeholder="08xx-xxxx-xxxx">
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="form-label">Alamat Lengkap</label>
                    <div class="input-icon-wrap" style="position:relative;">
                        <span class="input-icon" style="top:16px;transform:none;">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </span>
                        <textarea rows="3" class="form-input" style="padding-left:42px;resize:none;" placeholder="Jl. Anggrek No. 12, Sukarame, Bandar Lampung..."></textarea>
                    </div>
                </div>

                <!-- SECTION: JADWAL -->
                <div style="display:flex;align-items:center;margin-bottom:16px;">
                    <span style="font-family:'Sora',sans-serif;font-size:13px;font-weight:700;color:#0a2e1f;text-transform:uppercase;letter-spacing:1.5px;">Jadwal Layanan</span>
                    <span style="flex:1;height:1px;background:#e5e7eb;margin-left:12px;display:block;"></span>
                </div>

                <div class="mb-4">
                    <label class="form-label">Tanggal Layanan</label>
                    <div class="input-icon-wrap">
                        <span class="input-icon">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </span>
                        <input type="date" class="form-input" id="tanggalInput">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="form-label">Jam Layanan</label>
                    <div class="time-grid" id="timeGrid">
                        <button class="time-btn" onclick="selectTime(this)">08.00</button>
                        <button class="time-btn" onclick="selectTime(this)">10.00</button>
                        <button class="time-btn" onclick="selectTime(this)">13.00</button>
                        <button class="time-btn" onclick="selectTime(this)">15.00</button>
                        <button class="time-btn" onclick="selectTime(this)">17.00</button>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">* Pilih jam kedatangan petugas yang tersedia</p>
                </div>

                <!-- SECTION: CATATAN -->
                <div style="display:flex;align-items:center;margin-bottom:16px;">
                    <span style="font-family:'Sora',sans-serif;font-size:13px;font-weight:700;color:#0a2e1f;text-transform:uppercase;letter-spacing:1.5px;">Catatan</span>
                    <span style="flex:1;height:1px;background:#e5e7eb;margin-left:12px;display:block;"></span>
                </div>

                <div class="mb-8">
                    <label class="form-label">Catatan Tambahan <span class="text-gray-400 font-normal">(Opsional)</span></label>
                    <textarea rows="3" class="form-input" style="resize:none;" placeholder="Contoh: Ada anjing peliharaan, fokus pada area dapur dan kamar mandi..."></textarea>
                </div>

                <!-- TOMBOL -->
                <a href="/bersihin/pembayaran" class="btn-primary mb-3">
                    Lanjut ke Pembayaran →
                </a>
                <a href="/bersihin/layanan" class="block text-center text-sm text-gray-400 hover:text-gray-600 transition mt-3">
                    ← Kembali ke Pilih Layanan
                </a>
                <p class="text-center text-gray-400 text-xs mt-3">
                    🔒 Pembatalan gratis maksimal 2 jam sebelum jadwal
                </p>
            </div>
        </div>

        <!-- RIGHT: SUMMARY -->
        <div class="w-72 flex-shrink-0 fade-up delay-2">
            <div class="summary-card">
                <!-- Gambar -->
                <div style="position:relative;">
                    <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=600&q=80" class="summary-img" alt="Deep Cleaning">
                    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(10,46,31,0.6) 0%,transparent 60%);"></div>
                    <div style="position:absolute;bottom:14px;left:16px;">
                        <span class="badge" style="background:rgba(255,255,255,0.2);color:white;backdrop-filter:blur(8px);">
                            <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            ± 4 Jam
                        </span>
                    </div>
                </div>

                <div class="p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wide mb-0.5">Layanan Dipilih</p>
                            <h3 class="font-display font-bold text-gray-900 text-base" style="font-family:'Sora',sans-serif;">Deep Cleaning</h3>
                        </div>
                        <span class="badge" style="background:#f0fdf4;color:#16a34a;">Populer</span>
                    </div>

                    <!-- Detail ringkasan -->
                    <div class="space-y-2.5 border-t border-gray-100 pt-4 mb-4">
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-400 flex items-center gap-1.5">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Tanggal
                            </span>
                            <span class="text-xs font-semibold text-gray-700" id="summaryTanggal">Belum dipilih</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-400 flex items-center gap-1.5">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" d="M12 6v6l4 2"/></svg>
                                Jam
                            </span>
                            <span class="text-xs font-semibold text-gray-700" id="summaryJam">Belum dipilih</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-400 flex items-center gap-1.5">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Lokasi
                            </span>
                            <span class="text-xs font-semibold text-gray-700">Bandar Lampung</span>
                        </div>
                    </div>

                    <!-- Harga -->
                    <div class="rounded-xl p-3.5 mb-4" style="background:#f0fdf4;">
                        <div class="flex justify-between items-center mb-1.5">
                            <span class="text-xs text-gray-500">Harga Layanan</span>
                            <span class="text-sm text-gray-700 font-medium">Rp 250.000</span>
                        </div>
                        <div class="flex justify-between items-center mb-1.5">
                            <span class="text-xs text-gray-500">Biaya Platform</span>
                            <span class="text-sm text-gray-700 font-medium">Rp 5.000</span>
                        </div>
                        <div class="border-t border-green-200 pt-2 mt-2 flex justify-between items-center">
                            <span class="text-sm font-bold text-gray-800">Total</span>
                            <span class="font-extrabold text-green-700" style="font-family:'Sora',sans-serif;font-size:18px;">Rp 255.000</span>
                        </div>
                    </div>

                    <!-- Jaminan -->
                    <div class="rounded-xl p-3.5" style="background:#fffbeb;border:1px solid #fef3c7;">
                        <div class="flex gap-2.5 items-start">
                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background:#fef3c7;">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <p class="text-xs text-yellow-800 leading-relaxed">
                                <span class="font-bold">Jaminan Kepuasan</span><br>
                                Cleaner kami siap mengulang area yang kurang bersih secara gratis tanpa syarat.
                            </p>
                        </div>
                    </div>

                    <!-- Trust badges -->
                    <div class="flex justify-center gap-4 mt-4">
                        <div class="text-center">
                            <p class="text-lg font-extrabold text-green-700" style="font-family:'Sora',sans-serif;">4.9★</p>
                            <p class="text-xs text-gray-400">Rating</p>
                        </div>
                        <div style="width:1px;background:#e5e7eb;"></div>
                        <div class="text-center">
                            <p class="text-lg font-extrabold text-green-700" style="font-family:'Sora',sans-serif;">2rb+</p>
                            <p class="text-xs text-gray-400">Pelanggan</p>
                        </div>
                        <div style="width:1px;background:#e5e7eb;"></div>
                        <div class="text-center">
                            <p class="text-lg font-extrabold text-green-700" style="font-family:'Sora',sans-serif;">100%</p>
                            <p class="text-xs text-gray-400">Terverifikasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="px-10 py-7 bg-white border-t border-gray-100 mt-8">
    <div class="flex justify-between items-center max-w-5xl mx-auto">
        <span style="font-family:'Sora',sans-serif;font-weight:700;color:#16a34a;font-size:17px;">BersihIn</span>
        <div class="flex gap-6 text-gray-400 text-xs">
            <a href="#" class="hover:text-green-600 transition">Tentang Kami</a>
            <a href="#" class="hover:text-green-600 transition">Kebijakan Privasi</a>
            <a href="#" class="hover:text-green-600 transition">Syarat & Ketentuan</a>
            <a href="#" class="hover:text-green-600 transition">Hubungi Kami</a>
        </div>
        <p class="text-gray-400 text-xs">© 2025 BersihIn. All rights reserved.</p>
    </div>
</footer>

<script>
    // Pilih jam
    function selectTime(btn) {
        document.querySelectorAll('.time-btn').forEach(b => b.classList.remove('selected'));
        btn.classList.add('selected');
        document.getElementById('summaryJam').textContent = btn.textContent + ' WIB';
    }

    // Update summary tanggal
    document.getElementById('tanggalInput').addEventListener('change', function() {
        if (this.value) {
            const date = new Date(this.value);
            const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
            document.getElementById('summaryTanggal').textContent = date.toLocaleDateString('id-ID', options);
        }
    });
</script>
</body>
</html>