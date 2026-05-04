<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BersihIn - Petugas</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; }
  .sidebar-link { transition: all 0.2s; }
  .sidebar-link:hover { background: rgba(255,255,255,0.08); }
  .sidebar-link.active { background: rgba(255,255,255,0.12); color: white; }
</style>
</head>
<body class="bg-gray-50 flex min-h-screen">

{{-- ===== SIDEBAR ===== --}}
<aside class="w-56 min-h-screen bg-[#064E3B] fixed left-0 top-0 flex flex-col z-50">

  {{-- Logo --}}
  <div class="px-6 pt-7 pb-5 border-b border-white/10">
    <h1 class="text-white font-extrabold text-xl tracking-tight">BersihIn</h1>
    <span class="text-green-400 text-[10px] font-bold tracking-widest uppercase">Petugas</span>
  </div>

  {{-- Profile Singkat --}}
  <div class="px-5 py-4 border-b border-white/10">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-full bg-green-400 flex items-center justify-center text-[#064E3B] font-bold text-sm flex-shrink-0">
        L
      </div>
      <div>
        <p class="text-white text-sm font-semibold leading-none">Larasati</p>
        <p class="text-green-400 text-xs mt-0.5">ID: #STF-102</p>
      </div>
    </div>
  </div>

  {{-- Nav Menu --}}
  <nav class="flex-1 px-3 py-4 space-y-1">

    <a href="/bersihin/petugas/dashboard"
       class="sidebar-link {{ request()->is('bersihin/petugas/dashboard') ? 'active' : '' }}
              flex items-center gap-3 px-4 py-2.5 rounded-xl text-green-100 text-sm font-medium">
      <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
      </svg>
      Dashboard
    </a>

    <a href="/bersihin/petugas/jadwal"
       class="sidebar-link {{ request()->is('bersihin/petugas/jadwal') ? 'active' : '' }}
              flex items-center gap-3 px-4 py-2.5 rounded-xl text-green-100 text-sm font-medium">
      <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
      </svg>
      Jadwal Petugas
    </a>

    <a href="/bersihin/petugas/performance"
       class="sidebar-link {{ request()->is('bersihin/petugas/performance') ? 'active' : '' }}
              flex items-center gap-3 px-4 py-2.5 rounded-xl text-green-100 text-sm font-medium">
      <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
      </svg>
      Performance
    </a>

  </nav>

  {{-- Bottom Menu --}}
  <div class="px-3 py-4 border-t border-white/10 space-y-1">

    <a href="/bersihin/petugas/pengaturan"
       class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-xl text-green-100 text-sm font-medium">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
        <circle cx="12" cy="12" r="3" stroke-width="2"/>
      </svg>
      Pengaturan
    </a>

    <button onclick="document.getElementById('modalLogoutPetugas').classList.remove('hidden')"
       class="sidebar-link w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-red-300 hover:text-red-200 text-sm font-medium">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
      </svg>
      Logout
    </button>

  </div>

</aside>

{{-- ===== MAIN CONTENT ===== --}}
<div class="ml-56 flex-1 flex flex-col">

  {{-- TOPBAR --}}
  <header class="bg-white border-b border-gray-100 px-8 py-3 flex items-center justify-between sticky top-0 z-40">

    {{-- Kiri: Judul Halaman (berubah tiap halaman) --}}
    <div>
      <h2 class="text-sm font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
      <p class="text-xs text-gray-400">@yield('page-subtitle', 'Selamat datang kembali')</p>
    </div>

    {{-- Kanan: Toggle Status + Notif + Avatar --}}
    <div class="flex items-center gap-4">

      {{-- Toggle Status Kerja --}}
      <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-full px-4 py-2">
        <span class="text-xs text-gray-500 font-medium">Status Kerja</span>
        <button onclick="toggleStatus(this)"
          class="relative w-10 h-5 bg-[#064E3B] rounded-full transition-colors flex items-center px-0.5">
          <span class="w-4 h-4 bg-white rounded-full shadow translate-x-5 transition-transform block"></span>
        </button>
        <span id="statusLabel" class="text-xs font-bold text-[#064E3B]">Aktif</span>
      </div>

      {{-- Notifikasi --}}
      <div class="relative">
        <button
          onclick="toggleNotif()"
          class="relative w-9 h-9 bg-gray-50 border border-gray-100 rounded-full flex items-center justify-center hover:bg-gray-100">
          <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
          </svg>
          <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
        </button>

        {{-- Dropdown Notifikasi --}}
        <div id="notifDropdown"
             class="hidden absolute right-0 top-11 w-80 bg-white rounded-2xl shadow-xl border border-gray-100 z-50 overflow-hidden">

          {{-- Header Notif --}}
          <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
            <h3 class="text-sm font-bold text-gray-800">Notifikasi</h3>
            <span class="text-xs font-bold text-red-500 bg-red-50 px-2 py-0.5 rounded-full">3 Baru</span>
          </div>

          {{-- List Notifikasi --}}
          <div class="divide-y divide-gray-50 max-h-72 overflow-y-auto">

            {{-- Notif 1 - belum dibaca --}}
            <div class="flex gap-3 px-4 py-3 bg-emerald-50/40 hover:bg-emerald-50 cursor-pointer">
              <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-800">Tugas Baru Ditugaskan</p>
                <p class="text-xs text-gray-400 mt-0.5">Deep Cleaning – Jl. Melati No. 45, pukul 13:00</p>
                <p class="text-[10px] text-emerald-600 font-semibold mt-1">5 menit lalu</p>
              </div>
              <div class="w-2 h-2 bg-emerald-500 rounded-full flex-shrink-0 mt-2"></div>
            </div>

            {{-- Notif 2 - belum dibaca --}}
            <div class="flex gap-3 px-4 py-3 bg-emerald-50/40 hover:bg-emerald-50 cursor-pointer">
              <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-800">Pesan dari Admin</p>
                <p class="text-xs text-gray-400 mt-0.5">Harap konfirmasi kehadiran untuk tugas siang ini.</p>
                <p class="text-[10px] text-emerald-600 font-semibold mt-1">20 menit lalu</p>
              </div>
              <div class="w-2 h-2 bg-emerald-500 rounded-full flex-shrink-0 mt-2"></div>
            </div>

            {{-- Notif 3 - belum dibaca --}}
            <div class="flex gap-3 px-4 py-3 bg-emerald-50/40 hover:bg-emerald-50 cursor-pointer">
              <div class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-800">Ulasan Bintang 5!</p>
                <p class="text-xs text-gray-400 mt-0.5">Ibu Sari memberikan rating sempurna untuk tugasmu.</p>
                <p class="text-[10px] text-emerald-600 font-semibold mt-1">1 jam lalu</p>
              </div>
              <div class="w-2 h-2 bg-emerald-500 rounded-full flex-shrink-0 mt-2"></div>
            </div>

            {{-- Notif 4 - sudah dibaca --}}
            <div class="flex gap-3 px-4 py-3 hover:bg-gray-50 cursor-pointer">
              <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-500">Tugas Selesai Dikonfirmasi</p>
                <p class="text-xs text-gray-400 mt-0.5">General Cleaning Ibu Dewi telah diverifikasi admin.</p>
                <p class="text-[10px] text-gray-400 font-semibold mt-1">Kemarin, 16:30</p>
              </div>
            </div>

          </div>

          {{-- Footer Notif --}}
          <div class="px-4 py-3 border-t border-gray-100 text-center">
            <button class="text-xs font-semibold text-[#064E3B] hover:underline">
              Tandai semua sudah dibaca
            </button>
          </div>

        </div>
      </div>

      {{-- Avatar --}}
      <div class="flex items-center gap-2.5">
        <div class="w-9 h-9 rounded-full bg-[#064E3B] flex items-center justify-center text-green-300 font-bold text-sm">L</div>
        <div class="hidden sm:block">
          <p class="text-sm font-bold text-gray-800 leading-none">Larasati</p>
          <p class="text-xs text-gray-400">Petugas Lapangan</p>
        </div>
      </div>

    </div>
  </header>

  {{-- PAGE CONTENT --}}
  <main class="flex-1 p-8">
    @yield('content')
  </main>

</div>

{{-- ===== MODAL LOGOUT ===== --}}
<div id="modalLogoutPetugas"
     class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50"
     onclick="if(event.target===this)this.classList.add('hidden')">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4 p-6" onclick="event.stopPropagation()">
    <div class="w-12 h-12 bg-red-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
      <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
      </svg>
    </div>
    <h3 class="font-bold text-gray-900 text-center mb-2">Keluar dari Akun?</h3>
    <p class="text-gray-400 text-sm text-center mb-6">Pastikan semua tugas hari ini sudah diperbarui sebelum keluar.</p>
    <div class="flex gap-3">
      <button onclick="document.getElementById('modalLogoutPetugas').classList.add('hidden')"
        class="flex-1 border border-gray-200 text-gray-600 text-sm font-semibold py-2.5 rounded-xl hover:bg-gray-50">
        Batal
      </button>
      <a href="/bersihin/login"
        class="flex-1 bg-red-500 text-white text-sm font-semibold py-2.5 rounded-xl hover:bg-red-600 text-center">
        Ya, Keluar
      </a>
    </div>
  </div>
</div>

{{-- ===== JAVASCRIPT ===== --}}
<script>
// Toggle status kerja aktif/tidak aktif
function toggleStatus(btn) {
  const dot = btn.querySelector('span');
  const label = document.getElementById('statusLabel');
  const isActive = dot.classList.contains('translate-x-5');
  if (isActive) {
    dot.classList.remove('translate-x-5');
    dot.classList.add('translate-x-0');
    btn.classList.remove('bg-[#064E3B]');
    btn.classList.add('bg-gray-300');
    label.textContent = 'Tidak Aktif';
    label.classList.remove('text-[#064E3B]');
    label.classList.add('text-gray-400');
  } else {
    dot.classList.add('translate-x-5');
    dot.classList.remove('translate-x-0');
    btn.classList.add('bg-[#064E3B]');
    btn.classList.remove('bg-gray-300');
    label.textContent = 'Aktif';
    label.classList.add('text-[#064E3B]');
    label.classList.remove('text-gray-400');
  }
}

// Toggle dropdown notifikasi
function toggleNotif() {
  const dropdown = document.getElementById('notifDropdown');
  dropdown.classList.toggle('hidden');
}

// Tutup notif kalau klik di luar
document.addEventListener('click', function(e) {
  const dropdown = document.getElementById('notifDropdown');
  const btn = e.target.closest('button[onclick="toggleNotif()"]');
  if (!btn && !dropdown.contains(e.target)) {
    dropdown.classList.add('hidden');
  }
});
</script>

</body>
</html>