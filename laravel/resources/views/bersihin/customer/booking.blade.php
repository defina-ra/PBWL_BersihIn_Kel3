<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Booking - BersihIn</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; }
  input, select, textarea { font-family: 'Plus Jakarta Sans', sans-serif; }
  input:focus, select:focus, textarea:focus { outline: none; border-color: #16a34a; }
</style>
</head>
<body class="bg-gray-50">

{{-- NAVBAR --}}
<nav class="flex items-center justify-between px-16 py-4 bg-white border-b border-gray-100 sticky top-0 z-50">
  <a href="/bersihin" class="text-green-600 font-bold text-2xl">BersihIn</a>
  <div class="flex gap-8 text-sm font-medium text-gray-600">
    <a href="/bersihin/layanan" class="hover:text-green-600">Layanan</a>
    <a href="#" class="hover:text-green-600">Cara Kerja</a>
    <a href="#" class="hover:text-green-600">Harga</a>
    <a href="#" class="hover:text-green-600">Ulasan</a>
  </div>
  <div class="flex items-center gap-4">
    <a href="/bersihin/login" class="text-sm text-gray-600 font-medium hover:text-green-600">Login</a>
    <a href="/bersihin/register" class="bg-green-600 text-white text-sm font-semibold px-5 py-2 rounded-full hover:bg-green-700">Get Started</a>
  </div>
</nav>

{{-- BREADCRUMB --}}
<div class="px-16 py-4 bg-gray-50">
  <p class="text-sm text-gray-400">
    <a href="/bersihin" class="hover:text-green-600">Beranda</a>
    <span class="mx-2">›</span>
    <a href="/bersihin/layanan" class="hover:text-green-600">Layanan</a>
    <span class="mx-2">›</span>
    <span class="text-gray-800 font-semibold">Booking</span>
  </p>
</div>

{{-- PROGRESS STEPS --}}
<div class="px-16 py-6 bg-gray-50">
  <div class="flex items-center justify-center gap-6 max-w-xl mx-auto">
    {{-- Step 1 --}}
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 bg-green-600 rounded-full flex items-center justify-center">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
        </svg>
      </div>
      <span class="text-sm font-semibold text-gray-700">Pilih Layanan</span>
    </div>
    <div class="flex-1 h-0.5 bg-green-600"></div>
    {{-- Step 2 --}}
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 bg-green-600 rounded-full flex items-center justify-center">
        <span class="text-white text-sm font-bold">2</span>
      </div>
      <span class="text-sm font-semibold text-gray-800">Isi Data Pemesanan</span>
    </div>
    <div class="flex-1 h-0.5 bg-gray-200"></div>
    {{-- Step 3 --}}
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 bg-gray-200 rounded-full flex items-center justify-center">
        <span class="text-gray-500 text-sm font-bold">3</span>
      </div>
      <span class="text-sm text-gray-400">Pembayaran</span>
    </div>
  </div>
</div>

{{-- MAIN CONTENT --}}
<section class="px-16 py-8 bg-gray-50">
  <div class="flex gap-8 max-w-5xl mx-auto">

    {{-- LEFT: FORM --}}
    <div class="flex-1 bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
      <h2 class="text-2xl font-extrabold text-gray-900 mb-6">Isi Detail Pemesanan</h2>

      {{-- Nama & Telepon --}}
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
          <input 
            type="text" 
            placeholder="Masukkan nama Anda"
            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700 focus:border-green-500"
          >
        </div>
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
          <div class="relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
              </svg>
            </div>
            <input 
              type="tel" 
              placeholder="0812xxxx"
              class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm text-gray-700 focus:border-green-500"
            >
          </div>
        </div>
      </div>

      {{-- Alamat --}}
      <div class="mb-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap</label>
        <textarea 
          rows="3"
          placeholder="Jl. Anggrek No. 12, Sukarame, Bandar Lampung"
          class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700 resize-none focus:border-green-500"
        ></textarea>
      </div>

      {{-- Tanggal & Jam --}}
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Layanan</label>
          <div class="relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
            </div>
            <input 
              type="date"
              class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm text-gray-500 focus:border-green-500"
            >
          </div>
        </div>
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Jam Layanan</label>
          <div class="relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke-width="2"/>
                <path stroke-width="2" d="M12 6v6l4 2"/>
              </svg>
            </div>
            <select class="w-full border border-gray-200 rounded-xl pl-10 pr-8 py-3 text-sm text-gray-700 focus:border-green-500 appearance-none bg-white">
              <option>08.00</option>
              <option>10.00</option>
              <option>13.00</option>
              <option>15.00</option>
              <option>17.00</option>
            </select>
            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </div>
          </div>
        </div>
      </div>

      {{-- Catatan Tambahan --}}
      <div class="mb-8">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan Tambahan <span class="text-gray-400 font-normal">(Opsional)</span></label>
        <textarea 
          rows="3"
          placeholder="Contoh: Ada anjing di rumah, tolong bersihkan area balkon lebih detail"
          class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-500 resize-none focus:border-green-500"
        ></textarea>
      </div>

      {{-- Tombol --}}
      <a href="/bersihin/pembayaran" class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-2xl text-base transition mb-3">
        Lanjut ke Pembayaran
      </a>
      <a href="/bersihin/layanan" class="block text-center text-gray-500 text-sm hover:text-gray-700 mb-4">
        ← Kembali
      </a>
      <p class="text-center text-gray-400 text-xs">Pembatalan gratis maksimal 2 jam sebelum jadwal</p>
    </div>

    {{-- RIGHT: ORDER SUMMARY --}}
    <div class="w-80 flex-shrink-0">
      <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
        {{-- Gambar --}}
        <div class="h-48 bg-gray-200 overflow-hidden">
          <img 
            src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=600&q=80" 
            alt="Deep Cleaning"
            class="w-full h-full object-cover"
            onerror="this.style.display='none'"
          >
        </div>
        {{-- Detail --}}
        <div class="p-5">
          <h3 class="font-bold text-gray-900 text-lg mb-2">Ringkasan Pesanan</h3>
          <p class="font-bold text-gray-900 mb-1">Deep Cleaning</p>
          <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-0.5 rounded-full">± 4 Jam</span>

          <div class="mt-4 space-y-2 border-t border-gray-100 pt-4">
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Tanggal</span>
              <span class="text-gray-700 font-medium">-</span>
            </div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Jam</span>
              <span class="text-gray-700 font-medium">-</span>
            </div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Alamat</span>
              <span class="text-gray-700 font-medium">-</span>
            </div>
          </div>

          <div class="border-t border-gray-100 mt-4 pt-4 flex justify-between items-center">
            <span class="text-sm font-semibold text-gray-700">Harga Total</span>
            <span class="text-green-600 font-extrabold text-lg">Rp 250.000</span>
          </div>

          {{-- Jaminan --}}
          <div class="mt-4 bg-green-50 rounded-xl p-3 flex gap-2 items-start">
            <svg class="w-4 h-4 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            <p class="text-xs text-green-700 leading-relaxed">Jaminan kepuasan: Cleaner akan mengulang area yang kurang bersih secara gratis.</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

{{-- FOOTER --}}
<footer class="px-16 py-8 bg-white border-t border-gray-100 mt-8">
  <div class="flex justify-between items-center">
    <h3 class="text-green-600 font-bold text-lg">BersihIn</h3>
    <div class="flex gap-6 text-gray-400 text-sm">
      <a href="#" class="hover:text-green-600">About Us</a>
      <a href="#" class="hover:text-green-600">Privacy Policy</a>
      <a href="#" class="hover:text-green-600">Terms of Service</a>
      <a href="#" class="hover:text-green-600">Contact</a>
    </div>
    <p class="text-gray-400 text-xs">© 2024 BersihIn. Creating Luminous Spaces.</p>
  </div>
</footer>

</body>
</html>