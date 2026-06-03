<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar - BersihIn</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center">

<div class="bg-white p-8 rounded-2xl shadow w-full max-w-md">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Buat Akun Baru</h1>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl px-4 py-3 mb-4">
            @foreach($errors->all() as $error)
                <p class="text-red-600 text-sm">⚠️ {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/bersihin/register">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-600 mb-1">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama lengkap"
                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-600 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com"
                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-600 mb-1">Nomor Telepon</label>
            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="081234567890"
                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm">
        </div>

        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-600 mb-1">Password</label>
            <input type="password" name="password" placeholder="Min. 8 karakter"
                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm">
        </div>

        <button type="submit"
            class="w-full bg-[#064E3B] text-white font-bold py-3 rounded-xl text-sm">
            Daftar Sekarang
        </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-4">
        Sudah punya akun? <a href="/bersihin/login" class="font-bold text-[#064E3B]">Masuk di sini</a>
    </p>
</div>

</body>
</html>