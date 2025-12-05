<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanMagangController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Dashboard Admin (hanya setelah login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| Pengajuan Magang
|--------------------------------------------------------------------------
*/
Route::prefix('pengajuan')->group(function () {

    Route::get('/', function () {
        return view('pengajuan_magang');
    })->name('pengajuan.index');

    Route::post('/', [PengajuanMagangController::class, 'store'])
        ->name('pengajuan.store');

    Route::get('/sukses/{tracking}', function ($tracking) {
        return view('pengajuan_sukses', compact('tracking'));
    })->name('pengajuan.sukses');
});


/*
|--------------------------------------------------------------------------
| Cek Status
|--------------------------------------------------------------------------
*/
Route::prefix('status')->group(function () {

    Route::get('/', function () {
        return view('cek_status');
    })->name('status.index');

    Route::post('/cek-status', [PengajuanMagangController::class, 'checkStatus'])
        ->name('status.store');
});
