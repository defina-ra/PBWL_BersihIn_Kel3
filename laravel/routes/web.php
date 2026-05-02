<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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