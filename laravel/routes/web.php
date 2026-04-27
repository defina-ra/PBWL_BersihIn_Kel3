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
    return view('welcome');
});

// ===== BERSIHIN =====
Route::get('/bersihin', function () {
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
    return view('bersihin.admin.dashboard');
});