@extends('bersihin.layouts.app')

@section('page-title', 'Jadwal Kerja Saya')
@section('page-subtitle', 'Kelola jadwal tugasmu')

@section('content')

{{-- Header --}}
<div class="flex items-start justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Jadwal Kerja Saya</h1>
        <p class="text-sm text-gray-400 mt-0.5">Kelola dan lihat jadwal pembersihan harian Anda dengan mudah.</p>
    </div>
    <div class="flex items-center gap-3">
        <div class="bg-emerald-50 border border-emerald-200 rounded-xl px-4 py-2 text-center">
            <p class="text-[10px] text-emerald-600 font-bold uppercase tracking-wide">Total Tugas</p>
            <p class="text-xl font-extrabold text-[#064E3B]">{{ $jadwal->count() }}</p>
        </div>
        <div class="bg-blue-50 border border-blue-100 rounded-xl px-4 py-2 text-center">
            <p class="text-[10px] text-blue-500 font-bold uppercase tracking-wide">Selesai</p>
            <p class="text-xl font-extrabold text-blue-600">{{ $jadwal->where('status', 'done')->count() }}</p>
        </div>
        <div class="bg-amber-50 border border-amber-100 rounded-xl px-4 py-2 text-center">
            <p class="text-[10px] text-amber-500 font-bold uppercase tracking-wide">Menunggu</p>
            <p class="text-xl font-extrabold text-amber-600">{{ $jadwal->whereIn('status', ['confirmed', 'pending'])->count() }}</p>
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
    @forelse($jadwal as $j)
    <div class="bg-white rounded-2xl border border-gray-100 p-5 flex items-center gap-5 hover:shadow-sm transition {{ $j->status === 'done' ? 'opacity-75 bg-gray-50' : '' }}">
        <div class="text-center w-14 flex-shrink-0">
            <p class="text-sm font-extrabold {{ $j->status === 'done' ? 'text-gray-400' : 'text-gray-900' }}">
                {{ \Carbon\Carbon::parse($j->booking_time)->format('H:i') }}
            </p>
            <div class="w-px h-8 bg-gray-200 mx-auto my-1"></div>
            <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($j->booking_date)->format('d M') }}</p>
        </div>
        <div class="w-1 h-16 rounded-full {{ $j->status === 'done' ? 'bg-gray-300' : 'bg-emerald-500' }} flex-shrink-0"></div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-1.5">
                @if($j->status === 'done')
                    <span class="text-[10px] font-bold text-gray-400 bg-gray-200 px-2.5 py-1 rounded-full uppercase tracking-wide">Selesai</span>
                @elseif($j->status === 'confirmed')
                    <span class="text-[10px] font-bold text-emerald-600 bg-emerald-100 px-2.5 py-1 rounded-full uppercase tracking-wide">Mendatang</span>
                @elseif($j->status === 'pending')
                    <span class="text-[10px] font-bold text-amber-500 bg-amber-50 px-2.5 py-1 rounded-full uppercase tracking-wide">Pending</span>
                @else
                    <span class="text-[10px] font-bold text-blue-600 bg-blue-100 px-2.5 py-1 rounded-full uppercase tracking-wide">{{ ucfirst($j->status) }}</span>
                @endif
                <div class="flex items-center gap-1 text-gray-400">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="text-xs text-gray-400">{{ Str::limit($j->address, 30) }}</span>
                </div>
            </div>
            <p class="font-bold {{ $j->status === 'done' ? 'text-gray-500' : 'text-gray-900' }}">{{ $j->customer_name }}</p>
            <p class="text-sm text-gray-400 mt-0.5">{{ $j->service_name }}</p>
        </div>
        <button class="flex-shrink-0 flex items-center gap-2 {{ $j->status === 'done' ? 'border border-gray-200 text-gray-400' : 'bg-[#064E3B] text-white' }} text-sm font-semibold px-5 py-2.5 rounded-xl hover:opacity-80 transition">
            @if($j->status !== 'done')
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            Lihat Detail Tugas
            @else
            Detail Riwayat
            @endif
        </button>
    </div>
    @empty
    <div class="bg-white rounded-2xl border border-gray-100 p-8 text-center">
        <p class="text-gray-400 text-sm">Belum ada jadwal tugas</p>
    </div>
    @endforelse
</div>

{{-- ===== TIPS + RATING ===== --}}
<div class="grid grid-cols-2 gap-4">
    <div class="relative rounded-2xl overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#064E3B] to-emerald-700"></div>
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
            </p>
            <div class="mt-4 flex items-center gap-2">
                <div class="w-1.5 h-1.5 bg-green-300 rounded-full"></div>
                <p class="text-green-300 text-xs font-semibold">Tips diperbarui setiap hari</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Progress Tugas</p>
                <p class="text-2xl font-extrabold text-gray-900">{{ $jadwal->where('status','done')->count() }} <span class="text-base font-semibold text-gray-400">/ {{ $jadwal->count() }}</span></p>
            </div>
        </div>
        <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
            @php $pct = $jadwal->count() > 0 ? ($jadwal->where('status','done')->count() / $jadwal->count()) * 100 : 0; @endphp
            <div class="h-2 bg-[#064E3B] rounded-full" style="width: {{ $pct }}%"></div>
        </div>
        <p class="text-xs text-gray-400 mt-2">{{ round($pct) }}% tugas selesai</p>
    </div>
</div>

@endsection
