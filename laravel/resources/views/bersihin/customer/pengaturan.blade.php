@extends('bersihin.layouts.app')

@section('page-title', 'Pengaturan Profil')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap');
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .profile-card { background: white; border-radius: 20px; border: 1px solid #f0fdf4; box-shadow: 0 2px 12px rgba(0,0,0,0.05); overflow: hidden; }
    .section-header { display: flex; align-items: center; gap: 8px; padding: 18px 24px; border-bottom: 1px solid #f9fafb; background: #fafffe; }
    .section-icon { width: 32px; height: 32px; border-radius: 8px; background: #dcfce7; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .section-title { font-size: 14px; font-weight: 700; color: #064e3b; }
    .section-body { padding: 20px 24px; }
    .form-group { margin-bottom: 16px; }
    .form-label { display: block; font-size: 11px; font-weight: 700; color: #6b7280; letter-spacing: 0.8px; text-transform: uppercase; margin-bottom: 6px; }
    .form-input { width: 100%; border: 1.5px solid #e5e7eb; border-radius: 10px; padding: 10px 14px; font-size: 13px; color: #111827; background: white; transition: all 0.2s; outline: none; font-family: 'Plus Jakarta Sans', sans-serif; }
    .form-input:focus { border-color: #10b981; box-shadow: 0 0 0 3px rgba(16,185,129,0.1); }
    textarea.form-input { resize: none; }
    .input-with-icon { position: relative; }
    .input-with-icon .form-input { padding-left: 40px; }
    .input-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af; }
    .avatar-ring { width: 88px; height: 88px; border-radius: 50%; border: 3px solid #10b981; padding: 2px; position: relative; flex-shrink: 0; }
    .avatar-ring img { width: 100%; height: 100%; border-radius: 50%; object-fit: cover; }
    .avatar-edit-btn { position: absolute; bottom: 2px; right: 2px; width: 24px; height: 24px; background: linear-gradient(135deg,#059669,#10b981); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 2px solid white; transition: all 0.2s; }
    .avatar-edit-btn:hover { transform: scale(1.1); }
    .stat-pill { background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 12px; padding: 10px 16px; text-align: center; flex: 1; }
    .btn-primary { background: linear-gradient(135deg,#059669,#10b981); color: white; border: none; border-radius: 10px; padding: 11px 28px; font-size: 13px; font-weight: 700; cursor: pointer; transition: all 0.2s; font-family: 'Plus Jakarta Sans', sans-serif; }
    .btn-primary:hover { background: linear-gradient(135deg,#047857,#059669); box-shadow: 0 4px 14px rgba(5,150,105,0.35); transform: translateY(-1px); }
    .btn-outline { background: white; color: #374151; border: 1.5px solid #e5e7eb; border-radius: 10px; padding: 11px 20px; font-size: 13px; font-weight: 600; cursor: pointer; transition: all 0.2s; font-family: 'Plus Jakarta Sans', sans-serif; }
    .btn-outline:hover { border-color: #10b981; color: #059669; background: #f0fdf4; }
    .btn-danger-soft { background: #fef2f2; color: #b91c1c; border: 1.5px solid #fecaca; border-radius: 10px; padding: 11px 20px; font-size: 13px; font-weight: 600; cursor: pointer; transition: all 0.2s; font-family: 'Plus Jakarta Sans', sans-serif; }
    .btn-danger-soft:hover { background: #fee2e2; }
    .password-toggle { position: absolute; right: 12px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #9ca3af; transition: color 0.2s; }
    .password-toggle:hover { color: #059669; }
    .notif-row { display: flex; align-items: center; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #f3f4f6; }
    .notif-row:last-child { border-bottom: none; }
    .toggle { position: relative; display: inline-block; width: 40px; height: 22px; }
    .toggle input { opacity: 0; width: 0; height: 0; }
    .toggle-slider { position: absolute; cursor: pointer; inset: 0; background: #e5e7eb; border-radius: 99px; transition: 0.3s; }
    .toggle-slider:before { content: ''; position: absolute; width: 16px; height: 16px; left: 3px; bottom: 3px; background: white; border-radius: 50%; transition: 0.3s; box-shadow: 0 1px 3px rgba(0,0,0,0.2); }
    .toggle input:checked + .toggle-slider { background: linear-gradient(135deg,#059669,#10b981); }
    .toggle input:checked + .toggle-slider:before { transform: translateX(18px); }
    .strength-bar { height: 4px; background: #e5e7eb; border-radius: 99px; overflow: hidden; margin-top: 6px; }
    .strength-fill { height: 100%; border-radius: 99px; transition: width 0.3s, background 0.3s; width: 0%; }
</style>

@php $user = auth()->user(); @endphp

<div class="p-6 max-w-4xl mx-auto space-y-5">

    <div>
        <h1 class="text-2xl font-bold text-gray-900">Pengaturan Profil</h1>
        <p class="text-gray-500 text-sm mt-0.5">Kelola informasi pribadi dan preferensi akunmu</p>
    </div>

    {{-- Flash messages --}}
    @if(session('success'))
    <div class="flex items-center gap-2 bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm font-semibold">
        <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="flex items-center gap-2 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm font-semibold">
        ⚠️ {{ session('error') }}
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

        {{-- LEFT --}}
        <div class="space-y-4">
            <div class="profile-card p-6 text-center">
                <div class="flex justify-center mb-4">
                    <div class="avatar-ring">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=dcfce7&color=064e3b&bold=true&size=150" alt="{{ $user->name }}" id="avatarImg">
                        <div class="avatar-edit-btn" onclick="document.getElementById('avatarInput').click()">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        </div>
                    </div>
                    <input type="file" id="avatarInput" accept="image/*" class="hidden" onchange="previewAvatar(this)">
                </div>
                <p class="font-bold text-gray-900 text-lg">{{ $user->name }}</p>
                <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                <p class="text-xs text-gray-400 mt-3">Bergabung sejak {{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('F Y') }}</p>

                <div class="flex gap-2 mt-4">
                    <div class="stat-pill">
                        <p class="text-lg font-black text-emerald-700">{{ \DB::table('bookings')->where('user_id',$user->id)->count() }}</p>
                        <p class="text-xs text-gray-500">Pesanan</p>
                    </div>
                    <div class="stat-pill">
                        <p class="text-lg font-black text-emerald-700">{{ \DB::table('bookings')->where('user_id',$user->id)->where('status','done')->count() }}</p>
                        <p class="text-xs text-gray-500">Selesai</p>
                    </div>
                </div>

                <button onclick="document.getElementById('avatarInput').click()" class="btn-outline w-full mt-4 text-sm">
                    Ganti Foto Profil
                </button>
            </div>

            {{-- Notifikasi --}}
            <div class="profile-card">
                <div class="section-header">
                    <div class="section-icon">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    </div>
                    <p class="section-title">Notifikasi</p>
                </div>
                <div class="section-body">
                    <div class="notif-row">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Status Pesanan</p>
                            <p class="text-xs text-gray-400">Update real-time pesananmu</p>
                        </div>
                        <label class="toggle"><input type="checkbox" checked><span class="toggle-slider"></span></label>
                    </div>
                    <div class="notif-row">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Promo & Voucher</p>
                            <p class="text-xs text-gray-400">Penawaran eksklusif untukmu</p>
                        </div>
                        <label class="toggle"><input type="checkbox" checked><span class="toggle-slider"></span></label>
                    </div>
                    <div class="notif-row">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Email Newsletter</p>
                            <p class="text-xs text-gray-400">Tips kebersihan & info layanan</p>
                        </div>
                        <label class="toggle"><input type="checkbox"><span class="toggle-slider"></span></label>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="lg:col-span-2 space-y-4">

            {{-- Informasi Pribadi --}}
            <form method="POST" action="/bersihin/customer/pengaturan">
            @csrf
            <div class="profile-card">
                <div class="section-header">
                    <div class="section-icon">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <p class="section-title">Informasi Pribadi</p>
                </div>
                <div class="section-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-group">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-input" value="{{ old('name', $user->name) }}" placeholder="Nama lengkap kamu">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nomor WhatsApp</label>
                            <div class="input-with-icon">
                                <svg class="input-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <input type="tel" name="phone" class="form-input" value="{{ old('phone', $user->phone ?? '') }}" placeholder="+62 8xx-xxxx-xxxx">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="input-with-icon">
                            <svg class="input-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                            <input type="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" placeholder="Email aktif kamu">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Keamanan --}}
            <div class="profile-card">
                <div class="section-header">
                    <div class="section-icon">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <p class="section-title">Ganti Password</p>
                </div>
                <div class="section-body">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="form-group mb-0">
                            <label class="form-label">Password Lama</label>
                            <div class="input-with-icon relative">
                                <svg class="input-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <input type="password" name="password_lama" class="form-input" placeholder="••••••••" style="padding-right:36px" id="passLama">
                                <span class="password-toggle" onclick="togglePass('passLama',this)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label class="form-label">Password Baru</label>
                            <div class="input-with-icon relative">
                                <svg class="input-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <input type="password" name="password_baru" class="form-input" placeholder="Min. 8 karakter" style="padding-right:36px" id="passBaru" oninput="checkStrength(this.value)">
                                <span class="password-toggle" onclick="togglePass('passBaru',this)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </span>
                            </div>
                            <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
                            <p class="text-xs text-gray-400 mt-1" id="strengthLabel"></p>
                        </div>
                        <div class="form-group mb-0">
                            <label class="form-label">Konfirmasi Password</label>
                            <div class="input-with-icon relative">
                                <svg class="input-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                <input type="password" name="password_konfirm" class="form-input" placeholder="Ulangi password baru" style="padding-right:36px" id="passKonfirm">
                                <span class="password-toggle" onclick="togglePass('passKonfirm',this)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-3">* Kosongkan bagian password jika tidak ingin mengganti password</p>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-between flex-wrap gap-3">
                <div></div>
                <div class="flex gap-3">
                    <a href="/bersihin/customer/dashboard" class="btn-outline">Batal</a>
                    <button type="submit" class="btn-primary">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Perubahan
                        </span>
                    </button>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>

<script>
function togglePass(id, el) {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
}

function checkStrength(val) {
    const fill = document.getElementById('strengthFill');
    const label = document.getElementById('strengthLabel');
    if (!val) { fill.style.width='0%'; label.textContent=''; return; }
    let score = 0;
    if (val.length >= 8) score++;
    if (/[A-Z]/.test(val)) score++;
    if (/[0-9]/.test(val)) score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;
    const levels = [
        {w:'25%', bg:'#ef4444', t:'Terlalu lemah'},
        {w:'50%', bg:'#f59e0b', t:'Sedang'},
        {w:'75%', bg:'#3b82f6', t:'Cukup kuat'},
        {w:'100%', bg:'#10b981', t:'Sangat kuat ✓'},
    ];
    const l = levels[score - 1] || levels[0];
    fill.style.width = l.w;
    fill.style.background = l.bg;
    label.textContent = l.t;
    label.style.color = l.bg;
}

function previewAvatar(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => document.getElementById('avatarImg').src = e.target.result;
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection