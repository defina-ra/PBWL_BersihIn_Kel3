</body>                           --}}


<button onclick="document.getElementById('modalLogout').classList.remove('hidden')"
    class="flex items-center gap-3 w-full px-4 py-2.5 text-sm text-red-300 hover:bg-red-900/30 hover:text-red-200 rounded-xl transition">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
    </svg>
    Logout
</button>


</body> 

<div id="modalLogout"
    class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
    onclick="if(event.target===this) this.classList.add('hidden')">

    {{-- Backdrop blur --}}
    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm"></div>

    {{-- Modal Card --}}
    <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-sm p-8 text-center">

        {{-- Ikon --}}
        <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mx-auto mb-5">
            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
        </div>

        {{-- Teks --}}
        <h2 class="text-xl font-bold text-gray-900 mb-2">Konfirmasi Keluar</h2>
        <p class="text-sm text-gray-500 leading-relaxed mb-8">
            Apakah Anda yakin ingin keluar dari sistem <span class="font-semibold text-gray-700">BersihIn</span>?
            Anda perlu login kembali untuk mengakses panel admin.
        </p>

        {{-- Tombol --}}
        <div class="flex gap-3">
            <button onclick="document.getElementById('modalLogout').classList.add('hidden')"
                class="flex-1 py-3 border-2 border-gray-200 text-gray-600 font-semibold rounded-2xl hover:bg-gray-50 transition text-sm">
                Batal
            </button>

            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <button type="submit"
                    class="w-full py-3 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-2xl transition text-sm shadow-sm shadow-red-200">
                    Ya, Keluar
                </button>
            </form>
        </div>

    </div>
</div>


