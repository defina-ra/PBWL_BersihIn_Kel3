@extends('bersihin.layouts.app')
@section('page-title', 'Overview Dashboard')
@section('page-subtitle', 'Pantau performa layanan BersihIn hari ini')

@section('content')

{{-- Header --}}
<div class="flex items-start justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Overview Dashboard</h1>
        <p class="text-sm text-gray-400 mt-0.5">Pantau performa layanan BersihIn hari ini.</p>
    </div>
    <div class="flex gap-2">
        <a href="/bersihin/admin/laporan" 
   class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 inline-block">
    Unduh Laporan
</a>
<a href="/bersihin/admin/petugas" 
   class="px-4 py-2 bg-[#064E3B] text-white rounded-lg text-sm font-semibold hover:bg-emerald-800 inline-block">
    Tambah Petugas
</a>
    </div>
</div>

{{-- ===== 4 STATS CARDS ===== --}}
<div class="grid grid-cols-4 gap-4 mb-6">

    {{-- Card 1: Total Pendapatan --}}
    <div class="bg-white rounded-xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-emerald-50 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
            </div>
            <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">+12.5%</span>
        </div>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Total Pendapatan</p>
        <p class="text-2xl font-extrabold text-gray-900 mt-1">Rp 42.500.000</p>
    </div>

    {{-- Card 2: Perlu Verifikasi --}}
    <div class="bg-white rounded-xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-red-50 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <span class="text-xs font-semibold text-red-500 bg-red-50 px-2 py-0.5 rounded-full">6</span>
        </div>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Perlu Verifikasi</p>
        <p class="text-2xl font-extrabold text-gray-900 mt-1">12 Transaksi</p>
    </div>

    {{-- Card 3: Belum Dijadwalkan --}}
    <div class="bg-white rounded-xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Belum Dijadwalkan</p>
        <p class="text-2xl font-extrabold text-gray-900 mt-1">8 Pesanan</p>
    </div>

    {{-- Card 4: Petugas Aktif --}}
    <div class="bg-white rounded-xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-purple-50 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Petugas Aktif</p>
        <p class="text-2xl font-extrabold text-gray-900 mt-1">25 Orang</p>
    </div>

</div>

{{-- ===== CHART + PETUGAS STANDBY ===== --}}
<div class="grid grid-cols-3 gap-4 mb-6">

    {{-- Chart Pendapatan Mingguan --}}
    <div class="col-span-2 bg-white rounded-xl border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-bold text-gray-800">Pendapatan Mingguan</h2>
            <div class="flex gap-1">
                <button class="px-3 py-1 bg-[#064E3B] text-white text-xs font-semibold rounded-full">Weekly</button>
                <button class="px-3 py-1 text-gray-400 text-xs font-medium rounded-full hover:bg-gray-100">Monthly</button>
            </div>
        </div>
        {{-- Chart Visual (SVG sederhana) --}}
        <div class="relative h-44">
            <svg viewBox="0 0 500 140" class="w-full h-full" preserveAspectRatio="none">
                {{-- Background bars --}}
                <rect x="20"  y="60"  width="40" height="70" rx="4" fill="#D1FAE5" opacity="0.7"/>
                <rect x="90"  y="50"  width="40" height="80" rx="4" fill="#D1FAE5" opacity="0.7"/>
                <rect x="160" y="30"  width="40" height="100" rx="4" fill="#D1FAE5" opacity="0.7"/>
                <rect x="230" y="45"  width="40" height="85" rx="4" fill="#D1FAE5" opacity="0.7"/>
                <rect x="300" y="20"  width="40" height="110" rx="4" fill="#6EE7B7" opacity="0.9"/>
                <rect x="370" y="55"  width="40" height="75" rx="4" fill="#D1FAE5" opacity="0.7"/>
                <rect x="440" y="40"  width="40" height="90" rx="4" fill="#D1FAE5" opacity="0.7"/>
                {{-- Garis trend --}}
                <polyline
                    points="40,55 110,45 180,25 250,40 320,15 390,50 460,35"
                    fill="none" stroke="#064E3B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                {{-- Titik aktif --}}
                <circle cx="320" cy="15" r="4" fill="#064E3B"/>
                <circle cx="320" cy="15" r="7" fill="#064E3B" opacity="0.2"/>
            </svg>
            {{-- Label hari --}}
            <div class="flex justify-between px-2 mt-1">
                @foreach(['Sen','Sel','Rab','Kam','Jum','Sab','Min'] as $day)
                <span class="text-[11px] text-gray-400">{{ $day }}</span>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Petugas Standby --}}
    <div class="bg-white rounded-xl border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-bold text-gray-800">Petugas Standby</h2>
            <button class="text-gray-400 hover:text-gray-600">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                </svg>
            </button>
        </div>

        <div class="space-y-3">
            @php
            $petugas = [
                ['nama' => 'Andi Saputra',  'keahlian' => 'General Cleaning', 'inisial' => 'AS', 'warna' => 'bg-blue-500'],
                ['nama' => 'Maya Indah',    'keahlian' => 'Deep Cleaning',    'inisial' => 'MI', 'warna' => 'bg-pink-500'],
                ['nama' => 'Budi Darsono',  'keahlian' => 'Disinfeksi',       'inisial' => 'BD', 'warna' => 'bg-amber-500'],
                ['nama' => 'Sinta Kirana',  'keahlian' => 'Cuci Sofa/Kasur',  'inisial' => 'SK', 'warna' => 'bg-purple-500'],
            ];
            @endphp

            @foreach($petugas as $p)
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 {{ $p['warna'] }} rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0">
                        {{ $p['inisial'] }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800 leading-none">{{ $p['nama'] }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $p['keahlian'] }}</p>
                    </div>
                </div>
                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full uppercase tracking-wide">Ready</span>
            </div>
            @endforeach
        </div>

        <button class="mt-4 w-full border border-gray-200 text-sm text-gray-500 font-medium py-2 rounded-lg hover:bg-gray-50">
            Lihat Semua Petugas
        </button>
    </div>

</div>

{{-- ===== TABEL PESANAN TERBARU ===== --}}
<div class="bg-white rounded-xl border border-gray-100">
    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
        <h2 class="font-bold text-gray-800">Pesanan Terbaru</h2>
        <div class="flex gap-2">
            <button class="p-1.5 rounded-lg hover:bg-gray-100">
                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
            </button>
            <button class="p-1.5 rounded-lg hover:bg-gray-100">
                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
            </button>
        </div>
    </div>

    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">ID Pesanan</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Layanan</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Status Pembayaran</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">

            @php
            $pesanan = [
                ['id' => '#BRS-201', 'layanan' => 'Deep Cleaning',       'detail' => 'Pavel Apartemen · Studio', 'status' => 'Success'],
                ['id' => '#BRS-202', 'layanan' => 'Cuci Kasur & Sofa',   'detail' => '3 Kasur King Size',        'status' => 'Pending'],
                ['id' => '#BRS-203', 'layanan' => 'Disinfeksi',          'detail' => 'Gedung Kantor · 3 Lantai', 'status' => 'Success'],
                ['id' => '#BRS-204', 'layanan' => 'General Cleaning',    'detail' => 'Standar · 4 Jam',          'status' => 'Pending'],
            ];
            @endphp

            @foreach($pesanan as $p)
            <tr class="hover:bg-gray-50/50">
                <td class="px-5 py-3.5 text-sm font-semibold text-[#064E3B]">{{ $p['id'] }}</td>
                <td class="px-5 py-3.5">
                    <p class="text-sm font-semibold text-gray-800">{{ $p['layanan'] }}</p>
                    <p class="text-xs text-gray-400">{{ $p['detail'] }}</p>
                </td>
                <td class="px-5 py-3.5">
                    @if($p['status'] === 'Success')
                        <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">Success</span>
                    @else
                        <span class="text-xs font-semibold text-amber-500 bg-amber-50 px-3 py-1 rounded-full">Pending</span>
                    @endif
                </td>
                <td class="px-5 py-3.5">
                    <a href="/bersihin/admin/detail-pesanan" 
              class="px-4 py-1.5 bg-[#064E3B] text-white text-xs font-semibold rounded-lg hover:bg-emerald-800 inline-block">
                 Lihat Detail
                </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>


@endsection