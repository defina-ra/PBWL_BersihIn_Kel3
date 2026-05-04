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
})->name('beranda');

Route::get('/bersihin/layanan', function () {
    return view('bersihin.customer.layanan');
})->name('layanan');

Route::get('/bersihin/booking', function () {
    return view('bersihin.customer.booking');
})->name('booking');

Route::get('/bersihin/pembayaran', function () {
    return view('bersihin.customer.pembayaran');
})->name('pembayaran');


// --- AREA CUSTOMER (DASHBOARD & FITUR) ---
Route::get('/bersihin/customer/dashboard', function () {
    return view('bersihin.customer.dashboard');
})->name('customer.dashboard');

Route::get('/bersihin/customer/pesanan', function () {
    return view('bersihin.customer.pesanan');
})->name('customer.pesanan');

Route::get('/bersihin/customer/promo', function () {
    return view('bersihin.customer.promo');
})->name('customer.promo');


// --- AREA ADMIN ---
Route::get('/bersihin/admin', function () {
    return view('bersihin.admin.dashboardAdmin');
})->name('admin.dashboard');

Route::get('/bersihin/login', function () {
    return view('bersihin.auth.login');
})->name('login');

Route::get('/bersihin/register', function () {
    return view('bersihin.auth.register');
})->name('register');