<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - BersihIn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #ffffff;
        }
        .dashed-border {
            border: 1.5px dashed #E5E7EB;
        }
    </style>
</head>
<body class="text-gray-900">

    {{-- NAVBAR --}}
    <nav class="flex items-center justify-between px-20 py-6 bg-white">
        <div class="flex items-center gap-2">
            <span class="text-green-600 font-extrabold text-2xl tracking-tight">BersihIn</span>
        </div>
        <div class="flex gap-8 text-[13px] font-semibold text-gray-400">
            <a href="/bersihin" class="hover:text-green-600">Beranda</a>
            <a href="/bersihin/layanan" class="hover:text-green-600">Layanan</a>
            <a href="/bersihin/booking" class="hover:text-green-600">Booking</a>
            <a href="#" class="text-green-600 border-b-2 border-green-600 pb-1">Pembayaran</a>
        </div>
        <div class="w-24"></div>
    </nav>

    {{-- PROGRESS STEPS --}}
    <div class="max-w-4xl mx-auto px-4 py-12">
        <div class="relative flex items-center justify-between">
            <!-- Line Background -->
            <div class="absolute top-1/2 left-0 w-full h-[3px] bg-green-500 -translate-y-1/2 z-0"></div>

            <!-- Step 1 -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <span class="absolute top-12 whitespace-nowrap text-[12px] font-medium text-gray-400">Pilih Layanan</span>
            </div>

            <!-- Step 2 -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <span class="absolute top-12 whitespace-nowrap text-[12px] font-medium text-gray-400">Isi Data</span>
            </div>

            <!-- Step 3 (Aktif) -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 bg-[#006D44] rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                    <div class="w-2.5 h-2.5 bg-white rounded-full"></div>
                </div>
                <span class="absolute top-12 whitespace-nowrap text-[12px] font-bold text-green-700">Pembayaran</span>
            </div>
        </div>
    </div>

    <div class="h-8"></div>

    {{-- MAIN CONTENT --}}
    <main class="max-w-6xl mx-auto px-8 pb-24">
        <h1 class="text-3xl font-bold text-gray-900 mb-10">Konfirmasi & Pembayaran</h1>

        <div class="flex flex-col lg:flex-row gap-12 items-start">
            
            {{-- LEFT: FORM PEMBAYARAN --}}
            <div class="flex-1 w-full">
                <div class="border-2 border-green-500 rounded-2xl p-5 mb-8 bg-white">
                    <p class="font-bold text-gray-900 text-sm">Transfer Bank</p>
                    <p class="text-gray-400 text-[11px] mt-0.5">Lakukan pembayaran manual</p>
                </div>

                <h3 class="font-bold text-gray-900 mb-4 text-sm">Transfer ke Rekening</h3>
                
                <div class="bg-green-50 rounded-2xl p-6 mb-4">
                    <p class="font-bold text-gray-900 text-sm">BCA</p>
                    <p class="text-gray-800 text-lg font-medium tracking-wider my-1">1234-5678-9012</p>
                    <p class="text-gray-500 text-[11px] italic">a.n BersihIn Indonesia</p>
                </div>

                <button class="text-green-600 border border-green-600 text-[11px] font-bold px-6 py-2 rounded-full mb-10 hover:bg-green-50 transition uppercase">
                    Salin Nomor Rekening
                </button>

                <div class="space-y-6">
                    <div>
                        <label class="block font-bold text-gray-900 text-sm mb-3">Upload Bukti</label>
                        <div class="dashed-border rounded-2xl p-4 bg-white">
                            <input type="file" class="text-xs text-gray-400 w-full file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:bg-gray-100 file:text-gray-600">
                        </div>
                    </div>

                    <textarea
                        rows="3"
                        placeholder="Catatan (Opsional)"
                        class="w-full border border-gray-200 rounded-2xl px-5 py-4 text-sm focus:outline-none focus:border-green-500 bg-white"
                    ></textarea>

                    <button class="w-full bg-[#22C55E] hover:bg-green-600 text-white font-bold py-4 rounded-2xl text-sm transition uppercase tracking-widest shadow-lg shadow-green-100">
                        Kirim Bukti
                    </button>
                    <p class="text-orange-400 text-[11px] font-semibold italic text-center">Status: Menunggu upload</p>
                </div>
            </div>

            {{-- RIGHT: RINGKASAN PESANAN (Persis image_d37ebe.jpg) --}}
            <div class="w-full lg:w-[380px] sticky top-10">
                <div class="bg-white rounded-[2rem] p-4 shadow-[0_10px_40px_-15px_rgba(0,0,0,0.1)] border border-gray-50">
                    {{-- Foto yang sama persis visualnya --}}
                    <div class="rounded-[1.5rem] overflow-hidden h-52 mb-6">
                        <img 
                            src="https://media.istockphoto.com/id/1287044692/photo/cleaner-with-mask-and-gloves-cleaning-window.jpg?s=612x612&w=0&k=20&c=L_Y6802Hcl7Vp3h3fU892U2H_2Gk-Mv4u8T7V1p2Ie0=" 
                            alt="Cleaner wiping window"
                            class="w-full h-full object-cover"
                        >
                    </div>
                    
                    <div class="px-2 pb-2">
                        <h3 class="font-extrabold text-gray-900 text-lg mb-1">Deep Cleaning</h3>
                        <p class="text-gray-500 text-[11px] mb-6">Layanan kebersihan menyeluruh</p>

                        <div class="space-y-3">
                            <div class="flex justify-between text-[13px]">
                                <span class="text-gray-800 font-medium">Tanggal</span>
                                <span class="text-gray-800 font-medium text-right">25 Januari 2025</span>
                            </div>
                            <div class="flex justify-between text-[13px]">
                                <span class="text-gray-800 font-medium">Alamat</span>
                                <span class="text-gray-800 font-medium text-right">Bandar Lampung</span>
                            </div>
                        </div>

                        <div class="h-[1px] bg-gray-100 my-5"></div>

                        <div class="space-y-3">
                            <div class="flex justify-between text-[13px]">
                                <span class="text-gray-800 font-medium">Harga</span>
                                <span class="text-gray-800 font-medium">Rp 250.000</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-[#22C55E] font-bold text-base">Total: Rp 250.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="mt-10 px-20 py-10 bg-white border-t border-gray-50">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <h3 class="text-green-700 font-extrabold text-lg italic">Pristine Sanctuary</h3>
            <div class="flex gap-8 text-gray-400 text-[11px] font-medium">
                <a href="#" class="hover:text-green-600">Privacy Policy</a>
                <a href="#" class="hover:text-green-600">Terms of Service</a>
                <a href="#" class="hover:text-green-600">Help Center</a>
            </div>
            <p class="text-gray-400 text-[10px]">© 2024 The Pristine Sanctuary. Renewal in every corner.</p>
        </div>
    </footer>

</body>
</html>