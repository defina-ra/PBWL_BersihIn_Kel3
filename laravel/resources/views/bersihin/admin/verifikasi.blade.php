@extends('bersihin.layouts.app')
@section('page-title', 'Verifikasi Pembayaran')
@section('page-subtitle', 'Kelola dan verifikasi bukti transfer pelanggan')

@section('content')

<div class="flex gap-5 h-full">

    {{-- ===== KOLOM KIRI: Antrean Verifikasi ===== --}}
    <div class="flex-1">

        {{-- Header --}}
        <div class="mb-5">
            <h1 class="text-xl font-bold text-gray-900">Verifikasi Pembayaran</h1>
            <p class="text-sm text-gray-400 mt-0.5">Kelola dan verifikasi bukti transfer pembayaran layanan pelanggan.</p>
        </div>

        {{-- Card Tabel --}}
        <div class="bg-white rounded-xl border border-gray-100">

            {{-- Header Tabel --}}
            <div class="flex items-center justify-between px-5 py-3.5 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800 text-sm">Antrean Verifikasi</h2>
                <span class="text-xs font-bold text-amber-500 bg-amber-50 px-3 py-1 rounded-full">
                    4 Pending
                </span>
            </div>

            {{-- Tabel --}}
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Tanggal & Jam</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">ID Pesanan</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Customer</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Nominal</th>
                        <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">

                    @forelse($antrean as $item)
<tr class="cursor-pointer hover:bg-gray-50/60">
    <td class="px-5 py-3.5">
        <p class="text-sm text-gray-700 font-medium">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</p>
        <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }} WIB</p>
    </td>
    <td class="px-5 py-3.5">
        <span class="text-sm font-bold text-[#064E3B]">#BRS-{{ $item->id }}</span>
    </td>
    <td class="px-5 py-3.5">
        <span class="text-sm text-gray-700">{{ $item->customer_name }}</span>
    </td>
    <td class="px-5 py-3.5">
        <span class="text-sm font-semibold text-gray-800">Rp {{ number_format($item->amount, 0, ',', '.') }}</span>
    </td>
    <td class="px-5 py-3.5">
        <span class="text-xs font-semibold text-amber-500 bg-amber-50 border border-amber-200 px-2.5 py-1 rounded-full">
            ● Pending
        </span>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="px-5 py-8 text-center text-sm text-gray-400">Tidak ada antrean verifikasi</td>
</tr>
@endforelse

                </tbody>
            </table>
        </div>
    </div>

    {{-- ===== KOLOM KANAN: Review Pembayaran ===== --}}
    <div class="w-80 shrink-0">
        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">

            {{-- Header --}}
            <div class="px-5 py-3.5 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800 text-sm">Review Pembayaran</h2>
            </div>

            {{-- Preview Bukti Transfer --}}
            <div class="p-4">
                <div class="bg-gray-100 rounded-lg overflow-hidden aspect-video flex items-center justify-center relative">
                    {{-- Simulasi preview gambar bukti --}}
                    <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex flex-col items-center justify-center gap-2">
                        <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-xs text-gray-400 font-medium">Bukti Transfer</p>
                        <span class="text-[10px] text-gray-400 bg-white/60 px-2 py-0.5 rounded">1280 × 1024</span>
                    </div>

                    {{-- Thumbnail kecil pojok kiri bawah --}}
                    <div class="absolute bottom-2 left-2 w-12 h-12 bg-white rounded border-2 border-[#064E3B] shadow flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#064E3B]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                </div>

                {{-- Navigasi gambar --}}
                <div class="flex items-center justify-center gap-2 mt-2">
                    <button class="w-6 h-6 rounded-full bg-[#064E3B] text-white flex items-center justify-center">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <span class="text-xs text-gray-400">1 / 2</span>
                    <button class="w-6 h-6 rounded-full border border-gray-200 flex items-center justify-center">
                        <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Detail Pesanan --}}
            <div class="px-5 pb-4 space-y-3 border-t border-gray-100 pt-4">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide">ID Pesanan</span>
                    <span class="text-sm font-bold text-[#064E3B]">#BSN-99201</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide">Customer</span>
                    <span class="text-sm font-bold text-gray-800">Andi Pratama</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide">Total Tagihan</span>
                    <span class="text-sm font-bold text-gray-800">Rp 250.000</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide">Metode</span>
                    <span class="text-sm text-gray-700 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        Transfer Bank BSI
                    </span>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="px-5 pb-5 flex gap-2">
                <button class="flex-1 flex items-center justify-center gap-1.5 bg-[#064E3B] text-white text-sm font-semibold py-2.5 rounded-lg hover:bg-emerald-800 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    Terima & Verifikasi
                </button>
                <button class="flex-1 flex items-center justify-center gap-1.5 border border-red-300 text-red-500 text-sm font-semibold py-2.5 rounded-lg hover:bg-red-50 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Tolak Pembayaran
                </button>
            </div>

            {{-- Catatan Admin --}}
            <div class="mx-5 mb-5 bg-emerald-50 border border-emerald-100 rounded-lg p-3 flex gap-2">
                <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <p class="text-xs font-semibold text-emerald-700">Catatan Admin</p>
                    <p class="text-xs text-emerald-600 mt-0.5 leading-relaxed">
                        Pastikan nominal transfer sesuai dengan total tagihan sebelum melakukan verifikasi. Cek juga nama pengirim dengan data customer.
                    </p>
                </div>
            </div>

        </div>
    </div>

</div>


@endsection