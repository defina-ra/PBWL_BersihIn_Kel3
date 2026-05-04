<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pembayaran - BersihIn</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; }
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
    <a href="/bersihin/booking" class="hover:text-green-600">Booking</a>
    <span class="mx-2">›</span>
    <span class="text-gray-800 font-bold">Pembayaran</span>
  </p>
</div>

{{-- PROGRESS STEPS --}}
<div class="px-16 py-6 bg-gray-50">
  <div class="flex items-center justify-center max-w-xl mx-auto">
    {{-- Step 1 --}}
    <div class="flex flex-col items-center gap-2">
      <div class="w-9 h-9 bg-green-600 rounded-full flex items-center justify-center">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
        </svg>
      </div>
      <span class="text-xs text-gray-500">Pilih Layanan</span>
    </div>
    <div class="flex-1 h-0.5 bg-green-600 mb-5"></div>
    {{-- Step 2 --}}
    <div class="flex flex-col items-center gap-2">
      <div class="w-9 h-9 bg-green-600 rounded-full flex items-center justify-center">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
        </svg>
      </div>
      <span class="text-xs text-gray-500">Isi Data</span>
    </div>
    <div class="flex-1 h-0.5 bg-green-600 mb-5"></div>
    {{-- Step 3 --}}
    <div class="flex flex-col items-center gap-2">
      <div class="w-9 h-9 bg-green-600 rounded-full flex items-center justify-center ring-4 ring-green-200">
        <div class="w-3 h-3 bg-white rounded-full"></div>
      </div>
      <span class="text-xs text-green-600 font-bold">Pembayaran</span>
    </div>
  </div>
</div>

{{-- PAGE TITLE --}}
<div class="px-16 pb-6">
  <h1 class="text-3xl font-extrabold text-gray-900">Konfirmasi & Pembayaran</h1>
</div>

{{-- MAIN CONTENT --}}
<section class="px-16 pb-16">
  <div class="flex gap-8 max-w-5xl">

    {{-- LEFT: PAYMENT --}}
    <div class="flex-1">

      {{-- Metode Pembayaran --}}
      <div class="bg-white rounded-2xl border-2 border-green-500 p-5 mb-4 flex items-center justify-between">
        <div>
          <p class="font-bold text-gray-800 text-sm">Transfer Bank</p>
          <p class="text-gray-400 text-xs mt-0.5">Lakukan pembayaran manual</p>
        </div>
        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
        </svg>
      </div>

      {{-- Transfer Detail --}}
      <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm">

        <h3 class="font-bold text-gray-800 mb-4">Transfer ke Rekening</h3>

        {{-- Rekening Box --}}
        <div class="bg-green-50 rounded-xl p-4 mb-4">
          <p class="font-bold text-gray-800 text-sm">BCA</p>
          <p class="text-gray-700 text-sm mt-1">1234-5678-9012</p>
          <p class="text-gray-500 text-sm">a.n BersihIn Indonesia</p>
        </div>

        {{-- Tombol Salin --}}
        <button 
          onclick="navigator.clipboard.writeText('1234567890 12');this.innerText='Tersalin!';setTimeout(()=>this.innerText='Salin Nomor Rekening',2000)"
          class="border border-green-500 text-green-600 text-sm font-semibold px-4 py-2 rounded-full hover:bg-green-50 transition mb-6"
        >
          Salin Nomor Rekening
        </button>

        {{-- Upload Bukti --}}
        <h3 class="font-bold text-gray-800 mb-3">Upload Bukti</h3>
        <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 mb-4">
          <input type="file" class="w-full text-sm text-gray-500">
        </div>

        {{-- Catatan --}}
        <textarea
          rows="2"
          placeholder="Catatan (opsional)"
          class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-500 resize-none focus:outline-none focus:border-green-500 mb-4"
        ></textarea>

        {{-- Tombol Kirim --}}
        <button class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-xl text-base transition mb-3">
          Kirim Bukti
        </button>

        {{-- Status --}}
        <p class="text-amber-500 text-sm font-medium">Status: Menunggu upload</p>

      </div>
    </div>

    {{-- RIGHT: ORDER SUMMARY --}}
    <div class="w-80 flex-shrink-0">
      <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
        {{-- Gambar --}}
       <div class="h-48 bg-gray-200 overflow-hidden">
  <img 
    src="/images/Pembayaran.png"
    alt="Deep Cleaning"
    class="w-full h-full object-cover"
  >
</div>
        {{-- Detail Pesanan --}}
        <div class="p-5">
          <h3 class="font-bold text-gray-900 text-lg mb-1">Deep Cleaning</h3>
          <p class="text-gray-400 text-sm mb-4">Layanan kebersihan menyeluruh</p>

          <div class="space-y-3 border-t border-gray-100 pt-4">
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Tanggal</span>
              <span class="text-gray-800 font-medium">25 Januari 2025</span>
            </div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Alamat</span>
              <span class="text-gray-800 font-medium">Bandar Lampung</span>
            </div>
          </div>

          <div class="border-t border-gray-100 mt-4 pt-4 space-y-2">
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Harga</span>
              <span class="text-gray-700">Rp 250.000</span>
            </div>
            <div class="flex justify-between text-sm font-bold">
              <span class="text-green-600">Total: Rp 250.000</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

{{-- FOOTER --}}
<footer class="px-16 py-8 bg-white border-t border-gray-100">
  <div class="flex justify-between items-center">
    <h3 class="text-gray-800 font-bold text-lg">Pristine Sanctuary</h3>
    <div class="flex gap-6 text-gray-400 text-sm">
      <a href="#" class="hover:text-green-600">Privacy Policy</a>
      <a href="#" class="hover:text-green-600">Terms of Service</a>
      <a href="#" class="hover:text-green-600">Help Center</a>
    </div>
    <p class="text-gray-400 text-xs">© 2024 The Pristine Sanctuary. Renewal in every corner.</p>
  </div>
</footer>

</body>
</html