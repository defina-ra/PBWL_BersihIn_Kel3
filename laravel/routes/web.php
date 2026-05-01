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
    return view('bersihin.admin.dashboard');
});