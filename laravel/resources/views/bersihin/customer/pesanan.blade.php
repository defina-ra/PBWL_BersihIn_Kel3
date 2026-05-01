<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - BersihIn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8f9fa; }
        .sidebar { background-color: #062f21; min-height: 100vh; width: 260px; color: white; position: fixed; }
        .main-content { margin-left: 260px; padding: 30px; width: calc(100% - 260px); }
        .nav-item.active { background: rgba(255, 255, 255, 0.1); border-radius: 12px; color: #4ade80; }
        .sidebar a { text-decoration: none; }
    </style>
</head>
<body>

    <div class="flex">
        <!-- SIDEBAR -->
        <aside class="sidebar p-8">
            <div class="mb-12">
                <h1 class="text-2xl font-bold tracking-tight">BersihIn</h1>
                <p class="text-[10px] text-green-400 font-bold tracking-widest uppercase">Customer Portal</p>
            </div>

            <nav class="space-y-4">
                <!-- Navigasi ke Dashboard -->
                <a href="/bersihin/customer/dashboard" class="nav-item flex items-center gap-4 p-3 text-gray-400 hover:text-white transition">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <!-- Halaman Aktif: Pesanan Saya -->
                <a href="/bersihin/customer/pesanan" class="nav-item active flex items-center gap-4 p-3 text-white font-semibold">
                    <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                    <span>Pesanan Saya</span>
                </a>

                <div class="nav-item flex items-center gap-4 p-3 text-gray-400 hover:text-white cursor-pointer">
                    <i data-lucide="ticket" class="w-5 h-5"></i>
                    <span>Promo</span>
                </div>
                <div class="nav-item flex items-center gap-4 p-3 text-gray-400 hover:text-white cursor-pointer">
                    <i data-lucide="history" class="w-5 h-5"></i>
                    <span>Riwayat Pesanan</span>
                </div>
            </nav>

            <div class="absolute bottom-10 left-8 right-8 space-y-4 border-t border-white/10 pt-6">
                <div class="flex items-center gap-4 text-gray-400 hover:text-white cursor-pointer p-2">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    <span>Pengaturan</span>
                </div>
                <div class="flex items-center gap-4 text-red-400 hover:text-red-300 cursor-pointer p-2">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span>Keluar</span>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-content">
            <!-- Topbar -->
            <header class="flex justify-between items-center mb-8">
                <div class="relative w-96">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i data-lucide="search" class="w-4 h-4"></i>
                    </span>
                    <input type="text" placeholder="Cari layanan atau pesanan..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-100 rounded-xl text-sm focus:outline-none focus:ring-1 focus:ring-green-500">
                </div>
                <div class="flex items-center gap-4">
                    <button class="bg-[#0d4a36] text-white px-5 py-2 rounded-full font-bold text-xs uppercase tracking-wider hover:bg-opacity-90">
                        + Pesan Layanan Baru
                    </button>
                    <div class="flex items-center gap-3 ml-4 border-l pl-4">
                        <div class="text-right">
                            <p class="text-sm font-bold text-gray-800">Siti Rahma</p>
                            <p class="text-[10px] text-gray-400 font-medium">Premium Member</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Siti+Rahma&background=0d4a36&color=fff" class="w-8 h-8 rounded-full" alt="User">
                    </div>
                </div>
            </header>

            <h2 class="text-2xl font-bold text-gray-800 mb-6">Layanan Aktif</h2>

            <!-- Stats Ringkas -->
            <div class="grid grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-50 flex items-center gap-4">
                    <div class="p-2 bg-blue-50 text-blue-500 rounded-lg"><i data-lucide="list"></i></div>
                    <div><p class="text-[10px] text-gray-400 font-bold">SEMUA CEK</p><p class="text-sm font-bold">3 Pesanan</p></div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-50 flex items-center gap-4">
                    <div class="p-2 bg-yellow-50 text-yellow-500 rounded-lg"><i data-lucide="refresh-cw"></i></div>
                    <div><p class="text-[10px] text-gray-400 font-bold">PROSES</p><p class="text-sm font-bold">1 Pesanan</p></div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-50 flex items-center gap-4">
                    <div class="p-2 bg-green-50 text-green-500 rounded-lg"><i data-lucide="check-circle"></i></div>
                    <div><p class="text-[10px] text-gray-400 font-bold">SELESAI HARI INI</p><p class="text-sm font-bold">12 Selesai</p></div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-50 flex items-center gap-4">
                    <div class="p-2 bg-orange-50 text-orange-500 rounded-lg"><i data-lucide="star"></i></div>
                    <div><p class="text-[10px] text-gray-400 font-bold">RATING RATA-RATA</p><p class="text-sm font-bold">4.9 / 5.0</p></div>
                </div>
            </div>

            <!-- Card Layanan Utama (Deep Cleaning) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-50 overflow-hidden mb-8">
                <div class="flex p-6 gap-6">
                    <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&q=80" class="w-40 h-40 object-cover rounded-xl" alt="Layanan">
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                                    Deep Cleaning Service
                                    <span class="bg-blue-100 text-blue-600 text-[10px] px-2 py-0.5 rounded-full">PROSES</span>
                                </h3>
                                <p class="text-xs text-gray-400 mt-1">Minggu, 19 Maret 2024 • 10:30</p>
                            </div>
                            <p class="text-xl font-bold text-green-600">Rp 450.000</p>
                        </div>
                        
                        <div class="mt-4 space-y-2">
                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
                                <span>Jl. Merdeka No. 10, Bandar Lampung</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                                <span>Estimasi Selesai: <strong>13:00 WIB</strong></span>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-between items-center border-t pt-4">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Budi+Setiawan&background=random" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="text-xs font-bold text-gray-800">Budi Setiawan</p>
                                    <p class="text-[10px] text-gray-400">Petugas Deep Clean • ID-882</p>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <button class="px-4 py-2 border border-gray-200 rounded-lg text-xs font-bold hover:bg-gray-50">LIHAT DETAIL</button>
                                <button class="px-4 py-2 bg-[#0d4a36] text-white rounded-lg text-xs font-bold hover:bg-opacity-90">HUBUNGI PETUGAS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner Diskon -->
            <div class="bg-[#0d4a36] rounded-2xl p-8 relative overflow-hidden flex items-center">
                <div class="relative z-10 max-w-lg">
                    <span class="bg-[#2ecc71] text-[#062f21] text-[10px] font-extrabold px-3 py-1 rounded mb-4 inline-block">PENAWARAN TERBATAS</span>
                    <h2 class="text-3xl font-extrabold text-white mb-2">Dapatkan Diskon 30% Untuk Layanan Kedua Anda!</h2>
                    <p class="text-gray-300 text-sm mb-6">Nikmati kebersihan maksimal dengan tenaga pembersih profesional kami. Berlaku untuk semua kategori layanan pembersihan rumah dan kantor.</p>
                    <button class="bg-white text-[#0d4a36] px-6 py-3 rounded-full font-bold text-xs flex items-center gap-2 hover:bg-gray-100">
                        Klaim Promo & Pesan Sekarang <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>
                <div class="absolute right-0 top-0 bottom-0 w-1/3 opacity-20 grayscale">
                    <img src="https://images.unsplash.com/photo-1550963295-019d8a8a61c5?w=400" class="h-full w-full object-cover">
                </div>
            </div>

            <!-- Footer Section -->
            <div class="mt-12 grid grid-cols-2 gap-10 border-t pt-8 text-gray-400">
                <div>
                    <h4 class="text-xs font-bold text-gray-800 mb-2 uppercase flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 text-green-500"></i> Tentang Layanan Kami
                    </h4>
                    <p class="text-[11px] leading-relaxed">BersihIn berkomitmen memberikan standar kebersihan tertinggi dengan tim profesional yang telah terverifikasi. Setiap layanan kami dilengkapi dengan jaminan kepuasan pelanggan dan asuransi bagi kenyamanan properti Anda selama pengerjaan.</p>
                </div>
                <div class="text-right">
                    <h4 class="text-xs font-bold text-gray-800 mb-2 uppercase">Butuh Bantuan?</h4>
                    <div class="space-y-1 text-[11px]">
                        <p class="hover:text-green-600 cursor-pointer">Hubungi Pusat Bantuan</p>
                        <p class="hover:text-green-600 cursor-pointer">Syarat & Ketentuan</p>
                        <p class="hover:text-green-600 cursor-pointer">Kebijakan Privasi</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>lucide.createIcons();</script>
</body>
</html>