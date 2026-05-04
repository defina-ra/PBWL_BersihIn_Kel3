<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BersihIn Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        .sidebar-link { transition: all 0.2s ease; }
        .sidebar-link:hover { background: rgba(255,255,255,0.08); }
        .sidebar-link.active { background: rgba(255,255,255,0.13); color: white; }
    </style>
</head>
<body class="bg-gray-50">
<div class="flex min-h-screen">

    {{-- ===== SIDEBAR ===== --}}
    <div class="w-[200px] min-h-screen bg-[#064E3B] fixed top-0 left-0 flex flex-col z-40">

        {{-- Logo --}}
        <div class="px-5 pt-7 pb-6 border-b border-white/10">
            <h1 class="text-white font-extrabold text-xl tracking-tight">BersihIn</h1>
            <p class="text-emerald-400 text-[10px] font-semibold mt-0.5 tracking-widest uppercase">Admin Panel</p>
        </div>

        {{-- Menu Utama --}}
        <nav class="flex-1 px-3 py-4 space-y-0.5">

            <a href="/bersihin/admin"
               class="sidebar-link {{ request()->is('bersihin/admin') ? 'active' : 'text-emerald-300' }}
                      flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Dashboard Admin
            </a>

            <a href="/bersihin/admin/verifikasi"
               class="sidebar-link {{ request()->is('bersihin/admin/verifikasi') ? 'active' : 'text-emerald-300' }}
                      flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                Verifikasi Pembayaran
            </a>

            <a href="/bersihin/admin/petugas"
               class="sidebar-link {{ request()->is('bersihin/admin/petugas') ? 'active' : 'text-emerald-300' }}
                      flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Petugas & Penjadwalan
            </a>

            <a href="/bersihin/admin/layanan"
               class="sidebar-link {{ request()->is('bersihin/admin/layanan') ? 'active' : 'text-emerald-300' }}
                      flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                Layanan & Promo
            </a>

            <a href="/bersihin/admin/laporan"
               class="sidebar-link {{ request()->is('bersihin/admin/laporan') ? 'active' : 'text-emerald-300' }}
                      flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Laporan Transaksi
            </a>

        </nav>

        {{-- Menu Bawah --}}
        <div class="px-3 pb-5 space-y-0.5 border-t border-white/10 pt-3">
            <a href="/bersihin/admin/pengaturan"
               class="sidebar-link text-emerald-300 flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Pengaturan
            </a>

            <button onclick="document.getElementById('modalLogout').classList.remove('hidden')"
               class="sidebar-link text-red-400 flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium hover:bg-red-900/20">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Logout
            </button>
        </div>
    </div>

    {{-- ===== MAIN AREA ===== --}}
    <div class="ml-[200px] flex-1 flex flex-col">

        {{-- Navbar Atas - Judul Dinamis Per Halaman --}}
        <header class="bg-white border-b border-gray-100 px-7 py-3 flex items-center justify-between sticky top-0 z-30">

            {{-- Kiri: Judul & Subtitle Halaman --}}
            <div>
                <h2 class="text-base font-bold text-gray-800">
                    @yield('page-title', 'Dashboard Admin')
                </h2>
                <p class="text-xs text-gray-400">
                    @yield('page-subtitle', 'Selamat datang kembali, Admin')
                </p>
            </div>

            {{-- Kanan: Notif + Waktu + Avatar Admin --}}
            <div class="flex items-center gap-4">

                {{-- Notifikasi --}}
                <button class="relative p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>

                {{-- Waktu --}}
                <button class="p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>

                {{-- Avatar Admin --}}
                <div class="flex items-center gap-2.5">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-800">Admin Utama</p>
                        <p class="text-xs text-gray-400">Super Admin</p>
                    </div>
                    <div class="w-9 h-9 bg-[#064E3B] rounded-full flex items-center justify-center text-white font-bold text-sm">A</div>
                </div>
            </div>
        </header>

        <main class="flex-1 p-7">
            @yield('content')
        </main>

        <p class="text-center text-xs text-gray-300 mt-6 pb-4">
            © 2024 BersihIn Professional Cleaning Services. Panel Admin v2.4.0
        </p>
    </div>
</div>

{{-- ===== MODAL LOGOUT ===== --}}
<div id="modalLogout"
    class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
    onclick="if(event.target===this) this.classList.add('hidden')">

    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm"></div>

    <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-sm p-8 text-center">

        <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mx-auto mb-5">
            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
        </div>

        <h2 class="text-xl font-bold text-gray-900 mb-2">Konfirmasi Keluar</h2>
        <p class="text-sm text-gray-500 leading-relaxed mb-8">
            Apakah Anda yakin ingin keluar dari sistem
            <span class="font-semibold text-gray-700">BersihIn</span>?
            Anda perlu login kembali untuk mengakses panel admin.
        </p>

        <div class="flex gap-3">
            <button onclick="document.getElementById('modalLogout').classList.add('hidden')"
                class="flex-1 py-3 border-2 border-gray-200 text-gray-600 font-semibold rounded-2xl hover:bg-gray-50 transition text-sm">
                Batal
            </button>
            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <button type="submit"
                    class="w-full py-3 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-2xl transition text-sm">
                    Ya, Keluar
                </button>
            </form>
        </div>

    </div>
</div>

</body>
</html>