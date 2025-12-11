<?php

namespace App\Http\Controllers;

use App\Models\PengajuanMagang;
use App\Models\StatusPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengajuanMagangController extends Controller
{

    // Method Store DB
    public function store(Request $request)
    {
        $request->validate([
            'universitas' => 'required|string|max:150',
            'jurusan' => 'required|string|max:150',
            'semester' => 'required|integer|min:1|max:14',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'surat_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        // Ambil data dari session
        $userId = session('user_id');
        $username = session('username');

        if (!$userId || !$username) {
            return back()->with('error', 'Session pengguna tidak ditemukan. Silakan login ulang.');
        }

        // Generate tracking code
        $tracking = strtoupper(Str::random(10));

        // Upload PDF
        $pdfName = time() . '_' . $tracking . '.pdf';
        $request->file('surat_pdf')->move(public_path('surat_magang'), $pdfName);

        $pengajuan = PengajuanMagang::create([
            'user_id'        => $userId,
            'nama'           => $username,
            'tracking_code'  => $tracking,  
            'universitas'    => $request->universitas,
            'jurusan'        => $request->jurusan,
            'semester'       => $request->semester,
            'tanggal_mulai'  => $request->tanggal_mulai,
            'tanggal_selesai'=> $request->tanggal_selesai,
            'surat_pdf'      => $pdfName
        ]);
        StatusPengajuan::create([
            'user_id' => $userId,
            'tracking_code'=> $tracking,
            'status'       => 0,
            'keterangan'   => null
        ]);

        // Redirect ke halaman sukses
        return redirect()->route('pengajuan.sukses', ['tracking' => $tracking])
            ->with('success', 'Pengajuan berhasil dikirim!');
    }


    public function checkStatus(Request $request)
    {
        $request->validate([
            'tracking_code' => 'required|string'
        ]);

        $status = StatusPengajuan::where('tracking_code', $request->tracking_code)->first();

        if (!$status) {
            return redirect()->back()->with('error', 'Tracking code tidak ditemukan!');
        }

        return view('status_pengajuan', [
            'status' => $status
        ]);
    }
}
