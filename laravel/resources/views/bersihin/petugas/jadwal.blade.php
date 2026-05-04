@extends('bersihin.layouts.app')

@section('page-title', 'Jadwal Kerja Saya')
@section('page-subtitle', 'Rabu, 24 April 2026')

@section('content')

{{-- Header --}}
<div class="flex items-start justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Jadwal Kerja Saya</h1>
        <p class="text-sm text-gray-400 mt-0.5">Kelola dan lihat jadwal pembersihan harian Anda dengan mudah.</p>
    </div>
    {{-- Summary badge hari ini --}}
    <div class="flex items-center gap-3">
        <div class="bg-emerald-50 border border-emerald-200 rounded-xl px-4 py-2 text-center">
            <p class="text-[10px] text-emerald-600 font-bold uppercase tracking-wide">Tugas Hari Ini</p>
            <p class="text-xl font-extrabold text-[#064E3B]">3</p>
        </div>
        <div class="bg-blue-50 border border-blue-100 rounded-xl px-4 py-2 text-center">
            <p class="text-[10px] text-blue-500 font-bold uppercase tracking-wide">Selesai</p>
            <p class="text-xl font-extrabold text-blue-600">1</p>
        </div>
        <div class="bg-amber-50 border border-amber-100 rounded-xl px-4 py-2 text-center">
            <p class="text-[10px] text-amber-500 font-bold uppercase tracking-wide">Jam Kerja</p>
            <p class="text-xl font-extrabold text-amber-600">6 Jam</p>
        </div>
    </div>
</div>

{{-- ===== KALENDER MINGGUAN ===== --}}
<div class="bg-white rounded-2xl border border-gray-100 px-6 py-4 mb-6">
    <div class="flex items-center justify-between">

        <button class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center hover:bg-gray-50 transition">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <div class="flex gap-2 flex-1 justify-center">
            @php
            $days = [
                ['day' => 'MON', 'date' => '22', 'active' => false, 'hasTugas' => false],
                ['day' => 'TUE', 'date' => '23', 'active' => false, 'hasTugas' => true],
                ['day' => 'WED', 'date' => '24', 'active' => true,  'hasTugas' => true],
                ['day' => 'THU', 'date' => '25', 'active' => false, 'hasTugas' => true],
                ['day' => 'FRI', 'date' => '26', 'active' => false, 'hasTugas' => false],
                ['day' => 'SAT', 'date' => '27', 'active' => false, 'hasTugas' => true],
                ['day' => 'SUN', 'date' => '28', 'active' => false, 'hasTugas' => false],
            ];
            @endphp

            @foreach($days as $d)
            <button class="flex flex-col items-center px-4 py-2.5 rounded-xl transition
                {{ $d['active'] ? 'bg-[#064E3B] text-white' : 'hover:bg-gray-50 text-gray-500' }}">
                <span class="text-[10px] font-bold tracking-widest {{ $d['active'] ? 'text-green-300' : 'text-gray-400' }}">
                    {{ $d['day'] }}
                </span>
                <span class="text-base font-extrabold mt-0.5">{{ $d['date'] }}</span>
                {{-- Dot tugas --}}
                @if($d['hasTugas'])
                <span class="w-1.5 h-1.5 rounded-full mt-1 {{ $d['active'] ? 'bg-green-300' : 'bg-emerald-400' }}"></span>
                @else
                <span class="w-1.5 h-1.5 mt-1"></span>
                @endif
            </button>
            @endforeach
        </div>

        <button class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center hover:bg-gray-50 transition">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

    </div>
</div>

{{-- ===== DAFTAR TUGAS ===== --}}
<div class="space-y-3 mb-6">

    {{-- Tugas 1 - Mendatang (Prioritas) --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-5 flex items-center gap-5 hover:shadow-sm transition">
        {{-- Waktu --}}
        <div class="text-center w-14 flex-shrink-0">
            <p class="text-sm font-extrabold text-gray-900">13:00</p>
            <div class="w-px h-8 bg-gray-200 mx-auto my-1"></div>
            <p class="text-xs text-gray-400">15:00</p>
        </div>

        {{-- Garis status --}}
        <div class="w-1 h-16 rounded-full bg-emerald-500 flex-shrink-0"></div>

        {{-- Info Tugas --}}
        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-1.5">
                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-100 px-2.5 py-1 rounded-full uppercase tracking-wide">
                    Mendatang
                </span>
                <span class="text-[10px] font-bold text-amber-500 bg-amber-50 px-2.5 py-1 rounded-full uppercase tracking-wide">
                    Prioritas
                </span>
                <div class="flex items-center gap-1 text-gray-400">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="text-xs text-gray-400">Jakarta Selatan</span>
                </div>
            </div>
            <p class="font-bold text-gray-900">Siti Rahma</p>
            <p class="text-sm text-gray-400 mt-0.5">Deep Cleaning Service • Unit Apartemen 2BR</p>
        </div>

        {{-- Tombol --}}
        <button class="flex-shrink-0 flex items-center gap-2 bg-[#064E3B] text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-emerald-800 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            Lihat Detail Tugas
        </button>
    </div>

    {{-- Tugas 2 - Mendatang --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-5 flex items-center gap-5 hover:shadow-sm transition">
        <div class="text-center w-14 flex-shrink-0">
            <p class="text-sm font-extrabold text-gray-900">16:00</p>
            <div class="w-px h-8 bg-gray-200 mx-auto my-1"></div>
            <p class="text-xs text-gray-400">18:00</p>
        </div>
        <div class="w-1 h-16 rounded-full bg-emerald-500 flex-shrink-0"></div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-1.5">
                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-100 px-2.5 py-1 rounded-full uppercase tracking-wide">
                    Mendatang
                </span>
                <div class="flex items-center gap-1">
                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="text-xs text-gray-400">Menteng, Jakarta Pusat</span>
                </div>
            </div>
            <p class="font-bold text-gray-900">Budi Santoso</p>
            <p class="text-sm text-gray-400 mt-0.5">Eco-Friendly Sweep • Rumah Tinggal</p>
        </div>
        <button class="flex-shrink-0 flex items-center gap-2 bg-[#064E3B] text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-emerald-800 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            Lihat Detail Tugas
        </button>
    </div>

    {{-- Tugas 3 - Selesai --}}
    <div class="bg-gray-50 rounded-2xl border border-gray-100 p-5 flex items-center gap-5 opacity-75">
        <div class="text-center w-14 flex-shrink-0">
            <p class="text-sm font-extrabold text-gray-400">09:00</p>
            <div class="w-px h-8 bg-gray-200 mx-auto my-1"></div>
            <p class="text-xs text-gray-300">11:00</p>
        </div>
        <div class="w-1 h-16 rounded-full bg-gray-300 flex-shrink-0"></div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-1.5">
                <span class="text-[10px] font-bold text-gray-400 bg-gray-200 px-2.5 py-1 rounded-full uppercase tracking-wide">
                    Selesai
                </span>
                <div class="flex items-center gap-1">
                    <svg class="w-3 h-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-xs text-gray-400">Selesai tepat waktu</span>
                </div>
            </div>
            <p class="font-bold text-gray-500">Lia Amalia</p>
            <p class="text-sm text-gray-400 mt-0.5">General Cleaning • Studio Room</p>
        </div>
        <button class="flex-shrink-0 border border-gray-200 text-gray-400 text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-white transition">
            Detail Riwayat
        </button>
    </div>

</div>

{{-- ===== TIPS + RATING ===== --}}
<div class="grid grid-cols-2 gap-4">

    {{-- Tips Performa --}}
    <div class="relative rounded-2xl overflow-hidden">
        {{-- Background foto --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#064E3B] to-emerald-700">
            <img
                src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80"
                alt="Cleaning"
                class="w-full h-full object-cover opacity-20 mix-blend-overlay"
                onerror="this.style.display='none'"
            >
        </div>
        {{-- Konten --}}
        <div class="relative z-10 p-6">
            <div class="flex items-center gap-2 mb-3">
                <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <p class="text-white font-bold text-sm">Tips Performa Hari Ini</p>
            </div>
            <p class="text-green-100 text-sm leading-relaxed">
                Ketepatan waktu dan dokumentasi foto <span class="font-bold text-white">'Sebelum & Sesudah'</span>
                adalah kunci utama kepuasan pelanggan dan rating performa Anda.
                Pastikan selalu menggunakan seragam lengkap.
            </p>
            <div class="mt-4 flex items-center gap-2">
                <div class="w-1.5 h-1.5 bg-green-300 rounded-full"></div>
                <p class="text-green-300 text-xs font-semibold">Tips diperbarui setiap hari</p>
            </div>
        </div>
    </div>

    {{-- Rating Card --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Rating Anda</p>
                <p class="text-2xl font-extrabold text-gray-900">4.9 <span class="text-base font-semibold text-gray-400">/ 5.0</span></p>
            </div>
        </div>

        {{-- Bintang --}}
        <div class="flex gap-1 mb-3">
            @for($i = 0; $i < 5; $i++)
            <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
            </svg>
            @endfor
        </div>

        <p class="text-sm text-gray-500 leading-relaxed">
            Terus pertahankan kualitas kerja Anda untuk mendapatkan
            <span class="font-semibold text-[#064E3B]">bonus insentif bulanan!</span>
        </p>

        {{-- Progress bar --}}
        <div class="mt-4">
            <div class="flex justify-between text-xs text-gray-400 mb-1">
                <span>Progress bulan ini</span>
                <span class="font-semibold text-[#064E3B]">24 / 30 tugas</span>
            </div>
            <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                <div class="h-2 bg-[#064E3B] rounded-full" style="width: 80%"></div>
            </div>
        </div>
    </div>

</div>

@endsection