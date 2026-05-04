@extends('bersihin.layouts.app')

@section('page-title', 'Performa & Riwayat')
@section('page-subtitle', 'Pantau kemajuan layanan dan ulasan pelanggan Anda secara real-time.')

@section('content')

{{-- Header --}}
<div class="flex items-start justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Performa & Riwayat Saya</h1>
        <p class="text-sm text-gray-400 mt-0.5">Pantau kemajuan layanan dan ulasan pelanggan Anda secara real-time.</p>
    </div>
    <div class="flex items-center gap-2">
        <span class="text-xs text-gray-400">Periode:</span>
        <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 text-gray-600 focus:outline-none focus:border-emerald-400">
            <option>Januari 2024</option>
            <option>Februari 2024</option>
            <option>Maret 2024</option>
        </select>
    </div>
</div>

{{-- ===== 4 STATS CARDS ===== --}}
<div class="grid grid-cols-4 gap-4 mb-6">

    {{-- Card 1: Total Pesanan --}}
    <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-emerald-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 border border-emerald-200 px-2 py-0.5 rounded-full">+12% bln ini</span>
        </div>
        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Total Pesanan Selesai</p>
        <p class="text-3xl font-extrabold text-gray-900 mt-1">128</p>
    </div>

    {{-- Card 2: Rating --}}
    <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-amber-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </div>
            <div class="flex gap-0.5">
                @for($i = 0; $i < 5; $i++)
                <svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                @endfor
            </div>
        </div>
        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Rating Keseluruhan</p>
        <p class="text-3xl font-extrabold text-gray-900 mt-1">4.9 <span class="text-base font-semibold text-gray-400">/5</span></p>
    </div>

    {{-- Card 3: Efisiensi --}}
    <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-blue-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <div class="flex items-center gap-1 text-emerald-500">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                </svg>
                <span class="text-[10px] font-bold">Bagus</span>
            </div>
        </div>
        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Efisiensi Kerja</p>
        <p class="text-3xl font-extrabold text-gray-900 mt-1">96%</p>
    </div>

    {{-- Card 4: Klien Berulang --}}
    <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4">
        <div class="flex items-start justify-between mb-3">
            <div class="w-9 h-9 bg-purple-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Klien Berulang</p>
        <p class="text-3xl font-extrabold text-gray-900 mt-1">42</p>
    </div>

</div>

{{-- ===== GRAFIK + PENCAPAIAN ===== --}}
<div class="grid grid-cols-3 gap-4 mb-6">

    {{-- Grafik Mingguan --}}
    <div class="col-span-2 bg-white rounded-2xl border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="font-bold text-gray-800">Aktivitas Mingguan</h3>
                <p class="text-xs text-gray-400 mt-0.5">Jumlah tugas selesai per hari</p>
            </div>
            <div class="flex gap-1">
                <button class="px-3 py-1 bg-[#064E3B] text-white text-xs font-semibold rounded-full">Minggu Ini</button>
                <button class="px-3 py-1 text-gray-400 text-xs font-medium rounded-full hover:bg-gray-100">Bulan Ini</button>
            </div>
        </div>
        {{-- Bar Chart --}}
        <div class="flex items-end justify-between gap-2 h-28 px-2">
            @php
            $bars = [
                ['day' => 'Sen', 'val' => 60, 'count' => 3],
                ['day' => 'Sel', 'val' => 85, 'count' => 4],
                ['day' => 'Rab', 'val' => 100,'count' => 5],
                ['day' => 'Kam', 'val' => 70, 'count' => 3],
                ['day' => 'Jum', 'val' => 90, 'count' => 4],
                ['day' => 'Sab', 'val' => 50, 'count' => 2],
                ['day' => 'Min', 'val' => 30, 'count' => 1],
            ];
            @endphp
            @foreach($bars as $b)
            <div class="flex flex-col items-center gap-1 flex-1">
                <span class="text-[10px] font-bold text-gray-500">{{ $b['count'] }}</span>
                <div class="w-full rounded-t-lg {{ $b['day'] === 'Rab' ? 'bg-[#064E3B]' : 'bg-emerald-100' }}"
                     style="height: {{ $b['val'] }}%"></div>
                <span class="text-[10px] text-gray-400">{{ $b['day'] }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Pencapaian --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <h3 class="font-bold text-gray-800 mb-4">Pencapaian</h3>
        <div class="space-y-3">
            <div class="flex items-center gap-3 p-3 bg-amber-50 rounded-xl border border-amber-100">
                <div class="w-9 h-9 bg-amber-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-amber-700">Top Performer</p>
                    <p class="text-[10px] text-amber-500">Bulan Oktober 2024</p>
                </div>
            </div>
            <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-xl border border-blue-100">
                <div class="w-9 h-9 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-blue-700">100 Tugas Selesai</p>
                    <p class="text-[10px] text-blue-500">Milestone tercapai!</p>
                </div>
            </div>
            <div class="flex items-center gap-3 p-3 bg-emerald-50 rounded-xl border border-emerald-100">
                <div class="w-9 h-9 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-emerald-700">Zero Komplain</p>
                    <p class="text-[10px] text-emerald-500">30 hari berturut-turut</p>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ===== TABEL RIWAYAT AKTIVITAS ===== --}}
<div class="bg-white rounded-2xl border border-gray-100">

    {{-- Header Tabel --}}
    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
        <div>
            <h3 class="font-bold text-gray-800">Riwayat Aktivitas Layanan</h3>
            <p class="text-xs text-gray-400 mt-0.5">Seluruh riwayat tugas dan ulasan pelanggan Anda</p>
        </div>
        <div class="flex gap-2">
            <button class="flex items-center gap-1.5 px-3 py-2 border border-gray-200 rounded-lg text-xs font-semibold text-gray-500 hover:bg-gray-50">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                Filter
            </button>
            <button class="flex items-center gap-1.5 px-3 py-2 border border-gray-200 rounded-lg text-xs font-semibold text-gray-500 hover:bg-gray-50">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                </svg>
                Urutkan
            </button>
        </div>
    </div>

    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Tanggal & Jam</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Nama Pelanggan</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Jenis Layanan</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Rating</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Komentar</th>
                <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">

            @php
            $riwayat = [
                [
                    'tanggal'  => '22 Jan 2024',
                    'jam'      => '09:00 WIB',
                    'inisial'  => 'SR',
                    'warna'    => 'bg-blue-500',
                    'nama'     => 'Siti Rahma',
                    'layanan'  => 'Deep Cleaning',
                    'labelWarna' => 'bg-blue-100 text-blue-600',
                    'rating'   => 5.0,
                    'komentar' => 'Petugas sangat teliti dan sopan. Hasil kerja sangat memuaskan!',
                ],
                [
                    'tanggal'  => '20 Jan 2024',
                    'jam'      => '14:00 WIB',
                    'inisial'  => 'AF',
                    'warna'    => 'bg-emerald-500',
                    'nama'     => 'Ahmad Fauzi',
                    'layanan'  => 'Bersih Rutin',
                    'labelWarna' => 'bg-emerald-100 text-emerald-600',
                    'rating'   => 5.0,
                    'komentar' => 'Pengerjaan tepat waktu dan sangat profesional.',
                ],
                [
                    'tanggal'  => '18 Jan 2024',
                    'jam'      => '10:30 WIB',
                    'inisial'  => 'RD',
                    'warna'    => 'bg-purple-500',
                    'nama'     => 'Rina Dewi',
                    'layanan'  => 'Cuci Kasur',
                    'labelWarna' => 'bg-purple-100 text-purple-600',
                    'rating'   => 4.0,
                    'komentar' => 'Bersih dan wangi. Sedikit terlambat dari jadwal.',
                ],
                [
                    'tanggal'  => '15 Jan 2024',
                    'jam'      => '08:00 WIB',
                    'inisial'  => 'BK',
                    'warna'    => 'bg-amber-500',
                    'nama'     => 'Bambang K.',
                    'layanan'  => 'General Cleaning',
                    'labelWarna' => 'bg-amber-100 text-amber-600',
                    'rating'   => 5.0,
                    'komentar' => 'Luar biasa! Rumah jadi sangat bersih dan segar.',
                ],
                [
                    'tanggal'  => '12 Jan 2024',
                    'jam'      => '13:00 WIB',
                    'inisial'  => 'MP',
                    'warna'    => 'bg-pink-500',
                    'nama'     => 'Maya Putri',
                    'layanan'  => 'Cuci Sofa',
                    'labelWarna' => 'bg-pink-100 text-pink-600',
                    'rating'   => 4.5,
                    'komentar' => 'Sofa jadi bersih banget, petugas ramah dan cekatan.',
                ],
            ];
            @endphp

            @foreach($riwayat as $r)
            <tr class="hover:bg-gray-50/60 transition">
                <td class="px-5 py-4">
                    <p class="text-sm font-semibold text-gray-800">{{ $r['tanggal'] }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $r['jam'] }}</p>
                </td>
                <td class="px-5 py-4">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 {{ $r['warna'] }} rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                            {{ $r['inisial'] }}
                        </div>
                        <span class="text-sm font-semibold text-gray-800">{{ $r['nama'] }}</span>
                    </div>
                </td>
                <td class="px-5 py-4">
                    <span class="text-xs font-bold px-2.5 py-1 rounded-full {{ $r['labelWarna'] }}">
                        {{ $r['layanan'] }}
                    </span>
                </td>
                <td class="px-5 py-4">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span class="text-sm font-bold text-gray-800">{{ $r['rating'] }}</span>
                    </div>
                </td>
                <td class="px-5 py-4 max-w-xs">
                    <p class="text-sm text-gray-500 italic truncate">"{{ $r['komentar'] }}"</p>
                </td>
                <td class="px-5 py-4">
                    <button class="text-sm font-semibold text-[#064E3B] hover:underline">Detail</button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    {{-- Footer Pagination --}}
    <div class="flex items-center justify-between px-5 py-4 border-t border-gray-100">
        <p class="text-xs text-gray-400">Menampilkan 5 dari 128 pesanan</p>
        <div class="flex items-center gap-1">
            <button class="w-7 h-7 rounded-lg border border-gray-200 flex items-center justify-center hover:bg-gray-50">
                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="3" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button class="w-7 h-7 rounded-lg bg-[#064E3B] text-white text-xs font-bold">1</button>
            <button class="w-7 h-7 rounded-lg border border-gray-200 text-xs text-gray-500 hover:bg-gray-50">2</button>
            <button class="w-7 h-7 rounded-lg border border-gray-200 text-xs text-gray-500 hover:bg-gray-50">3</button>
            <button class="w-7 h-7 rounded-lg border border-gray-200 flex items-center justify-center hover:bg-gray-50">
                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="3" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>

</div>
</div>

@endsection