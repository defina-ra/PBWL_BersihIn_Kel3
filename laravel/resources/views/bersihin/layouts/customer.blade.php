<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BersihIn - @yield('page-title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Sora:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Sora', sans-serif; }

        :root {
            --green-dark: #0d3d2b;
            --green-mid: #145c3e;
            --green-accent: #1a7a52;
            --green-light: #22c55e;
            --green-pale: #dcfce7;
            --cream: #f8faf9;
        }

        /* Sidebar */
        .sidebar {
            background: linear-gradient(180deg, #0a2e1f 0%, #0d3d2b 50%, #0f4a34 100%);
            position: fixed; top: 0; left: 0;
            width: 220px; height: 100vh;
            display: flex; flex-direction: column;
            z-index: 50;
            box-shadow: 4px 0 24px rgba(0,0,0,0.25);
        }

        .sidebar-logo {
            padding: 28px 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar-logo h1 {
            font-family: 'Sora', sans-serif;
            font-size: 22px; font-weight: 700;
            color: white; letter-spacing: -0.5px;
        }

        .sidebar-logo span {
            font-size: 10px; font-weight: 500;
            color: #4ade80; letter-spacing: 2.5px;
            text-transform: uppercase;
        }

        .sidebar-nav { padding: 16px 12px; flex: 1; }

        .nav-section-label {
            font-size: 9px; font-weight: 700;
            color: rgba(255,255,255,0.3);
            letter-spacing: 2px; text-transform: uppercase;
            padding: 12px 12px 6px;
        }

        .nav-item {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 12px; border-radius: 10px;
            color: rgba(255,255,255,0.55);
            font-size: 13.5px; font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }

        .nav-item:hover {
            background: rgba(255,255,255,0.08);
            color: white;
        }

        .nav-item.active {
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: white;
            box-shadow: 0 4px 12px rgba(22,163,74,0.35);
        }

        .nav-item svg { width: 18px; height: 18px; flex-shrink: 0; }

        .sidebar-bottom {
            padding: 12px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        /* Topbar */
        .topbar {
            position: fixed; top: 0; left: 220px;
            right: 0; height: 68px;
            background: rgba(248,250,249,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0,0,0,0.06);
            display: flex; align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            z-index: 40;
        }

        .topbar-title {
            font-family: 'Sora', sans-serif;
            font-size: 18px; font-weight: 700;
            color: #0d3d2b;
        }

        .topbar-subtitle {
            font-size: 12px; color: #6b7280; margin-top: 1px;
        }

        .main-content {
            margin-left: 220px;
            margin-top: 68px;
            padding: 32px;
            background: var(--cream);
            min-height: calc(100vh - 68px);
        }

        /* Notif dropdown */
        .notif-btn { position: relative; cursor: pointer; }
        .notif-badge {
            position: absolute; top: -4px; right: -4px;
            width: 18px; height: 18px;
            background: #ef4444; border-radius: 50%;
            font-size: 10px; font-weight: 700; color: white;
            display: flex; align-items: center; justify-content: center;
            border: 2px solid var(--cream);
        }

        .notif-dropdown {
            position: absolute; top: 48px; right: 0;
            width: 320px;
            background: white; border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            border: 1px solid rgba(0,0,0,0.06);
            display: none; z-index: 100;
        }

        .notif-dropdown.show { display: block; }

        .notif-item { padding: 14px 16px; border-bottom: 1px solid #f3f4f6; }
        .notif-item:last-child { border-bottom: none; }
        .notif-item.unread { background: #f0fdf4; }

        /* Pesan button */
        .btn-pesan {
            background: linear-gradient(135deg, #16a34a, #0d9044);
            color: white; font-weight: 700;
            padding: 10px 20px; border-radius: 10px;
            font-size: 13px; cursor: pointer;
            border: none; display: flex; align-items: center; gap: 8px;
            box-shadow: 0 4px 14px rgba(22,163,74,0.35);
            transition: all 0.2s;
        }
        .btn-pesan:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(22,163,74,0.45); }

        /* User avatar */
        .user-avatar {
            width: 38px; height: 38px; border-radius: 50%;
            object-fit: cover;
            border: 2px solid #16a34a;
        }

        /* Animasi masuk */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.4s ease forwards; }
        .fade-up-1 { animation-delay: 0.05s; opacity: 0; }
        .fade-up-2 { animation-delay: 0.1s; opacity: 0; }
        .fade-up-3 { animation-delay: 0.15s; opacity: 0; }
        .fade-up-4 { animation-delay: 0.2s; opacity: 0; }
    </style>
</head>
<body class="bg-gray-50">

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <h1>BersihIn</h1>
        <span>Pengguna</span>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section-label">Menu Utama</div>

        <a href="/bersihin/customer/dashboard" class="nav-item {{ request()->is('bersihin/customer/dashboard') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Dashboard
        </a>

        <a href="/bersihin/customer/pesanan" class="nav-item {{ request()->is('bersihin/customer/pesanan') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            Pesanan Saya
        </a>

        <a href="/bersihin/customer/promo" class="nav-item {{ request()->is('bersihin/customer/promo') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            Promo
        </a>

        <a href="/bersihin/customer/riwayat-pesanan" class="nav-item {{ request()->is('bersihin/customer/riwayat') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Riwayat Pesanan
        </a>
    </nav>

    <div class="sidebar-bottom">
        <a href="/bersihin/customer/pengaturan" class="nav-item {{ request()->is('bersihin/customer/pengaturan') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            Pengaturan
        </a>

        <button onclick="document.getElementById('modal-logout').classList.remove('hidden')" class="nav-item w-full text-left" style="color: #fca5a5;">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            Keluar
        </button>
    </div>
</aside>

<!-- TOPBAR -->
<header class="topbar">
    <div>
        <div class="topbar-title font-display">@yield('page-title', 'Dashboard')</div>
        <div class="topbar-subtitle">@yield('page-subtitle', 'Selamat datang kembali!')</div>
    </div>

    <div class="flex items-center gap-4">

        <!-- Notifikasi -->
        <div class="notif-btn relative" onclick="toggleNotif()">
            <div class="w-10 h-10 bg-white rounded-xl border border-gray-200 flex items-center justify-center shadow-sm cursor-pointer hover:bg-gray-50 transition">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#374151" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                <span class="notif-badge">3</span>
            </div>

            <div class="notif-dropdown" id="notifDropdown">
                <div class="px-4 py-3 border-b border-gray-100 flex justify-between items-center">
                    <span class="font-semibold text-gray-800 text-sm">Notifikasi</span>
                    <button class="text-xs text-green-600 font-medium hover:underline" onclick="markAllRead()">Tandai semua dibaca</button>
                </div>
                <div class="notif-item unread">
                    <div class="flex gap-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#16a34a" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-800">Petugas sedang menuju lokasi</p>
                            <p class="text-xs text-gray-500 mt-0.5">Larasati akan tiba dalam 8 menit</p>
                            <p class="text-xs text-green-600 mt-1">2 menit lalu</p>
                        </div>
                    </div>
                </div>
                <div class="notif-item unread">
                    <div class="flex gap-3">
                        <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-800">Promo baru tersedia!</p>
                            <p class="text-xs text-gray-500 mt-0.5">Diskon 30% untuk Ramadan Deep Clean</p>
                            <p class="text-xs text-green-600 mt-1">1 jam lalu</p>
                        </div>
                    </div>
                </div>
                <div class="notif-item unread">
                    <div class="flex gap-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#2563eb" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-800">Pesanan dikonfirmasi</p>
                            <p class="text-xs text-gray-500 mt-0.5">Pesanan #BSH-99281 telah dikonfirmasi</p>
                            <p class="text-xs text-green-600 mt-1">3 jam lalu</p>
                        </div>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="flex gap-3">
                        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#6b7280" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-800">Beri ulasan layanan</p>
                            <p class="text-xs text-gray-500 mt-0.5">Pesanan #BSH-99100 selesai, beri bintang!</p>
                            <p class="text-xs text-gray-400 mt-1">Kemarin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Info -->
        <div class="flex items-center gap-3 cursor-pointer">
            <div class="text-right hidden sm:block">
                <p class="text-sm font-semibold text-gray-800">Defina Rahma</p>
                <p class="text-xs text-green-600 font-medium">Premium Member</p>
            </div>
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=80&h=80&fit=crop&crop=face" class="user-avatar" alt="Avatar">
        </div>
    </div>
</header>

<!-- MAIN CONTENT -->
<main class="main-content">
    @yield('content')
</main>

<!-- MODAL LOGOUT -->
<div id="modal-logout" class="hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="document.getElementById('modal-logout').classList.add('hidden')"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl p-8 max-w-sm w-full mx-4 text-center">
        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="#ef4444" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
        </div>
        <h3 class="text-lg font-bold text-gray-900 mb-2">Keluar dari BersihIn?</h3>
        <p class="text-sm text-gray-500 mb-6">Kamu akan keluar dari sesi ini. Sampai jumpa lagi!</p>
        <div class="flex gap-3">
            <button onclick="document.getElementById('modal-logout').classList.add('hidden')" class="flex-1 py-2.5 rounded-xl border border-gray-200 text-gray-700 font-semibold text-sm hover:bg-gray-50 transition">Batal</button>
            <form method="POST" action="/logout" class="flex-1">
                @csrf
                <button type="submit" class="w-full py-2.5 rounded-xl bg-red-500 text-white font-semibold text-sm hover:bg-red-600 transition">Ya, Keluar</button>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleNotif() {
        document.getElementById('notifDropdown').classList.toggle('show');
    }
    function markAllRead() {
        document.querySelectorAll('.notif-item.unread').forEach(el => el.classList.remove('unread'));
        document.querySelector('.notif-badge').style.display = 'none';
    }
    document.addEventListener('click', function(e) {
        const notifBtn = document.querySelector('.notif-btn');
        if (!notifBtn.contains(e.target)) {
            document.getElementById('notifDropdown').classList.remove('show');
        }
    });
</script>
</body>
</html>