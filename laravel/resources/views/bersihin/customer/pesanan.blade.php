@extends('bersihin.layouts.app')

@section('page-title', 'Pesanan Saya')
@section('page-subtitle', 'Kelola semua pesanan kebersihan kamu')

@section('content')
<style>
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 18px 20px;
        border: 1px solid rgba(0,0,0,0.06);
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        display: flex; align-items: center; gap: 14px;
    }
    .stat-icon {
        width: 46px; height: 46px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .order-card {
        background: white;
        border-radius: 20px;
        border: 1px solid rgba(0,0,0,0.06);
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        overflow: hidden;
    }
    .badge {
        display: inline-flex; align-items: center;
        padding: 4px 10px; border-radius: 999px;
        font-size: 11px; font-weight: 700;
    }
    .btn-outline {
        padding: 8px 16px; border-radius: 10px;
        border: 1.5px solid #e5e7eb;
        font-size: 12px; font-weight: 700; color: #374151;
        cursor: pointer; background: white;
        transition: all 0.18s;
    }
    .btn-outline:hover { border-color: #16a34a; color: #16a34a; background: #f0fdf4; }
    .btn-solid {
        padding: 8px 16px; border-radius: 10px;
        font-size: 12px; font-weight: 700; color: white;
        cursor: pointer; border: none;
        background: linear-gradient(135deg, #16a34a, #0d9044);
    }
    .tab-btn {
        padding: 8px 18px; border-radius: 10px;
        font-size: 13px; font-weight: 600; color: #6b7280;
        cursor: pointer; border: none; background: transparent;
    }
    .tab-btn.active { background: #0d3d2b; color: white; }
    .tab-btn:not(.active):hover { background: #f3f4f6; color: #374151; }
</style>

<!-- HEADER -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif;">Pesanan Saya</h1>
        <p class="text-gray-400 text-sm mt-0.5">Pantau semua status layanan kebersihan kamu</p>
    </div>
    <a href="/bersihin/booking" class="flex items-center gap-2 text-sm font-bold text-white px-5 py-2.5 rounded-xl transition"
       style="background:linear-gradient(135deg,#16a34a,#0d9044);box-shadow:0 4px 14px rgba(22,163,74,0.35);">
        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Pesan Layanan Baru
    </a>
</div>

<!-- STAT CARDS -->
<div class="grid grid-cols-4 gap-4 mb-6">
    <div class="stat-card">
        <div class="stat-icon" style="background:#eff6ff;">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#2563eb" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Total</p>
            <p class="text-xl font-extrabold text-gray-900">{{ $totalPesanan }} <span class="text-sm font-medium text-gray-400">Pesanan</span></p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fffbeb;">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Proses</p>
            <p class="text-xl font-extrabold text-gray-900">{{ $pesananProses }} <span class="text-sm font-medium text-gray-400">Aktif</span></p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#f0fdf4;">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#16a34a" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Selesai</p>
            <p class="text-xl font-extrabold text-gray-900">{{ $pesananSelesai }} <span class="text-sm font-medium text-gray-400">Layanan</span></p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fef3c7;">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#f59e0b" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Rating</p>
            <p class="text-xl font-extrabold text-gray-900">4.9 <span class="text-sm font-medium text-gray-400">/ 5.0</span></p>
        </div>
    </div>
</div>

<!-- TAB FILTER -->
<div class="flex items-center gap-2 mb-5 bg-white rounded-xl p-1.5 border border-gray-100 shadow-sm w-fit">
    <button class="tab-btn active" onclick="filterTab(this, 'semua')">Semua</button>
    <button class="tab-btn" onclick="filterTab(this, 'proses')">Sedang Proses</button>
    <button class="tab-btn" onclick="filterTab(this, 'selesai')">Selesai</button>
    <button class="tab-btn" onclick="filterTab(this, 'pending')">Pending</button>
</div>

<!-- ORDER CARDS -->
<div class="space-y-4">
    @forelse($pesanan as $p)
    <div class="order-card" data-status="{{ $p->status === 'done' ? 'selesai' : ($p->status === 'pending' ? 'pending' : 'proses') }}">
        <div class="p-6">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <h3 class="font-bold text-gray-900 text-base">{{ $p->service_name }}</h3>
                        @if($p->status === 'done')
                            <span class="badge" style="background:#dcfce7;color:#15803d;">SELESAI</span>
                        @elseif($p->status === 'pending')
                            <span class="badge" style="background:#e0f2fe;color:#0369a1;">PENDING</span>
                        @elseif($p->status === 'confirmed')
                            <span class="badge" style="background:#dbeafe;color:#1d4ed8;">CONFIRMED</span>
                        @elseif($p->status === 'progress')
                            <span class="badge" style="background:#fef3c7;color:#b45309;">PROSES</span>
                        @else
                            <span class="badge" style="background:#fee2e2;color:#dc2626;">{{ strtoupper($p->status) }}</span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-400">
                        {{ \Carbon\Carbon::parse($p->booking_date)->format('d M Y') }} &bull;
                        {{ $p->booking_time }} &bull;
                        <span class="font-mono bg-gray-100 px-1.5 py-0.5 rounded">#BRS-{{ $p->id }}</span>
                    </p>
                </div>
                <p class="text-lg font-extrabold text-green-700">Rp {{ number_format($p->price, 0, ',', '.') }}</p>
            </div>

            <div class="flex items-center gap-5 mb-4">
                <div class="flex items-center gap-1.5 text-xs text-gray-500">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ Str::limit($p->address, 40) }}
                </div>
            </div>

            <div class="flex justify-between items-center border-t border-gray-100 pt-4">
                <div>
                    @if($p->petugas_name)
                    <p class="text-xs text-gray-500">Petugas: <span class="font-semibold text-gray-700">{{ $p->petugas_name }}</span></p>
                    @else
                    <p class="text-xs text-gray-400">Petugas belum ditugaskan</p>
                    @endif
                </div>
                <div class="flex gap-2">
                    <button class="btn-outline">Lihat Detail</button>
                    @if($p->status === 'done')
                    <a href="/bersihin/customer/ulasan" class="btn-solid" style="background:linear-gradient(135deg,#f59e0b,#d97706);text-decoration:none;display:inline-flex;align-items:center;">
                        Beri Ulasan ★
                    </a>
                    @elseif(in_array($p->status, ['confirmed', 'progress']))
                    <button class="btn-solid">Hubungi Petugas</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="bg-white rounded-2xl border border-gray-100 p-12 text-center">
        <p class="text-gray-400 text-sm mb-3">Belum ada pesanan</p>
        <a href="/bersihin/booking" class="inline-block bg-[#064E3B] text-white font-bold px-6 py-3 rounded-xl text-sm hover:bg-emerald-800 transition">
            Pesan Layanan Sekarang
        </a>
    </div>
    @endforelse
</div>

<!-- BANNER PROMO -->
<div class="mt-6 rounded-2xl overflow-hidden relative" style="background:linear-gradient(135deg,#0a2e1f,#145c3e);">
    <div class="p-8">
        <div class="flex items-center justify-between">
            <div class="max-w-lg">
                <h2 class="text-2xl font-extrabold text-white mt-2 mb-2">Diskon 30% untuk Pesanan Berikutnya!</h2>
                <p class="text-green-300 text-sm leading-relaxed mb-5">Nikmati kebersihan maksimal bersama petugas profesional kami.</p>
                <a href="/bersihin/booking" class="inline-flex items-center gap-2 bg-white text-green-800 font-bold text-sm px-6 py-3 rounded-xl hover:bg-green-50 transition">
                    Klaim & Pesan Sekarang →
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function filterTab(btn, status) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.order-card').forEach(card => {
        if (status === 'semua' || card.dataset.status === status) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

@endsection
