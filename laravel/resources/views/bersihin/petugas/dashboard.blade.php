@extends('bersihin.layouts.app')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Kamis, 30 April 2026')

@section('content')

{{-- GREETING --}}
<div class="mb-6">
  <h1 class="text-2xl font-extrabold text-gray-900">Halo, Larasati! 👋</h1>
  <p class="text-gray-400 text-sm mt-1">Semangat bertugas hari ini. Kamu punya <span class="text-[#064E3B] font-bold">3 tugas</span> yang menanti.</p>
</div>

{{-- STATS 3 CARDS --}}
<div class="grid grid-cols-3 gap-4 mb-6">
  <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4 flex items-center justify-between">
    <div>
      <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold mb-1">Sisa Tugas Hari Ini</p>
      <p class="text-3xl font-extrabold text-gray-900">3</p>
    </div>
    <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center">
      <svg class="w-6 h-6 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
      </svg>
    </div>
  </div>
  <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4 flex items-center justify-between">
    <div>
      <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold mb-1">Total Selesai</p>
      <p class="text-3xl font-extrabold text-gray-900">1</p>
    </div>
    <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center">
      <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
    </div>
  </div>
  <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4 flex items-center justify-between">
    <div>
      <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold mb-1">Poin Bonus</p>
      <p class="text-3xl font-extrabold text-gray-900">50</p>
    </div>
    <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center">
      <svg class="w-6 h-6 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
      </svg>
    </div>
  </div>
</div>

{{-- TUGAS SELANJUTNYA + MAP --}}
<div class="grid grid-cols-2 gap-6 mb-6">

  {{-- Tugas Selanjutnya --}}
  <div class="bg-white rounded-2xl border border-gray-100 p-6">
    <div class="flex items-center justify-between mb-5">
      <div class="flex items-center gap-3">
        <div class="w-9 h-9 bg-green-50 rounded-xl flex items-center justify-center">
          <svg class="w-5 h-5 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" d="M12 6v6l4 2"/>
          </svg>
        </div>
        <h3 class="font-bold text-gray-900">Tugas Selanjutnya</h3>
      </div>
      <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full tracking-wide">PRIORITAS</span>
    </div>

    <div class="space-y-4">
      <div>
        <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold mb-1">Layanan</p>
        <p class="font-bold text-gray-900">Deep Cleaning – Kitchen & Living Room</p>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold mb-1">Pelanggan</p>
          <div class="flex items-center gap-1.5">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <p class="font-semibold text-gray-800">Ibu Ratna</p>
          </div>
        </div>
        <div>
          <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold mb-1">Waktu</p>
          <div class="flex items-center gap-1.5">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" d="M12 6v6l4 2"/>
            </svg>
            <p class="font-semibold text-gray-800">13:00 – 15:00 WIB</p>
          </div>
        </div>
      </div>
      <div>
        <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold mb-1">Alamat</p>
        <div class="flex items-start gap-1.5">
          <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
          </svg>
          <p class="text-gray-700 text-sm">Jl. Melati No. 45, Kebayoran Baru, Jakarta Selatan, DKI Jakarta</p>
        </div>
      </div>
    </div>

    <a href="/bersihin/petugas/jadwal"
       class="mt-6 flex items-center justify-center gap-2 w-full bg-[#064E3B] hover:bg-emerald-800 text-white font-bold py-3.5 rounded-xl text-sm transition">
      Lihat Jadwal Lengkap
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
      </svg>
    </a>
  </div>

  {{-- Peta --}}
  <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="relative h-full min-h-64 bg-gray-100 flex items-center justify-center">
      {{-- Simulasi peta --}}
      <div class="absolute inset-0 bg-gradient-to-br from-gray-100 to-gray-200">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(0deg,transparent,transparent 39px,#e5e7eb 39px,#e5e7eb 40px),repeating-linear-gradient(90deg,transparent,transparent 39px,#e5e7eb 39px,#e5e7eb 40px);"></div>
      </div>
      {{-- Tombol zoom --}}
      <div class="absolute top-4 right-4 flex flex-col gap-1">
        <button class="w-7 h-7 bg-white rounded-lg shadow flex items-center justify-center text-gray-600 font-bold hover:bg-gray-50">+</button>
        <button class="w-7 h-7 bg-white rounded-lg shadow flex items-center justify-center text-gray-600 font-bold hover:bg-gray-50">−</button>
      </div>
      {{-- Pin lokasi --}}
      <div class="relative z-10 flex flex-col items-center">
        <div class="w-10 h-10 bg-[#064E3B] rounded-full flex items-center justify-center shadow-lg">
          <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
          </svg>
        </div>
        <div class="mt-2 bg-white text-xs font-semibold text-gray-700 px-3 py-1.5 rounded-full shadow">
          Jl. Melati No. 45
        </div>
      </div>
      {{-- Info jarak --}}
      <div class="absolute bottom-4 left-4 bg-white rounded-xl px-4 py-2.5 shadow flex items-center gap-2">
        <svg class="w-4 h-4 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-width="2" d="M13 6h3l3 5v3h-2m-4-8H5v11h2m4-11v11"/>
        </svg>
        <span class="text-xs font-semibold text-gray-700">8 menit dari lokasi Anda</span>
      </div>
    </div>
  </div>

</div>

{{-- CATATAN + BANTUAN --}}
<div class="grid grid-cols-3 gap-6">

  {{-- Catatan Pelanggan --}}
  <div class="col-span-2 bg-white rounded-2xl border border-gray-100 p-6">
    <div class="flex items-center justify-between mb-4">
      <h3 class="font-bold text-gray-900">Catatan Khusus Pelanggan</h3>
      <button class="text-gray-400 hover:text-gray-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
        </svg>
      </button>
    </div>
    <div class="border-l-4 border-[#064E3B] pl-4 bg-green-50/50 py-3 pr-4 rounded-r-xl">
      <p class="text-gray-600 text-sm italic leading-relaxed">
        "Tolong perhatikan area kolong sofa dan ventilasi AC. Ibu Ratna lebih suka menggunakan pembersih aroma lavender jika tersedia."
      </p>
    </div>
  </div>

  {{-- Bantuan Cepat --}}
  <div class="bg-white rounded-2xl border border-gray-100 p-6">
    <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold mb-4">Bantuan Cepat</p>
    <div class="space-y-2">
      <a href="#" class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition group">
        <div class="flex items-center gap-3">
          <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center">
            <svg class="w-4 h-4 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
          </div>
          <span class="text-sm font-semibold text-gray-700">Hubungi Admin</span>
        </div>
        <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </a>
      <a href="#" class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition group">
        <div class="flex items-center gap-3">
          <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <span class="text-sm font-semibold text-gray-700">Panduan SOP</span>
        </div>
        <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </a>
    </div>
  </div>

</div>

@endsection