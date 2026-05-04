<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layanan', function () {
    return view('layanan');
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
});