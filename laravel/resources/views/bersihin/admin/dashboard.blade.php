<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel - BersihIn</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; }
</style>
</head>
<body class="bg-gray-50">

<div class="flex min-h-screen">

  {{-- SIDEBAR --}}
  <div class="w-52 min-h-screen bg-green-900 flex flex-col fixed left-0 top-0">
    {{-- Logo --}}
    <div class="px-6 pt-8 pb-6">
      <h1 class="text-white font-bold text-xl">BersihIn</h1>
      <p class="text-green-400 text-xs font-semibold tracking-widest mt-0.5">ADMIN PANEL</p>
    </div>

    {{-- Nav Menu --}}
    <nav class="flex-1 px-3">
      <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-green-300 hover:bg-green-800 text-sm font-medium mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1" stroke-width="2"/><rect x="14" y="3" width="7" height="7" rx="1" stroke-width="2"/><rect x="3" y="14" width="7" height="7" rx="1" stroke-width="2"/><rect x="14" y="14" width="7" height="7" rx="1" stroke-width="2"/></svg>
        Dashboard
      </a>

      <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-green-700 text-white text-sm font-semibold mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        Verifikasi Pembayaran
      </a>

      <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-green-300 hover:bg-green-800 text-sm font-medium mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        Pesanan Masuk
        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">4</span>
      </a>

      <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-green-300 hover:bg-green-800 text-sm font-medium mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        Kelola Petugas
      </a>

      <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-green-300 hover:bg-green-800 text-sm font-medium mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        Laporan
      </a>
    </nav>
  </div>

  {{-- MAIN CONTENT --}}
  <div class="ml-52 flex-1 flex flex-col">

    {{-- TOP BAR --}}
    <div class="flex items-center justify-between px-8 py-4 bg-white border-b border-gray-100">
      <div class="flex items-center gap-2 text-green-600">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
      </div>
      <span class="text-sm font-medium text-gray-600">Admin BersihIn</span>
    </div>

    {{-- CONTENT --}}
    <div class="p-8">

      {{-- Page Title --}}
      <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Verifikasi Pembayaran</h1>

      {{-- STATS CARDS --}}
      <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white border border-gray-100 rounded-2xl px-6 py-5 shadow-sm">
          <p class="text-gray-400 text-sm mb-1">Menunggu Verifikasi</p>
          <p class="text-3xl font-extrabold text-gray-900">6</p>
        </div>
        <div class="bg-white border border-gray-100 rounded-2xl px-6 py-5 shadow-sm">
          <p class="text-gray-400 text-sm mb-1">Pembayaran Lunas</p>
          <p class="text-3xl font-extrabold text-gray-900">18</p>
        </div>
        <div class="bg-white border border-gray-100 rounded-2xl px-6 py-5 shadow-sm">
          <p class="text-gray-400 text-sm mb-1">Ditolak</p>
          <p class="text-3xl font-extrabold text-gray-900">2</p>
        </div>
      </div>

      {{-- FILTER BAR --}}
      <div class="flex items-center gap-3 mb-6">
        <input 
          type="text" 
          placeholder="Cari nama customer..."
          class="border border-gray-200 rounded-lg px-4 py-2 text-sm text-gray-600 focus:outline-none focus:border-green-500 w-64"
        >
        <button class="bg-gray-800 text-white text-sm font-semibold px-5 py-2 rounded-lg hover:bg-gray-700">
          Semua Status
        </button>
      </div>

      {{-- TABLE --}}
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full">
          <thead>
            <tr class="border-b border-gray-100">
              <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wide">ID</th>
              <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wide">Customer</th>
              <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wide">Layanan</th>
              <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wide">Total</th>
              <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wide">Bukti</th>
              <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wide">Status</th>
              <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wide">Aksi</th>
            </tr>
          </thead>
          <tbody>

            {{-- Row 1 --}}
            <tr class="border-b border-gray-50 hover:bg-gray-50">
              <td class="px-6 py-4 text-sm text-gray-700">#BRS001</td>
              <td class="px-6 py-4 text-sm text-gray-700">Siti Rahma</td>
              <td class="px-6 py-4 text-sm text-gray-700">Deep Cleaning</td>
              <td class="px-6 py-4 text-sm text-gray-700">Rp 250.000</td>
              <td class="px-6 py-4">
                <button class="border border-gray-300 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-lg hover:bg-gray-50">
                  Lihat
                </button>
              </td>
              <td class="px-6 py-4">
                <span class="bg-amber-100 text-amber-600 text-xs font-semibold px-3 py-1.5 rounded-full">Menunggu</span>
              </td>
              <td class="px-6 py-4">
                <div class="flex gap-2">
                  <button class="bg-green-600 hover:bg-green-700 text-white text-xs font-semibold px-4 py-1.5 rounded-full transition">Terima</button>
                  <button class="bg-red-500 hover:bg-red-600 text-white text-xs font-semibold px-4 py-1.5 rounded-full transition">Tolak</button>
                </div>
              </td>
            </tr>

            {{-- Row 2 --}}
            <tr class="border-b border-gray-50 hover:bg-gray-50">
              <td class="px-6 py-4 text-sm text-gray-700">#BRS002</td>
              <td class="px-6 py-4 text-sm text-gray-700">Ahmad Fauzi</td>
              <td class="px-6 py-4 text-sm text-gray-700">Bersih Rutin</td>
              <td class="px-6 py-4 text-sm text-gray-700">Rp 150.000</td>
              <td class="px-6 py-4">
                <button class="border border-gray-300 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-lg hover:bg-gray-50">
                  Lihat
                </button>
              </td>
              <td class="px-6 py-4">
                <span class="bg-amber-100 text-amber-600 text-xs font-semibold px-3 py-1.5 rounded-full">Menunggu</span>
              </td>
              <td class="px-6 py-4">
                <div class="flex gap-2">
                  <button class="bg-green-600 hover:bg-green-700 text-white text-xs font-semibold px-4 py-1.5 rounded-full transition">Terima</button>
                  <button class="bg-red-500 hover:bg-red-600 text-white text-xs font-semibold px-4 py-1.5 rounded-full transition">Tolak</button>
                </div>
              </td>
            </tr>

            {{-- Row 3 --}}
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 text-sm text-gray-700">#BRS003</td>
              <td class="px-6 py-4 text-sm text-gray-700">Rina Dewi</td>
              <td class="px-6 py-4 text-sm text-gray-700">Cuci Kasur</td>
              <td class="px-6 py-4 text-sm text-gray-700">Rp 200.000</td>
              <td class="px-6 py-4">
                <button class="border border-gray-300 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-lg hover:bg-gray-50">
                  Lihat
                </button>
              </td>
              <td class="px-6 py-4">
                <span class="bg-green-100 text-green-600 text-xs font-semibold px-3 py-1.5 rounded-full">Lunas</span>
              </td>
              <td class="px-6 py-4">
                <span class="text-gray-300 text-sm">—</span>
              </td>
            </tr>

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

</body>
</html>