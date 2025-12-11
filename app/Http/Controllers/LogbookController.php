<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusPengajuan;
use App\Models\Logbook;

class LogbookController extends Controller
{
    public function index()
    {
        // Ambil user_id dari session
        $userId = session('user_id');

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil status pengajuan user
        $statusPengajuan = StatusPengajuan::where('user_id', $userId)->first();

        // Jika belum mengajukan
        if (!$statusPengajuan) {
            return view('logbook.not_allowed', [
                'message' => 'Anda belum mengajukan magang.'
            ]);
        }

        // Jika pending
        if ($statusPengajuan->status == 0) {
            return view('logbook.not_allowed', [
                'message' => 'Pengajuan Anda masih diproses. Logbook belum dapat diakses.'
            ]);
        }

        // Jika ditolak
        if ($statusPengajuan->status == 2) {
            return view('logbook.not_allowed', [
                'message' => 'Pengajuan Anda ditolak. Logbook tidak dapat diakses.'
            ]);
        }

        // Jika diterima → tampilkan halaman logbook
        $logbooks = Logbook::where('user_id', $userId)->latest()->get();

        return view('logbook.index', compact('logbooks'));
    }
}
