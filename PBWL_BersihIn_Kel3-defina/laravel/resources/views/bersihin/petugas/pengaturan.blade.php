@extends('bersihin.layouts.petugas')

@section('page-title', 'Pengaturan Profil')
@section('page-subtitle', 'Kelola informasi akun dan preferensi kerja Anda')

@section('content')

<div class="grid grid-cols-3 gap-6">

    {{-- ===== KOLOM KIRI: Profil Card ===== --}}
    <div class="col-span-1 space-y-4">

        {{-- Card Foto & Identitas --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6 text-center">
            {{-- Foto Profil --}}
            <div class="relative inline-block mb-4">
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-emerald-100 shadow-md mx-auto">
                    <img
                        src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?w=200&q=80"
                        alt="Foto Profil Larasati"
                        class="w-full h-full object-cover"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="hidden w-full h-full bg-[#064E3B] items-center justify-center text-white text-2xl font-bold">L</div>
                </div>
                {{-- Tombol edit foto --}}
                <button class="absolute bottom-0 right-0 w-7 h-7 bg-[#064E3B] rounded-full flex items-center justify-center shadow border-2 border-white hover:bg-emerald-700 transition">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </button>
            </div>

            <h2 class="text-lg font-extrabold text-gray-900">Larasati</h2>
            <p class="text-sm text-gray-400 mt-0.5">ID: BRS-0824</p>

            {{-- Badge Spesialisasi --}}
            <div class="flex flex-wrap justify-center gap-1.5 mt-3">
                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 border border-emerald-200 px-2.5 py-1 rounded-full">Deep Cleaning</span>
                <span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-100 px-2.5 py-1 rounded-full">General Cleaning</span>
            </div>

            {{-- Divider --}}
            <div class="border-t border-gray-100 my-4"></div>

            {{-- Status & Jam Kerja --}}
            <div class="space-y-3 text-left">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Status Ketersediaan</span>
                    <div class="flex items-center gap-1.5">
                        <span class="text-sm font-bold text-emerald-600">Aktif</span>
                        <div class="w-8 h-4 bg-[#064E3B] rounded-full flex items-center px-0.5">
                            <div class="w-3 h-3 bg-white rounded-full shadow translate-x-4"></div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Total Jam Kerja (Bln Ini)</span>
                    <span class="text-sm font-extrabold text-gray-900">164 Jam</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Bergabung Sejak</span>
                    <span class="text-sm font-semibold text-gray-700">Mar 2023</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Rating Rata-rata</span>
                    <div class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span class="text-sm font-extrabold text-gray-900">4.9</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Pencapaian Singkat --}}
        <div class="bg-[#064E3B] rounded-2xl p-5">
            <p class="text-xs font-bold text-green-300 uppercase tracking-widest mb-3">Pencapaian Terbaru</p>
            <div class="space-y-2.5">
                <div class="flex items-center gap-2.5">
                    <div class="w-7 h-7 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-amber-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <p class="text-white text-xs font-semibold">Top Performer Oktober 2024</p>
                </div>
                <div class="flex items-center gap-2.5">
                    <div class="w-7 h-7 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-white text-xs font-semibold">128 Tugas Selesai</p>
                </div>
                <div class="flex items-center gap-2.5">
                    <div class="w-7 h-7 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-white text-xs font-semibold">Zero Komplain 30 Hari</p>
                </div>
            </div>
        </div>

    </div>

    {{-- ===== KOLOM KANAN: Form Pengaturan ===== --}}
    <div class="col-span-2 space-y-4">

        {{-- Card Informasi Akun --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-8 bg-emerald-50 rounded-xl flex items-center justify-center">
                    <svg class="w-4 h-4 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Informasi Akun</h3>
                    <p class="text-xs text-gray-400">Data diri yang terdaftar di sistem BersihIn</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                {{-- Nama Lengkap --}}
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5 block">Nama Lengkap</label>
                    <input type="text" value="Larasati"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 font-medium focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-50">
                </div>
                {{-- ID Pegawai --}}
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5 block">ID Pegawai</label>
                    <input type="text" value="BRS-0824" readonly
                        class="w-full border border-gray-100 rounded-xl px-4 py-2.5 text-sm text-gray-400 bg-gray-50 cursor-not-allowed">
                </div>
                {{-- Nomor WhatsApp --}}
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5 block">Nomor WhatsApp</label>
                    <div class="relative">
                        <input type="text" value="+62 812 3456 7890"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 pr-10 text-sm text-gray-800 font-medium focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-50">
                        <div class="absolute right-3 top-1/2 -translate-y-1/2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                {{-- Email --}}
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5 block">Email</label>
                    <div class="relative">
                        <input type="email" value="larasati.bersihin@company.id"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 pr-10 text-sm text-gray-800 font-medium focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-50">
                        <div class="absolute right-3 top-1/2 -translate-y-1/2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Area Kerja --}}
            <div class="mt-4">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5 block">Area Kerja Ditugaskan</label>
                <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 rounded-xl px-4 py-2.5">
                    <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="text-sm font-semibold text-emerald-700">Jakarta Selatan</span>
                </div>
                <p class="text-xs text-gray-400 mt-1.5 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Hubungi Admin Operasional untuk mengajukan perubahan area kerja.
                </p>
            </div>
        </div>

        {{-- Card Keamanan Akun --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-8 bg-amber-50 rounded-xl flex items-center justify-center">
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Keamanan Akun</h3>
                    <p class="text-xs text-gray-400">Terakhir diperbarui: 12 hari yang lalu</p>
                </div>
            </div>

            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-white rounded-lg border border-gray-200 flex items-center justify-center">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700">Kata Sandi</p>
                        <p class="text-xs text-gray-400">••••••••••••</p>
                    </div>
                </div>
                <button class="flex items-center gap-1.5 border border-gray-200 text-gray-600 text-sm font-semibold px-4 py-2 rounded-xl hover:bg-white transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    Ganti Kata Sandi
                </button>
            </div>
        </div>

        {{-- Card Notifikasi --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-8 bg-blue-50 rounded-xl flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Preferensi Notifikasi</h3>
                    <p class="text-xs text-gray-400">Atur notifikasi yang ingin Anda terima</p>
                </div>
            </div>

            <div class="space-y-3">
                @php
                $notifs = [
                    ['label' => 'Tugas baru ditugaskan', 'sub' => 'Notif saat admin memberikan tugas baru', 'aktif' => true],
                    ['label' => 'Pengingat jadwal',      'sub' => '30 menit sebelum waktu tugas dimulai', 'aktif' => true],
                    ['label' => 'Ulasan pelanggan baru', 'sub' => 'Notif saat pelanggan memberikan rating', 'aktif' => true],
                    ['label' => 'Pengumuman dari Admin', 'sub' => 'Info operasional dan kebijakan terbaru', 'aktif' => false],
                ];
                @endphp
                @foreach($notifs as $n)
                <div class="flex items-center justify-between py-2.5 border-b border-gray-50 last:border-0">
                    <div>
                        <p class="text-sm font-semibold text-gray-700">{{ $n['label'] }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $n['sub'] }}</p>
                    </div>
                    <div class="w-10 h-5 rounded-full flex items-center px-0.5 cursor-pointer flex-shrink-0
                        {{ $n['aktif'] ? 'bg-[#064E3B]' : 'bg-gray-200' }}">
                        <div class="w-4 h-4 bg-white rounded-full shadow transition
                            {{ $n['aktif'] ? 'translate-x-5' : 'translate-x-0' }}"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Tombol Simpan --}}
        <div class="flex items-center justify-between">
            <p class="text-xs text-gray-400 flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Terakhir disimpan: Hari ini, 08:45 WIB
            </p>
            <button class="flex items-center gap-2 bg-[#064E3B] text-white text-sm font-bold px-6 py-3 rounded-xl hover:bg-emerald-800 transition shadow-sm shadow-emerald-900/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Simpan Perubahan
            </button>
        </div>

    </div>

</div>

@endsection