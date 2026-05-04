<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BersihIn - Rumah Bersih, Hidup Nyaman</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Sora:wght@700;800&display=swap" rel="stylesheet">
<style>
  :root { --green: #16a34a; --green-dark: #0d3d2b; }
  body { font-family: 'Plus Jakarta Sans', sans-serif; }
  .font-display { font-family: 'Sora', sans-serif; }

  /* Hamburger mobile menu */
  #mobile-menu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
  }
  #mobile-menu.open { max-height: 400px; }

  /* Card hover */
  .card-lift { transition: transform 0.2s ease, box-shadow 0.2s ease; }
  .card-lift:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.09); }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .anim-1 { animation: fadeUp 0.45s ease 0.05s both; }
  .anim-2 { animation: fadeUp 0.45s ease 0.2s both; }
</style>
</head>
<body class="bg-white">

{{-- ===================== NAVBAR ===================== --}}
<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-gray-100">
  <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">

    <a href="/" class="font-display text-xl font-extrabold text-green-700 tracking-tight">BersihIn</a>

    {{-- Desktop links --}}
    <div class="hidden md:flex gap-7 text-sm font-medium text-gray-500">
      <a href="/bersihin/layanan" class="hover:text-green-600 transition">Layanan</a>
      <a href="#cara-kerja" class="hover:text-green-600 transition">Cara Kerja</a>
      <a href="#harga" class="hover:text-green-600 transition">Harga</a>
      <a href="#ulasan" class="hover:text-green-600 transition">Ulasan</a>
    </div>

    {{-- Desktop CTA --}}
    <div class="hidden md:flex items-center gap-3">
      <a href="/bersihin/login" class="text-sm text-gray-600 font-medium hover:text-green-600 transition">Masuk</a>
      <a href="/bersihin/register" class="bg-green-600 text-white text-sm font-semibold px-5 py-2.5 rounded-full hover:bg-green-700 transition">Daftar Gratis</a>
    </div>

    {{-- Hamburger (mobile only) --}}
    <button onclick="toggleMenu()" class="md:hidden p-2 rounded-lg hover:bg-gray-50 transition" aria-label="Menu">
      <svg id="icon-burger" class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
      <svg id="icon-close" class="w-6 h-6 text-gray-700 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>
  </div>

  {{-- Mobile dropdown --}}
  <div id="mobile-menu" class="md:hidden bg-white border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-6 pb-4 pt-2 flex flex-col gap-1">
      <a href="/bersihin/layanan" class="py-2.5 text-sm font-medium text-gray-700 hover:text-green-600 border-b border-gray-50 flex items-center justify-between">
        Layanan <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>
      <a href="#cara-kerja" onclick="closeMenu()" class="py-2.5 text-sm font-medium text-gray-700 hover:text-green-600 border-b border-gray-50 flex items-center justify-between">
        Cara Kerja <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>
      <a href="#harga" onclick="closeMenu()" class="py-2.5 text-sm font-medium text-gray-700 hover:text-green-600 border-b border-gray-50 flex items-center justify-between">
        Harga <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>
      <a href="#ulasan" onclick="closeMenu()" class="py-2.5 text-sm font-medium text-gray-700 hover:text-green-600 border-b border-gray-50 flex items-center justify-between">
        Ulasan <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>
      <div class="flex gap-3 pt-3">
        <a href="/bersihin/login" class="flex-1 text-center py-2.5 border border-gray-200 rounded-full text-sm font-semibold text-gray-700 hover:bg-gray-50">Masuk</a>
        <a href="/bersihin/register" class="flex-1 text-center py-2.5 bg-green-600 text-white rounded-full text-sm font-semibold hover:bg-green-700">Daftar Gratis</a>
      </div>
    </div>
  </div>
</nav>

{{-- ===================== HERO ===================== --}}
{{-- Mobile: teks atas, gambar bawah | Desktop: teks kiri, gambar kanan --}}
<section class="max-w-6xl mx-auto px-6 py-12 md:py-20">
  <div class="flex flex-col md:flex-row md:items-center gap-10 md:gap-16">

    {{-- Teks --}}
    <div class="flex-1 anim-1">
      <div class="inline-flex items-center gap-2 bg-green-50 border border-green-200 rounded-full px-4 py-1.5 mb-5">
        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse flex-shrink-0"></span>
        <span class="text-green-700 text-xs font-bold tracking-widest uppercase">Terpercaya di Indonesia</span>
      </div>

      <h1 class="font-display text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
        Rumah Bersih,<br>
        <span class="text-green-600">Hidup Nyaman.</span>
      </h1>

      <p class="text-gray-500 text-base leading-relaxed mb-7 max-w-md">
        Nikmati standar kebersihan bintang lima untuk hunian Anda. Profesional, aman, dan penuh perhatian dalam setiap sentuhan pembersihan.
      </p>

      <div class="flex flex-wrap gap-3 mb-8">
        <a href="/bersihin/booking" class="bg-green-600 text-white font-semibold px-7 py-3 rounded-full hover:bg-green-700 transition shadow-md text-sm">
          Mulai Pesan
        </a>
        <a href="/bersihin/layanan" class="border border-gray-300 text-gray-700 font-semibold px-7 py-3 rounded-full hover:bg-gray-50 transition text-sm">
          Lihat Layanan
        </a>
      </div>

      {{-- Stats --}}
      <div class="flex gap-6">
        <div>
          <div class="font-display text-2xl font-extrabold text-green-700">12K+</div>
          <div class="text-xs text-gray-400 mt-0.5">Pelanggan Puas</div>
        </div>
        <div class="w-px bg-gray-200"></div>
        <div>
          <div class="font-display text-2xl font-extrabold text-green-700">4.9★</div>
          <div class="text-xs text-gray-400 mt-0.5">Rating Rata-rata</div>
        </div>
        <div class="w-px bg-gray-200"></div>
        <div>
          <div class="font-display text-2xl font-extrabold text-green-700">50+</div>
          <div class="text-xs text-gray-400 mt-0.5">Kota Terlayani</div>
        </div>
      </div>
    </div>

    {{-- Gambar --}}
    <div class="flex-1 anim-2">
      <div class="rounded-2xl overflow-hidden shadow-xl w-full">
        <img src="/images/Professional_cleaning staff.png"
             alt="Petugas profesional BersihIn"
             class="w-full h-64 md:h-80 object-cover object-top">
      </div>
      {{-- Trust bar di bawah gambar --}}
      <div class="flex items-center justify-center gap-6 mt-3 py-3 bg-gray-50 rounded-xl">
        <div class="flex items-center gap-1.5 text-xs text-gray-500">
          <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
          Terverifikasi
        </div>
        <div class="flex items-center gap-1.5 text-xs text-gray-500">
          <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
          Aman & Terpercaya
        </div>
        <div class="flex items-center gap-1.5 text-xs text-gray-500">
          <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          Tepat Waktu
        </div>
      </div>
    </div>

  </div>
</section>

{{-- ===================== FITUR ===================== --}}
<section class="bg-gray-50 px-6 py-14">
  <div class="max-w-6xl mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-5">
      <div class="bg-white p-6 rounded-2xl border border-gray-100 card-lift">
        <div class="w-11 h-11 bg-green-50 rounded-xl flex items-center justify-center mb-4">
          <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <h3 class="font-bold text-gray-800 mb-2">Petugas Terverifikasi</h3>
        <p class="text-gray-500 text-sm leading-relaxed">Setiap petugas melalui seleksi ketat dan pelatihan profesional berstandar internasional.</p>
      </div>
      <div class="bg-white p-6 rounded-2xl border border-gray-100 card-lift">
        <div class="w-11 h-11 bg-green-50 rounded-xl flex items-center justify-center mb-4">
          <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
        </div>
        <h3 class="font-bold text-gray-800 mb-2">Harga Transparan</h3>
        <p class="text-gray-500 text-sm leading-relaxed">Tanpa biaya tersembunyi. Anda tahu persis apa yang dibayar sejak awal pemesanan.</p>
      </div>
      <div class="bg-white p-6 rounded-2xl border border-gray-100 card-lift">
        <div class="w-11 h-11 bg-green-50 rounded-xl flex items-center justify-center mb-4">
          <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
        </div>
        <h3 class="font-bold text-gray-800 mb-2">Mudah Dipesan</h3>
        <p class="text-gray-500 text-sm leading-relaxed">Pesan layanan kebersihan hanya dalam 60 detik melalui website kami yang intuitif.</p>
      </div>
    </div>
    <div class="bg-green-600 rounded-2xl px-8 py-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
      <div>
        <h3 class="text-white font-bold text-lg">Jadwal Fleksibel, 24/7</h3>
        <p class="text-green-100 text-sm mt-1">Kami siap melayani kapan pun Anda membutuhkan, termasuk hari libur.</p>
      </div>
      <a href="/bersihin/booking" class="bg-white text-green-700 font-semibold text-sm px-5 py-2.5 rounded-full flex items-center gap-2 hover:bg-green-50 transition whitespace-nowrap flex-shrink-0">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        Pesan Sekarang
      </a>
    </div>
  </div>
</section>

{{-- ===================== LAYANAN ===================== --}}
<section class="px-6 py-16 bg-white">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-10">
      <h2 class="font-display text-3xl md:text-4xl font-extrabold text-gray-900 mb-3">Layanan Unggulan Kami</h2>
      <p class="text-gray-500 text-sm max-w-md mx-auto">Pilih pembersihan yang sesuai kebutuhan hunian dan kenyamanan keluarga Anda.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <div class="border border-gray-100 rounded-2xl overflow-hidden card-lift">
        <div class="h-48 overflow-hidden bg-gray-100">
          <img src="/images/bersih_rutin.png" class="w-full h-full object-cover" alt="Bersih Rutin">
        </div>
        <div class="p-5">
          <span class="bg-green-50 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full">Populer</span>
          <h3 class="font-bold text-gray-900 text-base mt-3 mb-2">Bersih Rutin</h3>
          <p class="text-gray-500 text-sm leading-relaxed mb-4">Pembersihan harian untuk menjaga kesegaran ruang tamu, kamar tidur, dan area umum lainnya.</p>
          <a href="/bersihin/layanan" class="text-green-600 text-sm font-semibold flex items-center gap-1 hover:gap-2 transition-all">
            Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
          </a>
        </div>
      </div>
      <div class="border border-gray-100 rounded-2xl overflow-hidden card-lift">
        <div class="h-48 overflow-hidden bg-gray-100">
          <img src="/images/cuci_kasur.png" class="w-full h-full object-cover" alt="Cuci Kasur">
        </div>
        <div class="p-5">
          <span class="bg-blue-50 text-blue-700 text-xs font-semibold px-2.5 py-1 rounded-full">Kesehatan</span>
          <h3 class="font-bold text-gray-900 text-base mt-3 mb-2">Cuci Kasur</h3>
          <p class="text-gray-500 text-sm leading-relaxed mb-4">Teknologi uap panas membasmi tungau dan alergen, memastikan tidur Anda lebih sehat dan nyaman.</p>
          <a href="/bersihin/layanan" class="text-green-600 text-sm font-semibold flex items-center gap-1 hover:gap-2 transition-all">
            Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
          </a>
        </div>
      </div>
      <div class="border border-gray-100 rounded-2xl overflow-hidden card-lift">
        <div class="h-48 overflow-hidden bg-gray-100">
          <img src="/images/DeepCleaning.png" class="w-full h-full object-cover" alt="Deep Cleaning">
        </div>
        <div class="p-5">
          <span class="bg-orange-50 text-orange-700 text-xs font-semibold px-2.5 py-1 rounded-full">Menyeluruh</span>
          <h3 class="font-bold text-gray-900 text-base mt-3 mb-2">Deep Cleaning</h3>
          <p class="text-gray-500 text-sm leading-relaxed mb-4">Pembersihan hingga sudut tersulit, ideal untuk rumah baru atau setelah renovasi besar.</p>
          <a href="/bersihin/layanan" class="text-green-600 text-sm font-semibold flex items-center gap-1 hover:gap-2 transition-all">
            Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ===================== TESTIMONI ===================== --}}
<section id="ulasan" class="px-6 py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-10 gap-4">
      <div>
        <h2 class="font-display text-3xl font-extrabold text-gray-900 mb-2">Apa Kata Mereka?</h2>
        <p class="text-gray-500 text-sm">Ribuan keluarga telah mempercayakan kenyamanan rumahnya pada kami.</p>
      </div>
      <div class="flex gap-2 flex-shrink-0">
        <button class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center hover:bg-gray-100 transition">
          <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button class="w-9 h-9 rounded-full bg-green-600 flex items-center justify-center hover:bg-green-700 transition">
          <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
      </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm card-lift">
        <div class="text-yellow-400 text-sm mb-3">★★★★★</div>
        <p class="text-gray-600 text-sm italic leading-relaxed mb-5">"Sangat puas dengan Deep Cleaning-nya. Dapur yang tadinya berminyak sekarang kinclong seperti baru. Petugasnya sopan dan profesional!"</p>
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 bg-green-100 rounded-full flex items-center justify-center font-bold text-green-700 text-sm flex-shrink-0">AR</div>
          <div>
            <p class="text-sm font-semibold text-gray-800">Anisa Rahma</p>
            <p class="text-xs text-gray-400">Jakarta Selatan</p>
          </div>
        </div>
      </div>
      <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm card-lift">
        <div class="text-yellow-400 text-sm mb-3">★★★★★</div>
        <p class="text-gray-600 text-sm italic leading-relaxed mb-5">"Layanan cuci kasurnya top! Anak-anak jadi tidak bersin-bersin lagi saat bangun tidur. Direkomendasikan untuk para orang tua!"</p>
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 bg-blue-100 rounded-full flex items-center justify-center font-bold text-blue-700 text-sm flex-shrink-0">BS</div>
          <div>
            <p class="text-sm font-semibold text-gray-800">Budi Santoso</p>
            <p class="text-xs text-gray-400">Tangerang</p>
          </div>
        </div>
      </div>
      <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm card-lift">
        <div class="text-yellow-400 text-sm mb-3">★★★★★</div>
        <p class="text-gray-600 text-sm italic leading-relaxed mb-5">"Pertama kali ketemu jasa cleaning harga transparan dan petugas tepat waktu. Bersih Rutin bulanan jadi lebih tenang!"</p>
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 bg-purple-100 rounded-full flex items-center justify-center font-bold text-purple-700 text-sm flex-shrink-0">SW</div>
          <div>
            <p class="text-sm font-semibold text-gray-800">Siska Wijaya</p>
            <p class="text-xs text-gray-400">Surabaya</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ===================== CTA BOTTOM ===================== --}}
<section class="px-6 py-16 bg-green-600">
  <div class="max-w-2xl mx-auto text-center">
    <h2 class="font-display text-3xl md:text-4xl font-extrabold text-white mb-4">Siap Punya Rumah yang Bersih?</h2>
    <p class="text-green-100 text-sm mb-8 leading-relaxed">Bergabung bersama 12.000+ keluarga yang sudah mempercayakan kebersihan rumahnya kepada BersihIn.</p>
    <div class="flex flex-col sm:flex-row justify-center gap-3">
      <a href="/bersihin/register" class="bg-white text-green-700 font-bold px-8 py-3.5 rounded-full hover:bg-green-50 transition text-sm shadow">Mulai Gratis Sekarang</a>
      <a href="/bersihin/layanan" class="border border-white/40 text-white font-semibold px-8 py-3.5 rounded-full hover:bg-white/10 transition text-sm">Lihat Semua Layanan</a>
    </div>
  </div>
</section>

{{-- ===================== FOOTER ===================== --}}
<footer class="px-6 py-12 bg-white border-t border-gray-100">
  <div class="max-w-6xl mx-auto">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-10">
      <div class="col-span-2 md:col-span-1">
        <h3 class="font-display text-green-600 font-bold text-xl mb-3">BersihIn</h3>
        <p class="text-gray-400 text-sm leading-relaxed mb-4">Menghadirkan standar kebersihan tertinggi untuk setiap rumah di Indonesia.</p>
        <div class="flex gap-3">
          <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-green-50 transition">
            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          </div>
          <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-green-50 transition">
            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
          </div>
        </div>
      </div>
      <div>
        <h4 class="font-semibold text-gray-700 mb-4 text-sm">Layanan</h4>
        <div class="flex flex-col gap-2 text-gray-400 text-sm">
          <a href="#" class="hover:text-green-600 transition">Bersih Rutin</a>
          <a href="#" class="hover:text-green-600 transition">Cuci Kasur</a>
          <a href="#" class="hover:text-green-600 transition">Deep Cleaning</a>
        </div>
      </div>
      <div>
        <h4 class="font-semibold text-gray-700 mb-4 text-sm">Perusahaan</h4>
        <div class="flex flex-col gap-2 text-gray-400 text-sm">
          <a href="#cara-kerja" class="hover:text-green-600 transition">Cara Kerja</a>
          <a href="#harga" class="hover:text-green-600 transition">Harga</a>
          <a href="#ulasan" class="hover:text-green-600 transition">Ulasan</a>
        </div>
      </div>
      <div>
        <h4 class="font-semibold text-gray-700 mb-4 text-sm">Bantuan</h4>
        <div class="flex flex-col gap-2 text-gray-400 text-sm">
          <a href="#" class="hover:text-green-600 transition">Kebijakan Privasi</a>
          <a href="#" class="hover:text-green-600 transition">Syarat & Ketentuan</a>
        </div>
      </div>
    </div>
    <div class="border-t border-gray-100 pt-6 text-center">
      <p class="text-gray-400 text-xs">© 2024 BersihIn. All rights reserved.</p>
    </div>
  </div>
</footer>

<script>
  let menuOpen = false;

  function toggleMenu() {
    menuOpen = !menuOpen;
    const menu = document.getElementById('mobile-menu');
    const burger = document.getElementById('icon-burger');
    const close = document.getElementById('icon-close');
    if (menuOpen) {
      menu.classList.add('open');
      burger.classList.add('hidden');
      close.classList.remove('hidden');
    } else {
      closeMenu();
    }
  }

  function closeMenu() {
    menuOpen = false;
    document.getElementById('mobile-menu').classList.remove('open');
    document.getElementById('icon-burger').classList.remove('hidden');
    document.getElementById('icon-close').classList.add('hidden');
  }
</script>
</body>
</html>