<?php

namespace App\Http\Controllers;

use App\Models\PengajuanMagang;
use App\Models\StatusPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengajuanMagangController extends Controller
{
    /**
     * Simpan pengajuan magang
     */
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

        // Generate tracking code unik
        $tracking = strtoupper(Str::random(10));

        // Upload file PDF ke public/surat_magang
        $pdfName = time() . '_' . $tracking . '.pdf';
        $request->file('surat_pdf')->move(public_path('surat_magang'), $pdfName);

        // Simpan ke tabel pengajuan
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

        // Simpan status awal (pending)
        StatusPengajuan::create([
            'pengajuan_id' => $pengajuan->id,
            'tracking_code' => $tracking,
            'status' => 0,
            'keterangan' => null
        ]);

        // >>> Redirect ke halaman sukses yang menampilkan tracking code
        return redirect()->route('pengajuan.sukses', ['tracking' => $tracking]);
    }


    /**
     * Cek status pengajuan berdasarkan tracking code
     */
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
