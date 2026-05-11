@extends('bersihin.layouts.app')

@section('page-title', 'Riwayat Pesanan')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap');
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .hero-card {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        border-radius: 20px;
        padding: 28px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .hero-card::before {
        content: '';
        position: absolute;
        top: -40px; right: -40px;
        width: 150px; height: 150px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }
    .hero-card::after {
        content: '';
        position: absolute;
        bottom: -60px; right: 40px;
        width: 200px; height: 200px;
        background: rgba(255,255,255,0.03);
        border-radius: 50%;
    }

    .filter-btn {
        padding: 8px 18px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        border: 1.5px solid #e5e7eb;
        background: white;
        color: #6b7280;
        cursor: pointer;
        transition: all 0.2s;
    }
    .filter-btn.active, .filter-btn:hover {
        background: #2563eb;
        color: white;
        border-color: #2563eb;
    }

    .order-card {
        background: white;
        border-radius: 16px;
        border: 1px solid rgba(0,0,0,0.07);
        padding: 20px;
        transition: box-shadow 0.2s, transform 0.2s;
    }
    .order-card:hover {
        box-shadow: 0 8px 24px rgba(0,0,0,0.09);
        transform: translateY(-2px);
    }

    .badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    .badge-done     { background: #dcfce7; color: #16a34a; }
    .badge-progress { background: #dbeafe; color: #2563eb; }
    .badge-pending  { background: #fef9c3; color: #ca8a04; }
    .badge-cancel   { background: #fee2e2; color: #dc2626; }

    .star-rating span { font-size: 14px; }
    .star-filled { color: #f59e0b; }
    .star-empty  { color: #d1d5db; }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }
    .empty-state .icon {
        font-size: 56px;
        margin-bottom: 16px;
    }

    .timeline-dot {
        width: 10px; height: 10px;
        border-radius: 50%;
        background: #2563eb;
        flex-shrink: 0;
        margin-top: 5px;
    }
</style>

<div class="space-y-5 pb-6">

    {{-- Hero Summary --}}
    <div class="hero-card">
        <p class="text-white/60 text-sm mb-1">Total pengeluaran bulan ini</p>
        <h2 class="text-3xl font-bold mb-4">Rp {{ number_format($totalBulanIni ?? 0, 0, ',', '.') }}</h2>
        <div class="flex gap-4">
            <div>
                <p class="text-white/60 text-xs">Total Pesanan</p>
                <p class="text-white font-bold text-lg">{{ $pesanan->count() }}</p>
            </div>
            <div class="w-px bg-white/20"></div>
            <div>
                <p class="text-white/60 text-xs">Selesai</p>
                <p class="text-white font-bold text-lg">{{ $pesanan->where('status', 'done')->count() }}</p>
            </div>
            <div class="w-px bg-white/20"></div>
            <div>
                <p class="text-white/60 text-xs">Dibatalkan</p>
                <p class="text-white font-bold text-lg">{{ $pesanan->where('status', 'cancelled')->count() }}</p>
            </div>
        </div>
    </div>

    {{-- Filter --}}
    <div class="flex gap-2 overflow-x-auto pb-1 scrollbar-hide">
        <button class="filter-btn active" onclick="filterOrders('all', this)">Semua</button>
        <button class="filter-btn" onclick="filterOrders('done', this)">Selesai</button>
        <button class="filter-btn" onclick="filterOrders('progress', this)">Berlangsung</button>
        <button class="filter-btn" onclick="filterOrders('pending', this)">Menunggu</button>
        <button class="filter-btn" onclick="filterOrders('cancelled', this)">Dibatalkan</button>
    </div>

    {{-- Order List --}}
    <div id="order-list" class="space-y-3">

        @forelse($pesanan as $p)
        <div class="order-card" data-status="{{ $p->status }}">

            {{-- Header --}}
            <div class="flex justify-between items-start mb-3">
                <div>
                    <p class="font-bold text-gray-800">{{ $p->service_name ?? 'Layanan' }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">
                        #{{ str_pad($p->id, 5, '0', STR_PAD_LEFT) }} &nbsp;·&nbsp;
                        {{ \Carbon\Carbon::parse($p->created_at)->format('d M Y') }}
                    </p>
                </div>
                @php
                    $badgeClass = match($p->status) {
                        'done'      => 'badge-done',
                        'progress'  => 'badge-progress',
                        'pending', 'confirmed' => 'badge-pending',
                        'cancelled' => 'badge-cancel',
                        default     => 'badge-pending'
                    };
                    $badgeIcon = match($p->status) {
                        'done'      => '✓',
                        'progress'  => '⟳',
                        'pending'   => '⏳',
                        'confirmed' => '✓',
                        'cancelled' => '✕',
                        default     => '⏳'
                    };
                    $badgeLabel = match($p->status) {
                        'done'      => 'Selesai',
                        'progress'  => 'Berlangsung',
                        'pending'   => 'Menunggu',
                        'confirmed' => 'Dikonfirmasi',
                        'cancelled' => 'Dibatalkan',
                        default     => ucfirst($p->status)
                    };
                @endphp
                <span class="badge {{ $badgeClass }}">{{ $badgeIcon }} {{ $badgeLabel }}</span>
            </div>

            {{-- Detail --}}
            <div class="bg-gray-50 rounded-12 p-3 space-y-2 rounded-xl mb-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Petugas</span>
                    <span class="font-medium text-gray-700">{{ $p->petugas_name ?? 'Belum ditugaskan' }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Jadwal</span>
                    <span class="font-medium text-gray-700">
                        {{ $p->booking_date ? \Carbon\Carbon::parse($p->booking_date)->format('d M Y') : '-' }}
                        {{ $p->booking_time ? ', '.substr($p->booking_time, 0, 5) : '' }}
                    </span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Alamat</span>
                    <span class="font-medium text-gray-700 text-right max-w-[200px] truncate">{{ $p->address ?? '-' }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Harga</span>
                    <span class="font-bold text-blue-600">Rp {{ number_format($p->price ?? 0, 0, ',', '.') }}</span>
                </div>
            </div>

            {{-- Rating (if done and reviewed) --}}
            @if($p->status === 'done' && $p->rating)
            <div class="flex items-center gap-2 mb-3">
                <div class="star-rating flex gap-0.5">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="{{ $i <= $p->rating ? 'star-filled' : 'star-empty' }}">★</span>
                    @endfor
                </div>
                <p class="text-xs text-gray-400">{{ $p->comment ?? '' }}</p>
            </div>
            @endif

            {{-- Actions --}}
            <div class="flex gap-2">
                @if($p->status === 'done' && !$p->rating)
                <a href="/bersihin/customer/ulasan?booking_id={{ $p->id }}"
                   class="flex-1 text-center py-2 rounded-xl text-sm font-semibold bg-blue-600 text-white hover:bg-blue-700 transition">
                    ⭐ Beri Ulasan
                </a>
                @endif
                @if(in_array($p->status, ['pending', 'confirmed']))
                <button onclick="cancelOrder({{ $p->id }})"
                   class="flex-1 text-center py-2 rounded-xl text-sm font-semibold border border-red-200 text-red-500 hover:bg-red-50 transition">
                    Batalkan
                </button>
                @endif
                @if($p->status === 'done')
                <a href="/bersihin/booking?service_id={{ $p->service_id }}"
                   class="flex-1 text-center py-2 rounded-xl text-sm font-semibold border border-blue-200 text-blue-600 hover:bg-blue-50 transition">
                    🔄 Pesan Lagi
                </a>
                @endif
            </div>

        </div>
        @empty
        <div class="empty-state">
            <div class="icon">📋</div>
            <h3 class="font-bold text-gray-700 text-lg mb-2">Belum ada riwayat</h3>
            <p class="text-gray-400 text-sm mb-4">Pesanan kamu akan muncul di sini setelah kamu melakukan booking.</p>
            <a href="/bersihin/booking" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold text-sm hover:bg-blue-700 transition">
                Buat Pesanan Pertama
            </a>
        </div>
        @endforelse

    </div>

</div>

<script>
function filterOrders(status, btn) {
    // Update active button
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // Filter cards
    document.querySelectorAll('.order-card').forEach(card => {
        const cardStatus = card.dataset.status;
        if (status === 'all') {
            card.style.display = '';
        } else if (status === 'progress') {
            card.style.display = (cardStatus === 'progress' || cardStatus === 'confirmed') ? '' : 'none';
        } else {
            card.style.display = cardStatus === status ? '' : 'none';
        }
    });
}

function cancelOrder(id) {
    if (confirm('Yakin ingin membatalkan pesanan ini?')) {
        fetch(`/bersihin/customer/pesanan/${id}/cancel`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                'Content-Type': 'application/json'
            }
        }).then(r => {
            if (r.ok) location.reload();
            else alert('Gagal membatalkan pesanan.');
        }).catch(() => alert('Terjadi kesalahan.'));
    }
}
</script>

@endsection
