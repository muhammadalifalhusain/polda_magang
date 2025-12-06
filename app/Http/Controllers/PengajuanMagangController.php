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
            'nama' => 'required|string|max:150',
            'universitas' => 'required|string|max:150',
            'jurusan' => 'required|string|max:150',
            'semester' => 'required|integer|min:1|max:14',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'surat_pdf' => 'required|mimes:pdf|max:2048',
        ]);
        $tracking = strtoupper(Str::random(10));
        $pdfName = time() . '_' . $tracking . '.pdf';
        $request->file('surat_pdf')->move(public_path('surat_magang'), $pdfName);

        $pengajuan = PengajuanMagang::create([
            'tracking_code' => $tracking,
            'nama' => $request->nama,
            'universitas' => $request->universitas,
            'jurusan' => $request->jurusan,
            'semester' => $request->semester,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'surat_pdf' => $pdfName
        ]);
        StatusPengajuan::create([
            'pengajuan_id' => $pengajuan->id,
            'tracking_code' => $tracking,
            'status' => 0,
            'keterangan' => null
        ]);
        return redirect()->route('pengajuan.sukses', ['tracking' => $tracking]);
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
