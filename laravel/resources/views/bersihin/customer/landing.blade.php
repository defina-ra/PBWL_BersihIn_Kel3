<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BersihIn - Rumah Bersih, Hidup Nyaman</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; }
</style>
</head>
<body class="bg-white">

{{-- NAVBAR --}}
<nav class="flex items-center justify-between px-16 py-4 bg-white border-b border-gray-100 sticky top-0 z-50">
  <a href="/bersihin" class="text-green-600 font-bold text-2xl">BersihIn</a>
  <div class="flex gap-8 text-sm font-medium text-gray-600">
    <a href="/bersihin/layanan" class="text-green-600 border-b-2 border-green-500 pb-1">Layanan</a>
    <a href="#" class="hover:text-green-600">Cara Kerja</a>
    <a href="#" class="hover:text-green-600">Harga</a>
    <a href="#" class="hover:text-green-600">Ulasan</a>
  </div>
  <div class="flex items-center gap-4">
    <a href="/bersihin/login" class="text-sm text-gray-600 font-medium hover:text-green-600">Login</a>
    <a href="/bersihin/register" class="bg-green-600 text-white text-sm font-semibold px-5 py-2 rounded-full hover:bg-green-700">Get Started</a>
  </div>
</nav>

{{-- HERO --}}
<section class="flex items-center px-16 py-16 bg-white gap-12">
  <div class="flex-1">
    <div class="flex items-center gap-2 mb-4">
      <span class="w-2 h-2 bg-green-500 rounded-full"></span>
      <span class="text-green-600 text-xs font-semibold tracking-wide">TERPERCAYA DI INDONESIA</span>
    </div>
    <h1 class="text-5xl font-extrabold text-gray-900 leading-tight mb-4">
      Rumah Bersih,<br>
      <span class="text-green-600">Hidup Nyaman.</span>
    </h1>
    <p class="text-gray-500 text-base leading-relaxed mb-8 max-w-md">
      Nikmati standar kebersihan bintang lima untuk hunian Anda. Profesional, aman, dan penuh kasih sayang dalam setiap sentuhan pembersihan.
    </p>
    <div class="flex gap-4">
      <a href="/bersihin/booking" class="bg-green-600 text-white font-semibold px-7 py-3 rounded-full hover:bg-green-700 text-sm">Mulai Pesan</a>
      <a href="/bersihin/layanan" class="border border-gray-300 text-gray-700 font-semibold px-7 py-3 rounded-full hover:bg-gray-50 text-sm">Lihat Layanan</a>
    </div>
  </div>
  <div class="flex-1 flex justify-end">
   <div class="w-full max-w-lg h-80 rounded-2xl overflow-hidden">
  <img src="/images/Professional_cleaning staff.png" 
       alt="Petugas BersihIn"
       class="w-full h-full object-cover">
</div>
</section>

{{-- FITUR --}}
<section class="px-16 py-14 bg-gray-50">
  <div class="grid grid-cols-3 gap-6 mb-6">
    <div class="bg-white p-6 rounded-2xl border border-gray-100">
      <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center mb-4">
        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
      </div>
      <h3 class="font-bold text-gray-800 mb-2">Petugas Terverifikasi</h3>
      <p class="text-gray-500 text-sm leading-relaxed">Setiap petugas kami melalui proses seleksi ketat dan pelatihan profesional berstandar internasional.</p>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-gray-100">
      <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center mb-4">
        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
      </div>
      <h3 class="font-bold text-gray-800 mb-2">Harga Transparan</h3>
      <p class="text-gray-500 text-sm leading-relaxed">Tanpa biaya tersembunyi. Anda tahu persis apa yang Anda bayar sejak awal pemesanan dilakukan.</p>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-gray-100">
      <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center mb-4">
        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
      </div>
      <h3 class="font-bold text-gray-800 mb-2">Mudah Dipesan</h3>
      <p class="text-gray-500 text-sm leading-relaxed">Pesan layanan kebersihan hanya dalam 60 detik melalui aplikasi atau website kami yang intuitif.</p>
    </div>
  </div>
  {{-- Banner Jadwal Fleksibel --}}
  <div class="bg-green-600 rounded-2xl px-8 py-5 flex items-center justify-between">
    <div>
      <h3 class="text-white font-bold text-lg">Jadwal Fleksibel</h3>
      <p class="text-green-100 text-sm mt-1">Kami siap melayani sesuai waktu luang Anda, kapan pun dibutuhkan.</p>
    </div>
    <button class="bg-white text-green-700 font-semibold text-sm px-5 py-2 rounded-full flex items-center gap-2">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
      24/7 Support
    </button>
  </div>
</section>

{{-- LAYANAN UNGGULAN --}}
<section class="px-16 py-16 bg-white">
  <div class="text-center mb-10">
    <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Layanan Unggulan Kami</h2>
    <p class="text-gray-500 text-sm max-w-md mx-auto">Pilih kategori pembersihan yang sesuai dengan kebutuhan spesifik hunian dan kenyamanan keluarga Anda.</p>
  </div>
  <div class="grid grid-cols-3 gap-6">
    {{-- Card 1 --}}
    <div class="border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
  <div class="h-48 overflow-hidden">
    <img src="/images/bersih_rutin.png" class="w-full h-full object-cover">
  </div>
      <div class="p-5">
        <h3 class="font-bold text-green-600 text-lg mb-2">Bersih Rutin</h3>
        <p class="text-gray-500 text-sm leading-relaxed mb-4">Pembersihan harian untuk menjaga kesegaran ruang tamu, kamar tidur, dan area umum lainnya.</p>
        <a href="/bersihin/layanan" class="text-green-600 text-sm font-semibold flex items-center gap-1 hover:gap-2 transition-all">
          Selengkapnya 
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
      </div>
    </div>
    {{-- Card 2 --}}
    <div class="border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
  <div class="h-48 overflow-hidden">
    <img src="/images/cuci_kasur.png" class="w-full h-full object-cover">
  </div>
      <div class="p-5">
        <h3 class="font-bold text-green-600 text-lg mb-2">Cuci Kasur</h3>
        <p class="text-gray-500 text-sm leading-relaxed mb-4">Teknologi uap panas untuk membasmi tungau dan alergen, memastikan tidur Anda lebih sehat.</p>
        <a href="/bersihin/layanan" class="text-green-600 text-sm font-semibold flex items-center gap-1 hover:gap-2 transition-all">
          Selengkapnya
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
      </div>
    </div>
    {{-- Card 3 --}}
   <div class="border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
  <div class="h-48 overflow-hidden">
    <img src="/images/DeepCleaning.png" class="w-full h-full object-cover">
  </div>
      <div class="p-5">
        <h3 class="font-bold text-green-600 text-lg mb-2">Deep Cleaning</h3>
        <p class="text-gray-500 text-sm leading-relaxed mb-4">Pembersihan menyeluruh hingga ke sudut tersulIt, ideal untuk rumah baru atau setelah renovasi.</p>
        <a href="/bersihin/layanan" class="text-green-600 text-sm font-semibold flex items-center gap-1 hover:gap-2 transition-all">
          Selengkapnya
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>

{{-- TESTIMONI --}}
<section class="px-16 py-16 bg-white">
  <div class="flex items-start justify-between mb-8">
    <div>
      <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Apa Kata Mereka?</h2>
      <p class="text-gray-500 text-sm">Ribuan keluarga di Indonesia telah mempercayakan kenyamanan rumahnya pada kami.</p>
    </div>
    <div class="flex gap-2">
      <button class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center hover:bg-gray-50">
        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
      </button>
      <button class="w-9 h-9 rounded-full bg-green-600 flex items-center justify-center hover:bg-green-700">
        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      </button>
    </div>
  </div>
  <div class="grid grid-cols-3 gap-6">
    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
      <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center mb-3">
        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
      </div>
      <div class="text-yellow-400 text-sm mb-3">★★★★★</div>
      <p class="text-gray-600 text-sm italic leading-relaxed mb-4">"Sangat puas dengan layanan Deep Cleaning-nya. Dapur yang tadinya berminyak sekarang kinclong seperti baru lagi. Petugasnya sangat sopan!"</p>
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
          <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
        </div>
        <div>
          <p class="text-sm font-semibold text-gray-800">Anisa Rahma</p>
          <p class="text-xs text-gray-400">Jakarta Selatan</p>
        </div>
      </div>
    </div>
    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
      <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center mb-3">
        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
      </div>
      <div class="text-yellow-400 text-sm mb-3">★★★★★</div>
      <p class="text-gray-600 text-sm italic leading-relaxed mb-4">"Layanan cuci kasurnya top bgt! Anak-anak jadi nggak bersin-bersin lagi pas bangun tidur. Rekomen banget buat para ibu rumah tangga."</p>
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
          <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
        </div>
        <div>
          <p class="text-sm font-semibold text-gray-800">Budi Santoso</p>
          <p class="text-xs text-gray-400">Tangerang</p>
        </div>
      </div>
    </div>
    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
      <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center mb-3">
        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
      </div>
      <div class="text-yellow-400 text-sm mb-3">★★★★★</div>
      <p class="text-gray-600 text-sm italic leading-relaxed mb-4">"Baru kali ini ketemu jasa cleaning yang harganya transparan dan petugasnya dateng on-time. Bersih Rutin bulanan saya jadi lebih tenang."</p>
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
          <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
        </div>
        <div>
          <p class="text-sm font-semibold text-gray-800">Siska Wijaya</p>
          <p class="text-xs text-gray-400">Surabaya</p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- FOOTER --}}
<footer class="px-16 py-12 bg-white border-t border-gray-100">
  <div class="flex justify-between gap-8">
    <div class="max-w-xs">
      <h3 class="text-green-600 font-bold text-xl mb-3">BersihIn</h3>
      <p class="text-gray-400 text-sm leading-relaxed mb-4">Menghadirkan standar kebersihan tertinggi untuk setiap rumah di Indonesia. Solusi praktis untuk hidup yang lebih sehat.</p>
      <div class="flex gap-3">
        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-green-50">
          <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </div>
        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-green-50">
          <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
        </div>
      </div>
    </div>
    <div>
      <h4 class="font-semibold text-gray-700 mb-4 text-sm">Layanan</h4>
      <div class="flex flex-col gap-2 text-gray-400 text-sm">
        <a href="#" class="hover:text-green-600">Bersih Rutin</a>
        <a href="#" class="hover:text-green-600">Cuci Kasur</a>
        <a href="#" class="hover:text-green-600">Deep Cleaning</a>
      </div>
    </div>
    <div>
      <h4 class="font-semibold text-gray-700 mb-4 text-sm">Perusahaan</h4>
      <div class="flex flex-col gap-2 text-gray-400 text-sm">
        <a href="#" class="hover:text-green-600">How it Works</a>
        <a href="#" class="hover:text-green-600">Pricing</a>
        <a href="#" class="hover:text-green-600">Reviews</a>
      </div>
    </div>
    <div>
      <h4 class="font-semibold text-gray-700 mb-4 text-sm">Bantuan</h4>
      <div class="flex flex-col gap-2 text-gray-400 text-sm">
        <a href="#" class="hover:text-green-600">Privacy Policy</a>
        <a href="#" class="hover:text-green-600">Terms of Service</a>
      </div>
    </div>
  </div>
  <div class="border-t border-gray-100 mt-10 pt-6 text-center">
    <p class="text-gray-400 text-xs">© 2024 BersihIn. A Sanctuary of Renewal.</p>
  </div>
</footer>

</body>
</html>