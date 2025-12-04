<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanMagangController;

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| GROUP ROUTE UNTUK PENGAJUAN MAGANG
|--------------------------------------------------------------------------
*/

Route::prefix('pengajuan')->group(function () {

    // Tampilkan form pengajuan
    Route::get('/', function () {
        return view('pengajuan_magang');
    })->name('pengajuan.form');

    // Proses submit form
    Route::post('/', [PengajuanMagangController::class, 'store'])
        ->name('pengajuan.store');

    // Halaman sukses setelah submit
    Route::get('/sukses/{tracking}', function ($tracking) {
        return view('pengajuan_sukses', compact('tracking'));
    })->name('pengajuan.sukses');

    // Cek status pengajuan
    Route::post('/cek-status', [PengajuanMagangController::class, 'checkStatus'])
        ->name('pengajuan.status');

});
