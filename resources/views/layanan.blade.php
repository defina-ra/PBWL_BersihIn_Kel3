<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Layanan Kami - BersihIn</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; }
  .filter-btn.active { background: #16a34a; color: white; }
  .filter-btn { background: transparent; color: #374151; }
</style>
</head>
<body class="bg-gray-50">

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

{{-- PAGE HEADER --}}
<section class="px-16 pt-12 pb-8 bg-gray-50">
  <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Layanan Kami</h1>
  <p class="text-gray-500 text-base max-w-lg">
    Pilih layanan kebersihan sesuai kebutuhan rumah Anda. Kami menghadirkan standar "Pristine Sanctuary" ke setiap sudut ruangan.
  </p>
</section>

{{-- FILTER BAR --}}
<section class="px-16 pb-8 bg-gray-50">
  <div class="flex items-center justify-between">
    <div class="flex gap-3">
      <button class="filter-btn active px-5 py-2 rounded-full text-sm font-semibold border border-green-600">Semua</button>
      <button class="filter-btn px-5 py-2 rounded-full text-sm font-semibold border border-gray-200 hover:border-green-400 hover:text-green-600">Harian</button>
      <button class="filter-btn px-5 py-2 rounded-full text-sm font-semibold border border-gray-200 hover:border-green-400 hover:text-green-600">Mingguan</button>
      <button class="filter-btn px-5 py-2 rounded-full text-sm font-semibold border border-gray-200 hover:border-green-400 hover:text-green-600">Spesial</button>
    </div>
    <div>
      <select class="border border-gray-200 text-sm text-gray-600 px-4 py-2 rounded-full bg-white focus:outline-none focus:border-green-400">
        <option>Urutkan: Harga Terendah</option>
        <option>Urutkan: Harga Tertinggi</option>
        <option>Urutkan: Terpopuler</option>
      </select>
    </div>
  </div>
</section>

{{-- SERVICE GRID --}}
<section class="px-16 pb-16 bg-gray-50">
  <div class="grid grid-cols-3 gap-6">

    {{-- Card 1: Bersih Rutin --}}
    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
      <div class="relative">
        <div class="h-52 bg-gray-200 flex items-center justify-center overflow-hidden">
          <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80" 
               alt="Bersih Rutin" class="w-full h-full object-cover"
               onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-green-800 flex items-center justify-center\'><span class=\'text-white text-sm\'>Bersih Rutin</span></div>'">
        </div>
        <span class="absolute top-3 left-3 bg-white text-gray-600 text-xs font-medium px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" d="M12 6v6l4 2"/></svg>
          ± 2 Jam
        </span>
      </div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-2">
          <h3 class="font-bold text-gray-900 text-lg">Bersih Rutin</h3>
          <span class="text-green-600 font-bold text-sm">Rp 100.000</span>
        </div>
        <p class="text-gray-500 text-sm mb-4 leading-relaxed">Perawatan kebersihan harian untuk menjaga kesegaran ruang tamu, kamar tidur, dan dapur Anda.</p>
        <a href="/bersihin/booking" class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl text-sm transition">
          Pesan Sekarang
        </a>
      </div>
    </div>

    {{-- Card 2: Cuci Kasur --}}
    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
      <div class="relative">
        <div class="h-52 bg-gray-200 flex items-center justify-center overflow-hidden">
          <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=600&q=80" 
               alt="Cuci Kasur" class="w-full h-full object-cover"
               onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-blue-800 flex items-center justify-center\'><span class=\'text-white text-sm\'>Cuci Kasur</span></div>'">
        </div>
        <span class="absolute top-3 left-3 bg-white text-gray-600 text-xs font-medium px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" d="M12 6v6l4 2"/></svg>
          ± 2 Jam
        </span>
      </div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-2">
          <h3 class="font-bold text-gray-900 text-lg">Cuci Kasur</h3>
          <span class="text-green-600 font-bold text-sm">Rp 150.000</span>
        </div>
        <p class="text-gray-500 text-sm mb-4 leading-relaxed">Eradikasi tungau dan debu dengan teknologi uap panas, memastikan tidur yang lebih sehat dan nyaman.</p>
        <a href="/bersihin/booking" class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl text-sm transition">
          Pesan Sekarang
        </a>
      </div>
    </div>

    {{-- Card 3: Deep Cleaning --}}
    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
      <div class="relative">
        <div class="h-52 bg-gray-200 flex items-center justify-center overflow-hidden">
          <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=600&q=80" 
               alt="Deep Cleaning" class="w-full h-full object-cover"
               onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-teal-800 flex items-center justify-center\'><span class=\'text-white text-sm\'>Deep Cleaning</span></div>'">
        </div>
        <span class="absolute top-3 left-3 bg-white text-gray-600 text-xs font-medium px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" d="M12 6v6l4 2"/></svg>
          ± 2 Jam
        </span>
      </div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-2">
          <h3 class="font-bold text-gray-900 text-lg">Deep Cleaning</h3>
          <span class="text-green-600 font-bold text-sm">Rp 250.000</span>
        </div>
        <p class="text-gray-500 text-sm mb-4 leading-relaxed">Pembersihan menyeluruh hingga sela tersulit, ideal untuk rumah baru atau setelah renovasi besar.</p>
        <a href="/bersihin/booking" class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl text-sm transition">
          Pesan Sekarang
        </a>
      </div>
    </div>

    {{-- Card 4: Bersih Kamar Mandi --}}
    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
      <div class="relative">
        <div class="h-52 bg-gray-200 flex items-center justify-center overflow-hidden">
          <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=600&q=80" 
               alt="Bersih Kamar Mandi" class="w-full h-full object-cover"
               onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-cyan-800 flex items-center justify-center\'><span class=\'text-white text-sm\'>Bersih Kamar Mandi</span></div>'">
        </div>
        <span class="absolute top-3 left-3 bg-white text-gray-600 text-xs font-medium px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" d="M12 6v6l4 2"/></svg>
          ± 2 Jam
        </span>
      </div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-2">
          <h3 class="font-bold text-gray-900 text-lg">Bersih Kamar Mandi</h3>
          <span class="text-green-600 font-bold text-sm">Rp 120.000</span>
        </div>
        <p class="text-gray-500 text-sm mb-4 leading-relaxed">Menghilangkan kerak air dan jamur hingga bersih sempurna, kamar mandi kembali seperti baru.</p>
        <a href="/bersihin/booking" class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl text-sm transition">
          Pesan Sekarang
        </a>
      </div>
    </div>

    {{-- Card 5: Cuci Sofa --}}
    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
      <div class="relative">
        <div class="h-52 bg-gray-200 flex items-center justify-center overflow-hidden">
          <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80" 
               alt="Cuci Sofa" class="w-full h-full object-cover"
               onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-amber-800 flex items-center justify-center\'><span class=\'text-white text-sm\'>Cuci Sofa</span></div>'">
        </div>
        <span class="absolute top-3 left-3 bg-white text-gray-600 text-xs font-medium px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" d="M12 6v6l4 2"/></svg>
          ± 2 Jam
        </span>
      </div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-2">
          <h3 class="font-bold text-gray-900 text-lg">Cuci Sofa</h3>
          <span class="text-green-600 font-bold text-sm">Rp 180.000</span>
        </div>
        <p class="text-gray-500 text-sm mb-4 leading-relaxed">Pembersihan noda dan aroma tak sedap pada sofa dengan metode deep foam cleaning profesional.</p>
        <a href="/bersihin/booking" class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl text-sm transition">
          Pesan Sekarang
        </a>
      </div>
    </div>

    {{-- Card 6: Cuci Jendela --}}
    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
      <div class="relative">
        <div class="h-52 bg-gray-200 flex items-center justify-center overflow-hidden">
          <img src="https://images.unsplash.com/photo-1527515637462-cff94edd787c?w=600&q=80" 
               alt="Cuci Jendela" class="w-full h-full object-cover"
               onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-sky-800 flex items-center justify-center\'><span class=\'text-white text-sm\'>Cuci Jendela</span></div>'">
        </div>
        <span class="absolute top-3 left-3 bg-white text-gray-600 text-xs font-medium px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" d="M12 6v6l4 2"/></svg>
          ± 2 Jam
        </span>
      </div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-2">
          <h3 class="font-bold text-gray-900 text-lg">Cuci Jendela</h3>
          <span class="text-green-600 font-bold text-sm">Rp 90.000</span>
        </div>
        <p class="text-gray-500 text-sm mb-4 leading-relaxed">Kaca bening tanpa noda untuk pemandangan luar yang lebih indah dan cahaya masuk maksimal.</p>
        <a href="/bersihin/booking" class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl text-sm transition">
          Pesan Sekarang
        </a>
      </div>
    </div>

  </div>
</section>

{{-- FOOTER --}}
<footer class="px-16 py-12 bg-white border-t border-gray-100">
  <div class="flex justify-between gap-8">
    <div class="max-w-xs">
      <h3 class="text-green-600 font-bold text-xl mb-3">BersihIn</h3>
      <p class="text-gray-400 text-sm leading-relaxed mb-4">Mewujudkan "The Pristine Sanctuary" di setiap rumah melalui layanan kebersihan profesional dan terpercaya.</p>
      <div class="flex gap-3">
        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-green-50">
          <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </div>
        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-green-50">
          <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" d="M8.56 2.75c4.37 6.03 6.02 9.42 8.03 17.72m2.54-15.38c-3.72 4.35-8.94 5.66-16.88 5.85m19.5 1.9c-3.5-.93-6.63-.82-8.94 0-2.58.92-5.01 2.86-7.44 6.32"/></svg>
        </div>
        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-green-50">
          <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
      </div>
    </div>
    <div>
      <h4 class="font-bold text-gray-800 mb-4 text-sm">Layanan Kami</h4>
      <div class="flex flex-col gap-2 text-gray-400 text-sm">
        <a href="#" class="hover:text-green-600">Pembersihan Rutin</a>
        <a href="#" class="hover:text-green-600">Deep Cleaning</a>
        <a href="#" class="hover:text-green-600">Cuci Kasur & Sofa</a>
        <a href="#" class="hover:text-green-600">Bersih Kamar Mandi</a>
      </div>
    </div>
    <div>
      <h4 class="font-bold text-gray-800 mb-4 text-sm">Perusahaan</h4>
      <div class="flex flex-col gap-2 text-gray-400 text-sm">
        <a href="#" class="hover:text-green-600">Tentang Kami</a>
        <a href="#" class="hover:text-green-600">Karier</a>
        <a href="#" class="hover:text-green-600">Hubungi Kami</a>
        <a href="#" class="hover:text-green-600">Pusat Bantuan</a>
      </div>
    </div>
    <div>
      <h4 class="font-bold text-gray-800 mb-4 text-sm">Legal</h4>
      <div class="flex flex-col gap-2 text-gray-400 text-sm">
        <a href="#" class="hover:text-green-600">Kebijakan Privasi</a>
        <a href="#" class="hover:text-green-600">Syarat & Ketentuan</a>
        <a href="#" class="hover:text-green-600">Cookies</a>
      </div>
    </div>
  </div>
  <div class="border-t border-gray-100 mt-10 pt-6 flex justify-between items-center">
    <p class="text-gray-400 text-xs">© 2024 BersihIn. The Pristine Sanctuary.</p>
    <p class="text-gray-400 text-xs">Bahasa Indonesia · IDR - Rupiah</p>
  </div>
</footer>

</body>
</html>