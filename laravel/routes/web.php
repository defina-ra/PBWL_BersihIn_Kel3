<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Project BersihIn
|--------------------------------------------------------------------------
*/

// --- HALAMAN UTAMA & LAYANAN ---
Route::get('/', function () {
    return view('bersihin.customer.landing');
});

Route::get('/bersihin/layanan', function () {
    return view('bersihin.customer.layanan');
});

Route::get('/bersihin/booking', function () {
    return view('bersihin.customer.booking');
});

Route::get('/bersihin/pembayaran', function () {
    return view('bersihin.customer.pembayaran');
});


// --- AREA CUSTOMER (DASHBOARD & FITUR) ---

// 1. Route Dashboard Utama
Route::get('/bersihin/customer/dashboard', function () {
    return view('bersihin.customer.dashboard');
});

// 2. Route Pesanan Saya
Route::get('/bersihin/customer/pesanan', function () {
    return view('bersihin.customer.pesanan');
});

// 3. Route Promo (Update Desain Baru)
Route::get('/bersihin/customer/promo', function () {
    return view('bersihin.customer.promo');
});


// --- AREA ADMIN ---
Route::get('/bersihin/admin', function () {
    return view('bersihin.admin.dashboardAdmin');
});
Route::get('/bersihin/admin/verifikasi', function () {
    return view('bersihin.admin.verifikasi');
});
Route::get('/bersihin/admin/petugas', function () {
    return view('bersihin.admin.petugas');
});
Route::get('/bersihin/admin/layanan', function () {
    return view('bersihin.admin.layanan');
});
Route::get('/bersihin/admin/laporan', function () {
    return view('bersihin.admin.laporan');
});
Route::get('/bersihin/admin/pengaturan', function () {
    return view('bersihin.admin.pengaturan');
})->name('admin.pengaturan');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/bersihin/login');
})->name('logout');
Route::get('/bersihin/admin/detail-pesanan', function () {
    return view('bersihin.admin.detail-pesanan');

});
Route::get('/bersihin/login', function () {
    return view('bersihin.auth.login');
});

Route::get('/bersihin/register', function () {
    return view('bersihin.auth.register');
});

Route::get('/bersihin/lupa-password', function () {
    return view('bersihin.auth.lupa-password');
});
Route::get('/bersihin/petugas/dashboard', function () {
    return view('bersihin.petugas.dashboard');
});
Route::get('/bersihin/petugas/jadwal', function () {
    return view('bersihin.petugas.jadwal');
});
Route::get('/bersihin/petugas/performance', function () {
    return view('bersihin.petugas.performance');
});
Route::get('/bersihin/petugas/pengaturan', function () {
    return view('bersihin.petugas.pengaturan');
});