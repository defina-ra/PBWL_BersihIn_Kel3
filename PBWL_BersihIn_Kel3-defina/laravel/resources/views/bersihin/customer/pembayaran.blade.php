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
            <a href="{{ route('beranda') }}" class="hover:text-green-600">Beranda</a>
            <a href="{{ route('layanan') }}" class="hover:text-green-600">Layanan</a>
            <a href="{{ route('booking') }}" class="hover:text-green-600">Booking</a>
            <a href="{{ route('pembayaran') }}" class="text-green-600 border-b-2 border-green-600 pb-1">Pembayaran</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('register') }}" class="bg-green-600 text-white text-[13px] font-bold px-6 py-2.5 rounded-full hover:bg-green-700 transition">Get Started</a>
        </div>
    </nav>

    {{-- CONTAINER HEADER (Breadcrumb & Progress Steps) --}}
    <div class="max-w-6xl mx-auto px-8 mt-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            
            {{-- LEFT: Breadcrumb & Title --}}
            <div class="flex-1">
                <nav class="flex text-[13px] font-medium text-gray-400 mb-4" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex">
                        <li class="flex items-center">
                            <a href="{{ route('beranda') }}" class="hover:text-green-600">Beranda</a>
                            <span class="mx-2 text-gray-300">›</span>
                        </li>
                        <li class="flex items-center">
                            <a href="{{ route('layanan') }}" class="hover:text-green-600">Layanan</a>
                            <span class="mx-2 text-gray-300">›</span>
                        </li>
                        <li class="flex items-center">
                            <a href="{{ route('booking') }}" class="hover:text-green-600">Booking</a>
                            <span class="mx-2 text-gray-300">›</span>
                        </li>
                        <li class="text-green-600 font-bold">Pembayaran</li>
                    </ol>
                </nav>
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Konfirmasi & Pembayaran</h1>
            </div>

            {{-- RIGHT: Progress Steps --}}
            <div class="w-full md:w-[450px] pb-2">
                <div class="relative flex items-center justify-between">
                    <div class="absolute top-1/2 left-0 w-full h-[2px] bg-green-500 -translate-y-1/2 z-0"></div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center border-2 border-white shadow-sm">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="absolute top-10 whitespace-nowrap text-[11px] font-medium text-gray-400">Pilih Layanan</span>
                    </div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center border-2 border-white shadow-sm">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="absolute top-10 whitespace-nowrap text-[11px] font-medium text-gray-400">Isi Data</span>
                    </div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-8 h-8 bg-[#006D44] rounded-full flex items-center justify-center border-2 border-white shadow-sm">
                            <div class="w-2 h-2 bg-white rounded-full"></div>
                        </div>
                        <span class="absolute top-10 whitespace-nowrap text-[11px] font-bold text-green-700">Pembayaran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h-16"></div>

    {{-- MAIN CONTENT --}}
    <main class="max-w-6xl mx-auto px-8 pb-24">
        <div class="flex flex-col lg:flex-row gap-12 items-start">
            
            {{-- LEFT: FORM PEMBAYARAN --}}
            <div class="flex-1 w-full">
                <div class="border-[1.5px] border-green-500 rounded-xl p-5 mb-10 bg-white">
                    <p class="font-bold text-gray-900 text-sm">Transfer Bank</p>
                    <p class="text-gray-400 text-[11px] mt-0.5">Lakukan pembayaran manual</p>
                </div>

                <h3 class="font-bold text-gray-900 mb-4 text-[15px]">Transfer ke Rekening</h3>
                
                <div class="bg-[#F0FAF5] rounded-xl p-6 mb-4">
                    <p class="font-bold text-gray-900 text-sm mb-1">BCA</p>
                    <p class="text-gray-800 text-lg font-semibold tracking-wider">1234-5678-9012</p>
                    <p class="text-gray-500 text-[11px] italic">a.n BersihIn Indonesia</p>
                </div>

                <button class="text-green-600 border border-green-600 text-[11px] font-bold px-5 py-2 rounded-full mb-12 hover:bg-green-50 transition uppercase tracking-wide">
                    Salin Nomor Rekening
                </button>

                <div class="space-y-6">
                    <div>
                        <label class="block font-bold text-gray-900 text-sm mb-3">Upload Bukti</label>
                        <div class="dashed-border rounded-xl p-4 bg-white">
                            <input type="file" class="text-xs text-gray-400 w-full file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:bg-gray-100 file:text-gray-600">
                        </div>
                    </div>
                    <textarea rows="4" placeholder="Catatan (Opsional)" class="w-full border border-gray-200 rounded-xl px-5 py-4 text-sm focus:outline-none focus:border-green-500 bg-white transition-colors"></textarea>
                    <button class="w-full bg-[#22C55E] hover:bg-green-600 text-white font-bold py-4 rounded-xl text-sm transition uppercase tracking-widest shadow-lg shadow-green-50">
                        Kirim Bukti
                    </button>
                    <p class="text-orange-400 text-[11px] font-semibold italic text-center">Status: Menunggu upload</p>
                </div>
            </div>

            {{-- RIGHT: RINGKASAN PESANAN --}}
            <div class="w-full lg:w-[380px] sticky top-10">
                <div class="bg-white rounded-[2rem] p-4 shadow-[0_15px_50px_-20px_rgba(0,0,0,0.1)] border border-gray-50">
                    <div class="rounded-[1.5rem] overflow-hidden h-52 mb-6">
                        <img src="https://media.istockphoto.com/id/1287044692/photo/cleaner-with-mask-and-gloves-cleaning-window.jpg?s=612x612&w=0&k=20&c=L_Y6802Hcl7Vp3h3fU892U2H_2Gk-Mv4u8T7V1p2Ie0=" class="w-full h-full object-cover">
                    </div>
                    <div class="px-2 pb-2">
                        <h3 class="font-extrabold text-gray-900 text-lg mb-1">Deep Cleaning</h3>
                        <p class="text-gray-500 text-[11px] mb-6 tracking-wide">Layanan kebersihan menyeluruh</p>
                        <div class="space-y-3">
                            <div class="flex justify-between text-[13px]">
                                <span class="text-gray-800 font-medium">Tanggal</span>
                                <span class="text-gray-800 font-medium text-right">25 Januari 2025</span>
                            </div>
                            <div class="flex justify-between text-[13px]">
                                <span class="text-gray-800 font-medium">Alamat</span>
                                <span class="text-gray-800 font-medium text-right leading-snug">Bandar Lampung</span>
                            </div>
                        </div>
                        <div class="h-[1px] bg-gray-100 my-5"></div>
                        <div class="space-y-3">
                            <div class="flex justify-between text-[13px]">
                                <span class="text-gray-800 font-medium">Harga</span>
                                <span class="text-gray-800 font-medium text-right">Rp 250.000</span>
                            </div>
                            <div class="flex justify-between items-center pt-1">
                                <span class="text-[#22C55E] font-extrabold text-lg tracking-tight">Total: Rp 250.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="mt-10 px-20 py-12 bg-white border-t border-gray-50">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <h3 class="text-green-700 font-extrabold text-lg italic tracking-tight">Pristine Sanctuary</h3>
            <div class="flex gap-10 text-gray-400 text-[12px] font-medium">
                <a href="#" class="hover:text-green-600 transition">Privacy Policy</a>
                <a href="#" class="hover:text-green-600 transition">Terms of Service</a>
                <a href="#" class="hover:text-green-600 transition">Help Center</a>
            </div>
            <p class="text-gray-400 text-[10px] font-medium tracking-wide">© 2024 The Pristine Sanctuary. Renewal in every corner.</p>
        </div>
    </footer>

</body>
</html>