<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lupa Password - BersihIn</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; }
  input:focus { outline: none; border-color: #064E3B; }
</style>
</head>
<body class="min-h-screen bg-gray-50 flex flex-col items-center justify-center px-4">

  
  <div class="text-center mb-8">
    <div class="w-16 h-16 bg-white rounded-2xl shadow-sm border border-gray-100 flex items-center justify-center mx-auto mb-4 overflow-hidden">
      <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=200&q=80"
           alt="BersihIn" class="w-full h-full object-cover"
           onerror="this.style.display='none'">
    </div>
    <h1 class="text-[#064E3B] font-extrabold text-2xl">BersihIn</h1>
    <p class="text-gray-400 text-xs font-semibold tracking-widest uppercase mt-1">Professional Reliability</p>
  </div>

  
  <div class="bg-white rounded-2xl shadow-sm border border-gray-100 w-full max-w-md p-8">

    
    <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-5">
      <svg class="w-7 h-7 text-[#064E3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
      </svg>
    </div>

    <h2 class="text-2xl font-extrabold text-gray-900 text-center mb-2">Reset Kata Sandi</h2>
    <p class="text-gray-400 text-sm text-center leading-relaxed mb-8">
      Masukkan email Anda untuk menerima tautan pengaturan ulang kata sandi.
    </p>

    
    <div id="formSection">
      <div class="mb-5">
        <label class="block text-xs font-bold text-gray-600 uppercase tracking-wide mb-2">Alamat Email</label>
        <div class="relative">
          <div class="absolute left-4 top-1/2 -translate-y-1/2">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </div>
          <input type="email" id="emailInput" placeholder="nama@email.com"
            class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-11 pr-4 py-3 text-sm text-gray-700 transition">
        </div>
      </div>

      <button onclick="kirimReset()"
        class="w-full bg-[#064E3B] hover:bg-emerald-800 text-white font-bold py-3.5 rounded-xl text-sm transition flex items-center justify-center gap-2 mb-6">
        Kirim Link Reset
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
      </button>
    </div>

    
    <div id="suksesSection" class="hidden text-center py-4">
      <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2.5" d="M5 13l4 4L19 7"/>
        </svg>
      </div>
      <h3 class="font-bold text-gray-900 mb-2">Link Reset Terkirim!</h3>
      <p class="text-gray-400 text-sm leading-relaxed mb-6">
        Cek email Anda dan klik link yang dikirimkan untuk mereset kata sandi.
      </p>
    </div>

    
    <div class="border-t border-gray-100 pt-5">
      <a href="/bersihin/login"
        class="flex items-center justify-center gap-2 text-[#064E3B] text-sm font-semibold hover:underline">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
        </svg>
        Kembali ke Login
      </a>
    </div>

  </div>

  
  <div class="text-center mt-8">
    <p class="text-xs text-gray-400">© 2024 BersihIn Cleaning Services. Professional Reliability.</p>
  </div>

</body>

<script>
function kirimReset() {
  const email = document.getElementById('emailInput').value;
  if (!email) {
    alert('Mohon masukkan alamat email Anda.');
    return;
  }
  document.getElementById('formSection').classList.add('hidden');
  document.getElementById('suksesSection').classList.remove('hidden');
}
</script>
</html><?php /**PATH C:\laragon\www\prak-web-lanjut-2407051023\PBWL_BersihIn_Kel3\laravel\resources\views/bersihin/auth/lupa-password.blade.php ENDPATH**/ ?>