@extends('bersihin.layouts.app')
@section('page-title', 'Manajemen Petugas')
@section('page-subtitle', 'Kelola seluruh staf lapangan')

@section('content')
<div class="p-8">

    {{-- HEADER --}}
    <div class="flex items-start justify-between mb-6">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Manajemen Petugas</h1>
            <p class="text-sm text-gray-400 mt-0.5">Kelola seluruh staf lapangan dan pantau performa mereka secara real-time.</p>
        </div>
        <button onclick="document.getElementById('modalTambahPetugas').classList.remove('hidden')"
            class="flex items-center gap-2 px-5 py-2.5 bg-[#064E3B] text-white text-sm font-semibold rounded-xl hover:bg-emerald-800">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Petugas
        </button>
    </div>

    {{-- STATS 2 CARDS --}}
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-gray-100 px-6 py-5 flex items-center gap-4">
            <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Petugas teraktif bulan ini</p>
                <div class="flex items-center gap-2">
                    <p class="font-bold text-gray-900">Bambang Susanto</p>
                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-0.5 rounded-full">142 Tugas</span>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-6 py-5 flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Rata-rata rating layanan</p>
                <div class="flex items-center gap-2">
                    <p class="font-bold text-gray-900 text-xl">4.9 / 5.0</p>
                    <div class="flex text-amber-400 text-sm">★★★★★</div>
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL PETUGAS --}}
    <div class="bg-white rounded-xl border border-gray-100">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h2 class="font-bold text-gray-800">Daftar Seluruh Petugas</h2>
            <div class="flex gap-2">
                <button class="p-1.5 rounded-lg hover:bg-gray-100">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                </button>
                <button class="p-1.5 rounded-lg hover:bg-gray-100">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </button>
            </div>
        </div>

        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-6 py-3">Foto</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-6 py-3">Nama Petugas</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-6 py-3">Total Tugas Selesai</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-6 py-3">Rating</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-6 py-3">Status</th>
                    <th class="text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wide px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">

                @php
                $petugas = [
                    ['inisial' => 'BS', 'warna' => 'bg-green-500',  'nama' => 'Bambang Susanto', 'id' => 'BS-9921', 'tugas' => '80 Selesai', 'rating' => '4.9', 'status' => 'Ready'],
                    ['inisial' => 'AP', 'warna' => 'bg-blue-500',   'nama' => 'Agus Prayoga',    'id' => 'AP-2281', 'tugas' => '34 Selesai',   'rating' => '4.8', 'status' => 'Working'],
                    ['inisial' => 'RH', 'warna' => 'bg-purple-500', 'nama' => 'Rian Hidayat',    'id' => 'RH-1029', 'tugas' => '62 Selesai',   'rating' => '5.0', 'status' => 'Ready'],
                    ['inisial' => 'MI', 'warna' => 'bg-pink-500',   'nama' => 'Maya Indah',      'id' => 'MI-3312', 'tugas' => '24 Selesai',   'rating' => '4.7', 'status' => 'Ready'],
                    ['inisial' => 'BD', 'warna' => 'bg-amber-500',  'nama' => 'Budi Darsono',    'id' => 'BD-4421', 'tugas' => '31 Selesai',   'rating' => '4.6', 'status' => 'Off'],
                ];
                @endphp

                @foreach($petugas as $p)
                <tr class="hover:bg-gray-50/50">
                    <td class="px-6 py-4">
                        <div class="relative w-10 h-10">
                            <div class="w-10 h-10 {{ $p['warna'] }} rounded-full flex items-center justify-center text-white text-sm font-bold">
                                {{ $p['inisial'] }}
                            </div>
                            <div class="absolute bottom-0 right-0 w-3 h-3 rounded-full border-2 border-white
                                {{ $p['status'] === 'Ready' ? 'bg-green-500' : ($p['status'] === 'Working' ? 'bg-blue-500' : 'bg-gray-300') }}">
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm font-semibold text-gray-800">{{ $p['nama'] }}</p>
                        <p class="text-xs text-gray-400">ID: {{ $p['id'] }}</p>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $p['tugas'] }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1.5">
                            <span class="text-sm font-bold text-gray-800">{{ $p['rating'] }}</span>
                            <div class="flex text-amber-400 text-xs">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($p['rating']))
                                        <span>★</span>
                                    @else
                                        <span class="text-gray-200">★</span>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        @if($p['status'] === 'Ready')
                            <span class="text-xs font-semibold text-green-700 border border-green-300 px-3 py-1 rounded-full">Ready</span>
                        @elseif($p['status'] === 'Working')
                            <span class="text-xs font-semibold text-blue-600 border border-blue-300 px-3 py-1 rounded-full">Working</span>
                        @else
                            <span class="text-xs font-semibold text-gray-400 border border-gray-200 px-3 py-1 rounded-full">Off</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <button class="text-sm font-semibold text-[#064E3B] hover:underline">Detail</button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>

{{-- MODAL TAMBAH PETUGAS --}}
<div id="modalTambahPetugas"
     class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50"
     onclick="if(event.target===this)this.classList.add('hidden')">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4" onclick="event.stopPropagation()">

        {{-- Modal Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-900">Tambah Petugas Baru</h3>
            <button onclick="document.getElementById('modalTambahPetugas').classList.add('hidden')"
                class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Modal Body --}}
        <div class="px-6 py-5 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Lengkap</label>
                <input type="text" placeholder="Masukkan nama lengkap"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-600">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nomor Telepon</label>
                <input type="tel" placeholder="08xxxxxxxxxx"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-600">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Keahlian</label>
                <select class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-600 bg-white">
                    <option>Pilih keahlian...</option>
                    <option>General Cleaning</option>
                    <option>Deep Cleaning</option>
                    <option>Cuci Kasur & Sofa</option>
                    <option>Disinfeksi</option>
                    <option>Cuci Jendela</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                <input type="email" placeholder="email@example.com"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-600">
            </div>
        </div>

        {{-- Modal Footer --}}
        <div class="px-6 py-4 border-t border-gray-100 flex gap-3">
            <button onclick="document.getElementById('modalTambahPetugas').classList.add('hidden')"
                class="flex-1 border border-gray-200 text-gray-600 text-sm font-semibold py-2.5 rounded-xl hover:bg-gray-50">
                Batal
            </button>
            <button onclick="
                document.getElementById('modalTambahPetugas').classList.add('hidden');
                document.getElementById('toastSukses').classList.remove('hidden');
                setTimeout(()=>document.getElementById('toastSukses').classList.add('hidden'), 3000)"
                class="flex-1 bg-[#064E3B] text-white text-sm font-semibold py-2.5 rounded-xl hover:bg-emerald-800">
                Simpan Petugas
            </button>
        </div>

    </div>
</div>

{{-- TOAST SUKSES --}}
<div id="toastSukses"
     class="hidden fixed bottom-6 right-6 bg-green-600 text-white text-sm font-semibold px-5 py-3 rounded-xl shadow-lg flex items-center gap-2 z-50">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
    </svg>
    Petugas berhasil ditambahkan!
</div>

@endsection