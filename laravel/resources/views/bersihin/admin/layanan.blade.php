@extends('bersihin.layouts.admin')
@section('page-title', 'Layanan & Promo')
@section('page-subtitle', 'Kelola daftar layanan dan promosi')

@section('content')

{{-- Header --}}
<div class="flex items-start justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Layanan & Promo</h1>
        <p class="text-sm text-gray-400 mt-0.5">Kelola daftar layanan dan program promosi aktif di platform BersihIn</p>
    </div>
    <button class="flex items-center gap-2 px-4 py-2.5 bg-[#064E3B] text-white text-sm font-semibold rounded-lg hover:bg-emerald-800 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Baru
    </button>
</div>

{{-- ===== TABS ===== --}}
<div class="flex gap-0 border-b border-gray-200 mb-6">
    <button
        id="tab-layanan"
        onclick="switchTab('layanan')"
        class="px-4 pb-3 text-sm font-semibold text-[#064E3B] border-b-2 border-[#064E3B] -mb-px transition">
        Daftar Layanan
    </button>
    <button
        id="tab-promo"
        onclick="switchTab('promo')"
        class="px-4 pb-3 text-sm font-medium text-gray-400 hover:text-gray-600 border-b-2 border-transparent -mb-px transition">
        Manajemen Promo
    </button>
</div>

{{-- ===== KONTEN TAB: DAFTAR LAYANAN ===== --}}
<div id="konten-layanan">
    @php
    $layanan = [
        ['nama' => 'Deep Cleaning',       'desk' => 'Pembersihan menyeluruh hingga ke sudut',        'harga' => 'Rp 250.000',
         'icon' => 'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'],
        ['nama' => 'General Cleaning',    'desk' => 'Perawatan harian untuk menjaga kebersihan...',   'harga' => 'Rp 120.000',
         'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
        ['nama' => 'Cuci Kasur',          'desk' => 'Sedot tungau dan sterilisasi kasur dari...',     'harga' => 'Rp 180.000',
         'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
        ['nama' => 'Cuci Sofa',           'desk' => 'Pembersihan noda dan debu pada sofa...',         'harga' => 'Rp 150.000',
         'icon' => 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z'],
        ['nama' => 'Bersih Kamar Mandi',  'desk' => 'Pembersihan kerak air dan jamur dinding...',     'harga' => 'Rp 90.000',
         'icon' => 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z'],
        ['nama' => 'Cuci Jendela',        'desk' => 'Pembersihan kaca luar dan dalam hingga bersih',  'harga' => 'Rp 75.000',
         'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'],
    ];
    @endphp

    <div class="grid grid-cols-3 gap-4">
        @foreach($layanan as $l)
        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden hover:shadow-sm transition">
            <div class="h-36 bg-emerald-50 flex items-center justify-center relative">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-sm">
                    <svg class="w-7 h-7 text-[#064E3B]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $l['icon'] }}"/>
                    </svg>
                </div>
                <span class="absolute top-3 right-3 text-[10px] font-bold text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded-full uppercase tracking-wide">
                    Aktif
                </span>
            </div>
            <div class="p-4">
                <h3 class="font-bold text-gray-800 text-sm">{{ $l['nama'] }}</h3>
                <p class="text-xs text-gray-400 mt-0.5 mb-3">{{ $l['desk'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-base font-extrabold text-[#064E3B]">{{ $l['harga'] }}</span>
                    <button class="flex items-center gap-1 text-xs font-semibold text-gray-500 hover:text-[#064E3B] transition">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- ===== KONTEN TAB: MANAJEMEN PROMO (hidden dulu) ===== --}}
<div id="konten-promo" class="hidden">

    <div class="bg-white rounded-xl border border-gray-100">
        <div class="px-5 py-4 border-b border-gray-100">
            <p class="text-sm text-gray-400">Voucher aktif dan penawaran khusus untuk pelanggan.</p>
        </div>
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Nama Promo</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Kode</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Berlaku Hingga</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Status</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @php
                $promo = [
                    ['nama' => 'Diskon 30% Layanan Kedua', 'sub' => 'Min. Transaksi Rp 200rb', 'kode' => 'BERSIH30',  'berlaku' => '31 Des 2024', 'aktif' => true],
                    ['nama' => 'Cashback Rp 50.000',       'sub' => 'Khusus Pengguna Baru',    'kode' => 'HELLO50',   'berlaku' => '15 Nov 2024', 'aktif' => true],
                    ['nama' => 'Promo Gajian',              'sub' => 'Berakhir otomatis',       'kode' => 'GAJIANOKT', 'berlaku' => '30 Okt 2024', 'aktif' => false],
                ];
                @endphp

                @foreach($promo as $pr)
                <tr class="hover:bg-gray-50/60 transition">
                    <td class="px-5 py-4">
                        <p class="text-sm font-semibold text-gray-800">{{ $pr['nama'] }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $pr['sub'] }}</p>
                    </td>
                    <td class="px-5 py-4">
                        <span class="text-xs font-bold tracking-widest px-3 py-1.5 rounded-md
                            {{ $pr['aktif'] ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-gray-100 text-gray-400 border border-gray-200' }}">
                            {{ $pr['kode'] }}
                        </span>
                    </td>
                    <td class="px-5 py-4">
                        <span class="text-sm text-gray-600">{{ $pr['berlaku'] }}</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-9 h-5 rounded-full flex items-center px-0.5 {{ $pr['aktif'] ? 'bg-[#064E3B]' : 'bg-gray-200' }}">
                                <div class="w-4 h-4 bg-white rounded-full shadow {{ $pr['aktif'] ? 'translate-x-4' : 'translate-x-0' }} transition"></div>
                            </div>
                            <span class="text-xs font-semibold {{ $pr['aktif'] ? 'text-emerald-600' : 'text-gray-400' }}">
                                {{ $pr['aktif'] ? 'Enable' : 'Disable' }}
                            </span>
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <button class="p-1.5 rounded-lg hover:bg-gray-100">
                            <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01"/>
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

{{-- ===== JAVASCRIPT TAB ===== --}}
<script>
function switchTab(tab) {
    // Sembunyikan semua konten
    document.getElementById('konten-layanan').classList.add('hidden');
    document.getElementById('konten-promo').classList.add('hidden');

    // Reset style semua tombol tab
    document.getElementById('tab-layanan').className = 'px-4 pb-3 text-sm font-medium text-gray-400 hover:text-gray-600 border-b-2 border-transparent -mb-px transition';
    document.getElementById('tab-promo').className   = 'px-4 pb-3 text-sm font-medium text-gray-400 hover:text-gray-600 border-b-2 border-transparent -mb-px transition';

    // Tampilkan konten tab yang diklik
    document.getElementById('konten-' + tab).classList.remove('hidden');

    // Aktifkan style tombol tab yang diklik
    document.getElementById('tab-' + tab).className = 'px-4 pb-3 text-sm font-semibold text-[#064E3B] border-b-2 border-[#064E3B] -mb-px transition';
}
</script>

@endsection