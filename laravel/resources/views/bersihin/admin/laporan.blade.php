@extends('bersihin.layouts.app')
@section('page-title', 'Laporan Transaksi')
@section('page-subtitle', 'Rekap keuangan dan audit transaksi')

@section('content')
<div class="p-8 bg-gray-50 min-h-screen">

    {{-- Header --}}
    <div class="flex items-start justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Laporan Transaksi</h1>
            <p class="text-gray-500 mt-1">Pantau performa keuangan dan rincian transaksi layanan</p>
        </div>
      <a href="/bersihin/admin/laporan/unduh"
    class="flex items-center gap-2 px-5 py-2.5 bg-green-800 text-white rounded-xl text-sm font-semibold hover:bg-green-700 transition shadow-sm">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
    </svg>
    Unduh Laporan
</a>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-3 gap-5 mb-8">

        {{-- Total Pendapatan --}}
        <div class="col-span-2 bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-3">Total Pendapatan Periode Ini</p>
            <p class="text-4xl font-bold text-gray-900 mb-4">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Total Transaksi: <span class="font-semibold text-gray-800">{{ $totalTransaksi }}</span>
                </div>
            </div>
        </div>

        {{-- Estimasi Laba --}}
        <div class="bg-green-800 rounded-2xl p-6 shadow-sm">
            <p class="text-xs font-semibold text-green-300 uppercase tracking-widest mb-3">Estimasi Laba Bersih</p>
            <p class="text-3xl font-bold text-white mb-5">Rp {{ number_format($estimasiLaba, 0, ',', '.') }}</p>
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-green-300">Margin 30%</span>
                    <span class="font-bold text-white">dari pendapatan</span>
                </div>
                <div class="w-full bg-green-700 rounded-full h-2">
                    <div class="bg-white rounded-full h-2" style="width: 30%"></div>
                </div>
            </div>
        </div>

    </div>

    {{-- Filter Section --}}
    <div class="bg-white rounded-2xl border border-gray-200 p-5 mb-6 shadow-sm">
        <div class="flex items-end gap-4">
            <div class="flex-1">
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Kategori Layanan</label>
                <select id="filterLayanan" onchange="filterTabel()" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Semua Layanan</option>
                    @foreach($layananList as $l)
                    <option value="{{ $l->service_name }}">{{ $l->service_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Status Pembayaran</label>
                <select id="filterStatus" onchange="filterTabel()" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Semua Status</option>
                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
            <button onclick="resetFilter()" class="px-6 py-2.5 bg-green-800 text-white rounded-xl text-sm font-semibold hover:bg-green-700 transition shadow-sm whitespace-nowrap">
                Reset Filter
            </button>
        </div>
    </div>

    {{-- Tabel Transaksi --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-6">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Detail Transaksi</h2>
            <p class="text-sm text-gray-400">
                Menampilkan <span id="jumlahTampil">{{ $transaksi->count() }}</span> transaksi
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px]">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Tanggal & Jam</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">ID Pesanan</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Nama Customer</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="text-right px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Nominal</th>
                        <th class="text-right px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Laba</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50" id="tabelBody">
                    @forelse($transaksi as $t)
                    <tr class="hover:bg-gray-50 transition transaksi-row"
                        data-layanan="{{ $t->service_name }}"
                        data-status="{{ $t->payment_status }}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm font-semibold text-gray-800">{{ \Carbon\Carbon::parse($t->created_at)->format('d M Y') }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ \Carbon\Carbon::parse($t->created_at)->format('H:i') }} WIB</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-semibold text-green-700">#INV-{{ $t->id }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-medium text-gray-800">{{ $t->customer_name }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-block px-3 py-1 rounded-lg text-xs font-semibold bg-green-100 text-green-700">
                                {{ $t->service_name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($t->payment_status === 'paid')
                                <span class="inline-flex items-center gap-1.5 text-sm font-medium text-emerald-600">
                                    <span class="w-2 h-2 bg-emerald-500 rounded-full"></span> Paid
                                </span>
                            @elseif($t->payment_status === 'pending')
                                <span class="inline-flex items-center gap-1.5 text-sm font-medium text-amber-600">
                                    <span class="w-2 h-2 bg-amber-500 rounded-full"></span> Pending
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 text-sm font-medium text-red-500">
                                    <span class="w-2 h-2 bg-red-500 rounded-full"></span> Failed
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <span class="text-sm font-semibold text-gray-800">Rp {{ number_format($t->amount, 0, ',', '.') }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            @if($t->payment_status === 'paid')
                                <span class="text-sm font-bold text-emerald-600">Rp {{ number_format($t->amount * 0.3, 0, ',', '.') }}</span>
                            @else
                                <span class="text-sm text-gray-400">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-sm text-gray-400">Belum ada transaksi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Summary Footer Cards --}}
    <div class="grid grid-cols-3 gap-5">
        <div class="bg-white rounded-2xl border border-gray-200 p-5 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Pembayaran Terverifikasi</p>
                <p class="text-2xl font-bold text-gray-900 mt-0.5">{{ $totalTransaksi }}</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-5 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-amber-500 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Menunggu Konfirmasi</p>
                <p class="text-2xl font-bold text-gray-900 mt-0.5">{{ $totalPending }}</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-5 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Profit Margin</p>
                <p class="text-2xl font-bold text-gray-900 mt-0.5">30%</p>
            </div>
        </div>
    </div>

</div>

{{-- Toast --}}
<div id="toast"
    class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-gray-900 text-white text-sm font-medium px-5 py-3.5 rounded-2xl shadow-xl
           opacity-0 translate-y-4 pointer-events-none transition-all duration-300">
    <svg class="w-4 h-4 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
    Fitur unduh akan segera tersedia
</div>

<script>
function showToast() {
    const toast = document.getElementById('toast');
    toast.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
    toast.classList.add('opacity-100', 'translate-y-0');
    setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
        toast.classList.remove('opacity-100', 'translate-y-0');
    }, 3000);
}

function filterTabel() {
    const layanan = document.getElementById('filterLayanan').value.toLowerCase();
    const status  = document.getElementById('filterStatus').value.toLowerCase();
    const rows    = document.querySelectorAll('.transaksi-row');
    let visible   = 0;

    rows.forEach(row => {
        const rowLayanan = row.dataset.layanan.toLowerCase();
        const rowStatus  = row.dataset.status.toLowerCase();
        const match = (!layanan || rowLayanan === layanan) && (!status || rowStatus === status);
        row.style.display = match ? '' : 'none';
        if (match) visible++;
    });

    document.getElementById('jumlahTampil').textContent = visible;
}

function resetFilter() {
    document.getElementById('filterLayanan').value = '';
    document.getElementById('filterStatus').value  = '';
    filterTabel();
}
</script>

@endsection