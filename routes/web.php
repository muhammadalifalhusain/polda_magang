<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanMagangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;

Route::get('/', function () {
    return view('home');
});

Route::get('/profil', function () {
    return view('profil_polda');
});

Route::get('/struktur', function () {
    return view('struktur_polda');
});

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');


Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});

Route::middleware(['auth'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

    Route::get('/dashboard', function () {
        return view('mahasiswa.dashboard');
    })->name('dashboard');

});

Route::middleware(['auth', 'adminOnly'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/detail/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'detail'])
        ->name('detail');

    Route::post('/update-status/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'updateStatus'])
        ->name('updateStatus');

    Route::get('/download-surat/{filename}', [\App\Http\Controllers\Admin\DashboardController::class, 'downloadSurat'])
        ->name('downloadSurat');
});


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


Route::prefix('status')->group(function () {

    Route::get('/', function () {
        return view('cek_status');
    })->name('status.index');

    Route::post('/cek-status', [PengajuanMagangController::class, 'checkStatus'])
        ->name('status.store');
});

// KEGIATAN (GROUP PREFIX)
Route::prefix('kegiatan')->name('kegiatan.')->group(function () {

    // Halaman Utama Kegiatan
    Route::get('/', function () {
        return view('kegiatan');
    })->name('index');

    // Agenda Kegiatan
    Route::get('/agenda', function () {
        return view('agenda');
    })->name('agenda');

    // Dokumentasi Kegiatan
    Route::get('/dokumentasi', function () {
        return view('dokumentasi');
    })->name('dokumentasi');

    // Modul Magang
    Route::get('/modul', function () {
        return view('modul');
    })->name('modul');

    // Saran & Masukan
    Route::get('/saran', function () {
        return view('saran');
    })->name('saran');
});
