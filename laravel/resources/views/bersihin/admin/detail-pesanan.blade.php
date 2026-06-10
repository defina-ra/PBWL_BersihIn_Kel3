@extends('bersihin.layouts.app')
@section('page-title', 'Detail Pesanan')
@section('page-subtitle', 'Informasi lengkap pesanan pelanggan')

@section('content')
<div class="p-8">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="javascript:history.back()"
               class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center hover:bg-gray-50">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h1 class="text-xl font-bold text-gray-900">Detail Pesanan #BRS-{{ $booking->id }}</h1>
                <p class="text-sm text-gray-400 mt-0.5">Dibuat pada {{ \Carbon\Carbon::parse($booking->created_at)->format('d M Y, H:i') }} WIB</p>
            </div>
        </div>
    </div>

    {{-- PROGRESS STEPS --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between">
            @php
                $statuses = ['pending', 'confirmed', 'on_the_way', 'in_progress', 'done'];
                $currentIndex = array_search($booking->status, $statuses);
                if ($currentIndex === false) $currentIndex = 0;
            @endphp

            {{-- Pesanan Dibuat --}}
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 {{ $currentIndex >= 0 ? 'bg-green-700' : 'bg-gray-100' }} rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 {{ $currentIndex >= 0 ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold {{ $currentIndex >= 0 ? 'text-green-700' : 'text-gray-400' }}">Pesanan Dibuat</span>
            </div>
            <div class="flex-1 h-0.5 {{ $currentIndex >= 1 ? 'bg-green-600' : 'bg-gray-200' }} mx-4"></div>

            {{-- Pembayaran --}}
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 {{ $currentIndex >= 1 ? 'bg-green-700' : 'bg-gray-100' }} rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 {{ $currentIndex >= 1 ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold {{ $currentIndex >= 1 ? 'text-green-700' : 'text-gray-400' }}">Pembayaran Diverifikasi</span>
            </div>
            <div class="flex-1 h-0.5 {{ $currentIndex >= 2 ? 'bg-green-600' : 'bg-gray-200' }} mx-4"></div>

            {{-- Petugas --}}
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 {{ $currentIndex >= 2 ? 'bg-green-700' : 'bg-gray-100' }} rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 {{ $currentIndex >= 2 ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold {{ $currentIndex >= 2 ? 'text-green-700' : 'text-gray-400' }}">Petugas Ditugaskan</span>
            </div>
            <div class="flex-1 h-0.5 {{ $currentIndex >= 4 ? 'bg-green-600' : 'bg-gray-200' }} mx-4"></div>

            {{-- Selesai --}}
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 {{ $booking->status === 'done' ? 'bg-green-700' : 'bg-gray-100' }} rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 {{ $booking->status === 'done' ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold {{ $booking->status === 'done' ? 'text-green-700' : 'text-gray-400' }}">Selesai</span>
            </div>
        </div>
    </div>

    {{-- 3 CARDS ROW --}}
    <div class="grid grid-cols-3 gap-6 mb-6">

        {{-- Informasi Pelanggan --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-9 h-9 bg-green-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-800">Informasi Pelanggan</h3>
            </div>
            <div class="space-y-4">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Nama Lengkap</p>
                    <p class="font-bold text-gray-900">{{ $booking->customer_name }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Nomor Telepon</p>
                    <p class="font-bold text-gray-900">{{ $booking->customer_phone ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Alamat</p>
                    <p class="font-bold text-gray-900">{{ $booking->address }}</p>
                </div>
            </div>
        </div>

        {{-- Detail Layanan --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-9 h-9 bg-green-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-800">Detail Layanan</h3>
            </div>
            <div class="space-y-4">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Layanan</p>
                    <p class="font-bold text-gray-900">{{ $booking->service_name }}</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Jadwal</p>
                        <p class="font-bold text-gray-900">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Waktu</p>
                        <p class="font-bold text-gray-900">{{ $booking->booking_time }}</p>
                    </div>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Status</p>
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-bold
                        @if($booking->status === 'done') bg-green-100 text-green-700
                        @elseif($booking->status === 'confirmed') bg-blue-100 text-blue-700
                        @elseif($booking->status === 'pending') bg-amber-100 text-amber-700
                        @elseif($booking->status === 'cancelled') bg-red-100 text-red-600
                        @else bg-purple-100 text-purple-700
                        @endif">
                        {{ strtoupper($booking->status) }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Status Petugas --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-9 h-9 bg-orange-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-800">Status Petugas</h3>
            </div>
            @if($booking->petugas_name)
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="font-bold text-emerald-700 text-lg">{{ strtoupper(substr($booking->petugas_name, 0, 2)) }}</span>
                </div>
                <div>
                    <p class="font-bold text-gray-900">{{ $booking->petugas_name }}</p>
                    <p class="text-xs text-gray-400">{{ $booking->petugas_phone ?? '-' }}</p>
                </div>
            </div>
            <span class="w-full text-center block bg-green-50 text-green-700 text-xs font-semibold py-2 rounded-lg border border-green-200">
                Telah Ditugaskan
            </span>
            @else
            <div class="flex items-center justify-center h-24">
                <p class="text-sm text-gray-400 italic">Belum ada petugas ditugaskan</p>
            </div>
            @endif
        </div>

    </div>

    {{-- BOTTOM ROW --}}
    <div class="grid grid-cols-3 gap-6">

        {{-- Bukti Pembayaran --}}
        <div class="col-span-2 bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-blue-50 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800">Bukti Pembayaran</h3>
                </div>
                @if($payment)
                <span class="text-xs font-semibold px-3 py-1 rounded-full
                    {{ $payment->payment_status === 'paid' ? 'bg-green-100 text-green-700' : ($payment->payment_status === 'pending' ? 'bg-amber-100 text-amber-700' : 'bg-red-100 text-red-600') }}">
                    {{ strtoupper($payment->payment_status) }}
                </span>
                @endif
            </div>
            @if($payment)
            <div class="flex gap-6">
                <div class="w-32 h-32 bg-gray-100 rounded-xl flex items-center justify-center flex-shrink-0 border border-gray-200 overflow-hidden">
                    @if($payment->payment_proof)
                    <img src="{{ asset('storage/' . $payment->payment_proof) }}"
                         class="w-full h-full object-cover cursor-pointer"
                         onclick="window.open(this.src,'_blank')">
                    @else
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    @endif
                </div>
                <div class="flex-1">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Metode Pembayaran</p>
                            <p class="font-bold text-gray-900">{{ ucfirst($payment->payment_method) }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Total Pembayaran</p>
                            <p class="font-bold text-green-700 text-lg">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    @if($payment->payment_date)
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 flex gap-3">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Pembayaran Dikonfirmasi</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y, H:i') }} WIB</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @else
            <p class="text-sm text-gray-400 text-center py-8">Belum ada data pembayaran</p>
            @endif
        </div>

        {{-- Riwayat Aktivitas --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <h3 class="font-semibold text-gray-800 mb-5">Riwayat Aktivitas</h3>
            <div class="space-y-4">
                @if($booking->status === 'done')
                <div class="flex gap-3">
                    <div class="w-2.5 h-2.5 bg-green-600 rounded-full mt-1.5 flex-shrink-0"></div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Layanan Selesai ✅</p>
                        <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($booking->updated_at)->format('d M, H:i') }}</p>
                    </div>
                </div>
                @endif
                @if($booking->petugas_name)
                <div class="flex gap-3">
                    <div class="w-2.5 h-2.5 bg-green-600 rounded-full mt-1.5 flex-shrink-0"></div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Petugas Ditugaskan</p>
                        <p class="text-xs text-gray-400">{{ $booking->petugas_name }}</p>
                    </div>
                </div>
                @endif
                @if($payment && $payment->payment_status === 'paid')
                <div class="flex gap-3">
                    <div class="w-2.5 h-2.5 bg-green-600 rounded-full mt-1.5 flex-shrink-0"></div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Pembayaran Dikonfirmasi</p>
                        <p class="text-xs text-gray-400">{{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('d M, H:i') : '-' }}</p>
                    </div>
                </div>
                @endif
                <div class="flex gap-3">
                    <div class="w-2.5 h-2.5 bg-green-600 rounded-full mt-1.5 flex-shrink-0"></div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Pesanan Dibuat</p>
                        <p class="text-xs text-gray-400">{{ $booking->customer_name }} · {{ \Carbon\Carbon::parse($booking->created_at)->format('d M, H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection