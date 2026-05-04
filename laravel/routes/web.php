<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ===== AUTH BERSIHIN =====
Route::get('/bersihin/login', function () {
    return view('bersihin.auth.login');
});

Route::post('/bersihin/login', function () {
    $credentials = request()->only('email', 'password');

    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect('/bersihin/admin');
        } elseif ($user->hasRole('petugas')) {
            return redirect('/bersihin/petugas/dashboard');
        } elseif ($user->hasRole('customer')) {
            return redirect('/bersihin/customer/dashboard');
        } else {
            return redirect('/bersihin');
        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
});

Route::get('/bersihin/register', function () {
    return view('bersihin.auth.register');
});

Route::get('/bersihin/lupa-password', function () {
    return view('bersihin.auth.lupa-password');
});

// ===== ADMIN ONLY =====
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/bersihin/admin', function () {
        return view('bersihin.admin.dashboardAdmin');
    });
    Route::get('/bersihin/admin/verifikasi', function () {
        return view('bersihin.admin.verifikasi');
    });
    Route::get('/bersihin/admin/petugas', function () {
        return view('bersihin.admin.petugas');
    });
    Route::get('/bersihin/admin/laporan', function () {
        return view('bersihin.admin.laporan');
    });
    Route::get('/bersihin/admin/layanan', function () {
        return view('bersihin.admin.layanan');
    });
    Route::get('/bersihin/admin/pengaturan', function () {
        return view('bersihin.admin.pengaturan');
    });
    Route::get('/bersihin/admin/detail-pesanan', function () {
        return view('bersihin.admin.detail-pesanan');
    });
});

// ===== PETUGAS ONLY =====
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/bersihin/petugas/dashboard', function () {
        return view('bersihin.petugas.dashboard');
    });
});
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/bersihin/petugas/dashboard', function () {
        return view('bersihin.petugas.dashboard');
    });
});
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/bersihin/petugas/dashboard', function () {
        return view('bersihin.petugas.dashboard');
    });
    Route::get('/bersihin/petugas/pengaturan', function () {
        return view('bersihin.petugas.pengaturan');
    });
});

// ===== CUSTOMER ONLY =====
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/bersihin', function () {
        return view('bersihin.customer.landing');
    });
    Route::get('/bersihin/customer/dashboard', function () {
        return view('bersihin.customer.dashboard');
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
    Route::get('/bersihin/customer/pesanan', function () {
        return view('bersihin.customer.pesanan');
    });
    Route::get('/bersihin/customer/riwayat-pesanan', function () {
    return view('bersihin.customer.riwayat-pesanan');
});
    Route::get('/bersihin/customer/ulasan', function () {
        return view('bersihin.customer.ulasan');
    });
    Route::get('/bersihin/customer/pengaturan', function () {
        return view('bersihin.customer.pengaturan');
    });
    Route::get('/bersihin/customer/promo', function () {
        return view('bersihin.customer.promo');
    });
});