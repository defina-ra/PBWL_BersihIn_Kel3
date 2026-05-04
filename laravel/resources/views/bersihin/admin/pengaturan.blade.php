@extends('bersihin.layouts.admin')
@section('page-title', 'Pengaturan')
@section('page-subtitle', 'Kelola profil dan pengaturan akun admin')

@section('content')
<div class="p-8 bg-gray-50 min-h-screen">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Pengaturan Akun</h1>
            <p class="text-gray-500 mt-1">Kelola informasi profil, keamanan, dan preferensi sistem Anda.</p>
        </div>
        <button onclick="simpanPerubahan()"
            class="px-6 py-2.5 bg-green-800 text-white rounded-xl text-sm font-semibold hover:bg-green-700 transition shadow-sm">
            Simpan Perubahan
        </button>
    </div>

    <div class="grid grid-cols-3 gap-6">

        {{-- Kolom Kiri --}}
        <div class="flex flex-col gap-5">

            {{-- Kartu Profil --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 text-center">
                <p class="text-base font-semibold text-gray-700 text-left mb-5">Profil</p>

                {{-- Avatar --}}
                <div class="relative w-24 h-24 mx-auto mb-4">
                    <img src="https://ui-avatars.com/api/?name=Admin+Utama&background=166534&color=fff&size=96"
                        alt="Foto Profil"
                        class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-md">
                    <button class="absolute bottom-0 right-0 w-7 h-7 bg-green-700 rounded-full flex items-center justify-center shadow hover:bg-green-600 transition">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                    </button>
                </div>

                <p class="font-bold text-gray-900 text-lg">Admin Utama</p>
                <p class="text-sm text-gray-400 mb-1">admin@bersihin.com</p>
                <span class="inline-block text-xs font-semibold text-green-700 bg-green-50 px-3 py-1 rounded-full mb-5">Super Admin</span>

                <button class="w-full text-sm font-semibold text-green-700 border border-green-200 bg-green-50 hover:bg-green-100 rounded-xl py-2.5 transition">
                    Unggah Foto Baru
                </button>
            </div>

            {{-- Kartu Info Akun --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-widest mb-4">Info Akun</p>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Role</span>
                        <span class="font-semibold text-gray-800">Super Admin</span>
                    </div>
                    <div class="border-t border-gray-50"></div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Bergabung</span>
                        <span class="font-semibold text-gray-800">Jan 2023</span>
                    </div>
                    <div class="border-t border-gray-50"></div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Versi Sistem</span>
                        <span class="font-semibold text-green-700">v2.4.0</span>
                    </div>
                </div>
            </div>

            {{-- Kartu Butuh Bantuan --}}
            <div class="bg-green-800 rounded-2xl p-6 relative overflow-hidden">
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-green-700 rounded-full opacity-50"></div>
                <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-green-700 rounded-full opacity-30"></div>
                <p class="font-bold text-white text-base mb-2 relative">Butuh Bantuan?</p>
                <p class="text-green-300 text-sm leading-relaxed mb-5 relative">Tim dukungan kami tersedia 24/7 untuk membantu masalah teknis Anda.</p>
                <button class="relative bg-white text-green-800 text-sm font-semibold px-4 py-2 rounded-xl hover:bg-green-50 transition">
                    Hubungi Kami
                </button>
            </div>

        </div>

        {{-- Kolom Kanan --}}
        <div class="col-span-2 flex flex-col gap-5">

            {{-- Ubah Kata Sandi --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <div class="flex items-center gap-2 mb-6">
                    <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <h2 class="font-bold text-gray-900 text-lg">Ubah Kata Sandi</h2>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Kata Sandi Saat Ini</label>
                        <div class="relative">
                            <input type="password" value="12345678" id="sandi_lama"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 pr-12">
                            <button type="button" onclick="togglePassword('sandi_lama', this)"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Kata Sandi Baru</label>
                            <div class="relative">
                                <input type="password" value="12345678" id="sandi_baru"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 pr-12">
                                <button type="button" onclick="togglePassword('sandi_baru', this)"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Konfirmasi Kata Sandi</label>
                            <div class="relative">
                                <input type="password" value="12345678" id="sandi_konfirm"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 pr-12">
                                <button type="button" onclick="togglePassword('sandi_konfirm', this)"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <p class="text-xs text-gray-400 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Kata sandi minimal 8 karakter, termasuk huruf besar, angka, dan simbol.
                    </p>
                </div>
            </div>

            {{-- Preferensi Sistem --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <div class="flex items-center gap-2 mb-6">
                    <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 4a2 2 0 100 4m0-4a2 2 0 110 4m6-4a2 2 0 100 4m0-4a2 2 0 110 4"/>
                    </svg>
                    <h2 class="font-bold text-gray-900 text-lg">Preferensi Sistem</h2>
                </div>

                {{-- Bahasa --}}
                <div class="flex items-center justify-between py-4 border-b border-gray-100">
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Bahasa</p>
                        <p class="text-xs text-gray-400 mt-0.5">Pilih bahasa tampilan antarmuka admin.</p>
                    </div>
                    <select class="border border-gray-200 rounded-xl px-4 py-2 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 bg-white">
                        <option>Bahasa Indonesia</option>
                        <option>English</option>
                    </select>
                </div>

                {{-- Notifikasi --}}
                <div class="pt-4">
                    <p class="text-sm font-semibold text-gray-700 mb-4">Notifikasi</p>
                    <div class="space-y-4">

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-800">Notifikasi Email untuk Pesanan Baru</p>
                                <p class="text-xs text-gray-400 mt-0.5">Kirim email setiap ada pesanan masuk.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-700"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-800">Laporan Mingguan Performa Karyawan</p>
                                <p class="text-xs text-gray-400 mt-0.5">Terima ringkasan kinerja setiap minggu.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-700"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-800">Peringatan Keamanan Akun</p>
                                <p class="text-xs text-gray-400 mt-0.5">Notifikasi jika ada aktivitas login mencurigakan.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-700"></div>
                            </label>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Info Sistem --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <div class="flex items-center gap-2 mb-4">
                    <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/>
                    </svg>
                    <h2 class="font-bold text-gray-900 text-lg">Informasi Sistem</h2>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-gray-50 rounded-xl p-4 text-center">
                        <p class="text-xs text-gray-400 mb-1">Versi Sistem</p>
                        <p class="font-bold text-green-700">v2.4.0</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 text-center">
                        <p class="text-xs text-gray-400 mb-1">Terakhir Diperbarui</p>
                        <p class="font-bold text-gray-800 text-sm">12 Okt 2023</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 text-center">
                        <p class="text-xs text-gray-400 mb-1">Status</p>
                        <p class="font-bold text-emerald-600 flex items-center justify-center gap-1">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full"></span> Aktif
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

{{-- Toast Notifikasi --}}
<div id="toast"
    class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-gray-900 text-white text-sm font-medium px-5 py-3.5 rounded-2xl shadow-xl opacity-0 translate-y-4 pointer-events-none transition-all duration-300">
    <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
    </svg>
    Perubahan berhasil disimpan!
</div>

<script>
function simpanPerubahan() {
    const toast = document.getElementById('toast');
    toast.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
    toast.classList.add('opacity-100', 'translate-y-0');
    setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
        toast.classList.remove('opacity-100', 'translate-y-0');
    }, 3000);
}

function togglePassword(id, btn) {
    const input = document.getElementById(id);
    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';
    btn.querySelector('svg').style.opacity = isPassword ? '0.4' : '1';
}
</script>

@endsection