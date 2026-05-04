<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Customer - BersihIn</title>
    
    <!-- Tailwind & Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Link ke CSS yang sudah kamu buat di public/css -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8f9fa; }
        .sidebar { background-color: #062f21; min-height: 100vh; width: 260px; color: white; position: fixed; }
        .main-content { margin-left: 260px; padding: 40px; width: calc(100% - 260px); }
        /* Style tambahan untuk link agar tidak ada garis bawah default */
        .sidebar a { text-decoration: none; }
    </style>
</head>
<body>

    <div class="flex">
        <!-- SIDEBAR -->
        <aside class="sidebar p-8">
            <div class="mb-12">
                <h1 class="text-2xl font-bold tracking-tight">BersihIn</h1>
                <p class="text-[10px] text-green-400 font-bold tracking-widest">CUSTOMER PORTAL</p>
            </div>

            <nav class="space-y-6">
                <!-- Navigasi ke Dashboard -->
                <a href="/bersihin/customer/dashboard" class="flex items-center gap-4 text-white font-semibold cursor-pointer">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 text-green-400"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Navigasi ke Pesanan Saya -->
                <a href="/bersihin/customer/pesanan" class="flex items-center gap-4 text-gray-400 hover:text-white transition cursor-pointer">
                    <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                    <span>Pesanan Saya</span>
                </a>

                <div class="flex items-center gap-4 text-gray-400 hover:text-white transition cursor-pointer">
                    <i data-lucide="ticket" class="w-5 h-5"></i>
                    <span>Promo</span>
                </div>
                <div class="flex items-center gap-4 text-gray-400 hover:text-white transition cursor-pointer">
                    <i data-lucide="history" class="w-5 h-5"></i>
                    <span>Riwayat Pesanan</span>
                </div>
            </nav>

            <div class="absolute bottom-10 space-y-6">
                <div class="flex items-center gap-4 text-gray-400 hover:text-white transition cursor-pointer">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    <span>Pengaturan</span>
                </div>
                <div class="flex items-center gap-4 text-gray-400 hover:text-white transition cursor-pointer">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span>Keluar</span>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-content">
            <!-- Header Atas -->
            <header class="flex justify-between items-center mb-10">
                <h2 class="text-2xl font-bold text-[#0d4a36]">Dashboard</h2>
                <div class="flex items-center gap-6">
                    <button class="bg-[#0d4a36] text-white px-6 py-2.5 rounded-full font-bold text-xs">
                        + PESAN LAYANAN
                    </button>
                    <i data-lucide="bell" class="text-gray-400 w-5 h-5 cursor-pointer"></i>
                    <div class="flex items-center gap-3 border-l pl-6">
                        <div class="text-right">
                            <p class="text-sm font-bold text-gray-800">Siti Rahma</p>
                            <p class="text-[10px] text-gray-400 font-medium">Premium Member</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Siti+Rahma&background=0d4a36&color=fff" class="w-10 h-10 rounded-full" alt="User">
                    </div>
                </div>
            </header>

            <!-- Welcome Text -->
            <section class="mb-8">
                <h3 class="text-3xl font-extrabold text-gray-900">Halo, Siti Rahma!</h3>
                <p class="text-gray-500 mt-1">Rumah bersih, hati senang. Apa yang bisa kami bantu hari ini?</p>
            </section>

            <!-- Info Cards Grid -->
            <div class="grid grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-5">
                    <div class="bg-blue-50 p-3 rounded-xl text-blue-500"><i data-lucide="file-text"></i></div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 tracking-wider">TOTAL PESANAN</p>
                        <p class="text-2xl font-bold text-gray-800">12</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-5">
                    <div class="bg-green-50 p-3 rounded-xl text-green-500"><i data-lucide="truck"></i></div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 tracking-wider text-green-500">STATUS AKTIF</p>
                        <p class="text-lg font-bold text-green-600">Petugas Menuju Lokasi</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-5">
                    <div class="bg-yellow-50 p-3 rounded-xl text-yellow-500"><i data-lucide="ticket"></i></div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 tracking-wider">VOUCHER</p>
                        <p class="text-2xl font-bold text-gray-800">3 <span class="text-sm font-normal text-gray-400">Tersedia</span></p>
                    </div>
                </div>
            </div>

            <!-- Current Order Tracking -->
            <div class="bg-white p-8 rounded-2xl shadow-sm mb-8 border border-gray-50">
                <div class="flex justify-between items-start mb-10">
                    <div>
                        <h4 class="text-lg font-bold text-gray-800">Pesanan Hari Ini</h4>
                        <p class="text-sm text-gray-400">Layanan General Cleaning • #BSH-99281</p>
                    </div>
                    <span class="bg-blue-100 text-blue-600 px-5 py-1.5 rounded-full text-[11px] font-bold tracking-wide">PROSES</span>
                </div>

                <div class="flex items-center justify-between">
                    <!-- Progress Stepper -->
                    <div class="flex-1 flex items-center max-w-2xl">
                        <div class="text-center">
                            <div class="w-10 h-10 bg-[#0d4a36] text-white rounded-full flex items-center justify-center mx-auto mb-2 shadow-lg shadow-green-100">✓</div>
                            <p class="text-[11px] font-bold text-gray-800">Dipesan</p>
                        </div>
                        <div class="flex-1 h-[2px] bg-[#0d4a36] mx-2 mb-6"></div>
                        <div class="text-center">
                            <div class="w-10 h-10 bg-[#0d4a36] text-white rounded-full flex items-center justify-center mx-auto mb-2 shadow-lg shadow-green-100">
                                <i data-lucide="truck" class="w-5 h-5"></i>
                            </div>
                            <p class="text-[11px] font-bold text-green-600">Menuju Lokasi</p>
                        </div>
                        <div class="flex-1 h-[2px] bg-gray-100 mx-2 mb-6"></div>
                        <div class="text-center text-gray-300">
                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i data-lucide="utensils" class="w-5 h-5"></i>
                            </div>
                            <p class="text-[11px] font-bold">Sedang Bekerja</p>
                        </div>
                        <div class="flex-1 h-[2px] bg-gray-100 mx-2 mb-6"></div>
                        <div class="text-center text-gray-300">
                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2">✓</div>
                            <p class="text-[11px] font-bold">Selesai</p>
                        </div>
                    </div>

                    <!-- Worker Profile Card -->
                    <div class="w-64 border border-gray-100 p-6 rounded-2xl text-center shadow-sm">
                        <div class="relative w-16 h-16 mx-auto mb-3">
                            <img src="https://ui-avatars.com/api/?name=Larasati&background=random" class="w-full h-full rounded-full object-cover" alt="Worker">
                            <div class="absolute -bottom-1 -right-1 bg-blue-500 text-white p-0.5 rounded-full border-2 border-white">
                                <i data-lucide="check" class="w-3 h-3"></i>
                            </div>
                        </div>
                        <p class="text-[10px] text-blue-500 font-bold mb-1">VERIFIED</p>
                        <h5 class="font-bold text-gray-800">Larasati</h5>
                        <p class="text-[11px] text-gray-500 mt-1">⭐ 4.9 <span class="text-gray-300">(240 Review)</span></p>
                        <div class="flex gap-2 mt-5">
                            <button class="flex-1 border border-gray-200 py-2 rounded-lg text-[10px] font-bold hover:bg-gray-50">HUBUNGI</button>
                            <button class="flex-1 bg-[#0d4a36] text-white py-2 rounded-lg text-[10px] font-bold">DETAIL</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Promo & Estimation -->
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-2 relative h-72 rounded-3xl overflow-hidden group shadow-md">
                    <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=800&q=80" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="Cleaner">
                    <div class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md p-5 rounded-2xl flex justify-between items-center shadow-xl">
                        <div class="flex items-center gap-4">
                            <div class="bg-green-100 p-3 rounded-xl text-green-600"><i data-lucide="clock"></i></div>
                            <div>
                                <p class="text-[9px] font-bold text-gray-400">ESTIMASI KEDATANGAN</p>
                                <p class="text-lg font-extrabold text-gray-800">8 Menit Lagi</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-[9px] font-bold text-gray-400">JARAK</p>
                            <p class="text-lg font-extrabold text-gray-800">1.2 KM</p>
                        </div>
                    </div>
                </div>

                <div class="bg-[#062f21] p-8 rounded-3xl text-white flex flex-col justify-between shadow-md">
                    <div>
                        <span class="bg-white/10 px-3 py-1 rounded-md text-[9px] font-bold tracking-widest">DISKON KHUSUS</span>
                        <h4 class="text-3xl font-extrabold mt-4">Dapatkan 30% Off</h4>
                        <p class="text-xs text-gray-400 mt-3 leading-relaxed">Berlaku untuk paket 'Ramadan Deep Clean'. Bersihkan hunian menyambut hari raya.</p>
                    </div>
                    <div>
                        <div class="bg-black/20 p-4 rounded-xl border border-white/5 mb-4">
                            <p class="text-[9px] text-gray-500 font-bold mb-1">KODE PROMO</p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold tracking-[3px]">BERSIH30</span>
                                <button class="text-[10px] text-green-400 font-bold">SALIN</button>
                            </div>
                        </div>
                        <button class="w-full bg-[#2ecc71] text-[#062f21] py-3.5 rounded-xl font-bold text-sm hover:brightness-110 transition">
                            KLAIM SEKARANG
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Script Ikon Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>