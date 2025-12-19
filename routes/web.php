<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanMagangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ProfileMahasiswaController;
use App\Http\Controllers\SaranController;


/*
|--------------------------------------------------------------------------
| Halaman Utama (Public)
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('home'));
Route::get('/profil', fn() => view('profil_polda'));
Route::get('/struktur', fn() => view('struktur_polda'));
Route::get('/galeri', fn() => view('galeri'))->name('galeri');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| USER (Mahasiswa)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        // Dashboard Mahasiswa
        Route::get('/dashboard', [ProfileMahasiswaController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | PENGAJUAN MAGANG
        |--------------------------------------------------------------------------
        */
        Route::prefix('pengajuan')->name('pengajuan.')->group(function () {

            Route::get('/', fn() => view('pengajuan_magang'))->name('index');

            Route::post('/', [PengajuanMagangController::class, 'store'])
                ->name('store');

            Route::get('/sukses/{tracking}', function ($tracking) {
                return view('pengajuan_sukses', compact('tracking'));
            })->name('sukses');
        });

        /*
        |--------------------------------------------------------------------------
        | LOGBOOK (muncul jika sudah diterima)
        |--------------------------------------------------------------------------
        */
        Route::prefix('logbook')->name('logbook.')->group(function () {

            // halaman utama logbook
            Route::get('/', [LogbookController::class, 'index'])
                ->name('index');

            Route::get('/create', [LogbookController::class, 'create'])
                ->name('create');

            // simpan nama project
            Route::post('/store-project', [LogbookController::class, 'storeNamaProject'])
                ->name('store.project');

            // simpan logbook
            Route::post('/store', [LogbookController::class, 'storeLogbook'])
                ->name('store');
        });
        Route::prefix('status')->name('status.')->group(function () {
            Route::get('/', fn() => view('cek_status'))->name('index');

            Route::post('/cek-status', [PengajuanMagangController::class, 'checkStatus'])
                ->name('store');
        });
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


/*
|--------------------------------------------------------------------------
| KEGIATAN (Public)
|--------------------------------------------------------------------------
*/

Route::prefix('kegiatan')->name('kegiatan.')->group(function () {

    Route::get('/', fn() => view('kegiatan'))->name('index');
    Route::get('/agenda', fn() => view('agenda'))->name('agenda');
    Route::get('/dokumentasi', fn() => view('dokumentasi'))->name('dokumentasi');
    Route::get('/modul', fn() => view('modul'))->name('modul');

    Route::get('/saran', fn() => view('saran'))->name('saran');
    Route::post('/saran', [SaranController::class, 'store'])->name('saran.store');
    
});

