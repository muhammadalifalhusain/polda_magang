<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanMagangController;

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('auth.login');
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
