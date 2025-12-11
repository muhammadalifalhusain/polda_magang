<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PengajuanMagang;
use App\Models\StatusPengajuan;

class ProfileMahasiswaController extends Controller
{
    /**
     * Menampilkan Dashboard Mahasiswa
     */
    public function index()
    {
        // Data user yang sedang login
        $user = Auth::user();

        // Ambil data pengajuan berdasarkan user_id
        $pengajuan = PengajuanMagang::where('user_id', $user->id)->first();
        $statusPengajuan = StatusPengajuan::where('user_id', $user->id)->first();

        return view('mahasiswa.dashboard', compact('user', 'pengajuan', 'statusPengajuan'));
    }
}
