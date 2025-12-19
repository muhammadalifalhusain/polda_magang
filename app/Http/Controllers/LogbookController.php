<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusPengajuan;
use App\Models\Logbook;
use App\Models\User;

class LogbookController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
        $user = User::find($userId);
        $statusPengajuan = StatusPengajuan::where('user_id', $userId)->first();

        if (!$statusPengajuan) {
            return view('logbook.not_allowed', ['message' => 'Anda belum mengajukan magang.']);
        }

        if ($statusPengajuan->status == 0) {
            return view('logbook.not_allowed', ['message' => 'Pengajuan Anda masih diproses. Logbook belum dapat diakses.']);
        }

        if ($statusPengajuan->status == 2) {
            return view('logbook.not_allowed', ['message' => 'Pengajuan Anda ditolak. Logbook belum dapat diakses.']);
        }

        // Jika diterima → ambil logbook
        $logbooks = Logbook::where('user_id', $userId)->latest()->get();

        return view('logbook.index', compact('logbooks', 'user'));
    }
    
    public function create()
    {
        $user = User::find(session('user_id'));

        // Cegah akses jika nama_project belum ada
        if (!$user->judul_project) {
            return redirect()->route('user.logbook.index')
                ->with('error', 'Anda wajib mengisi Nama Project terlebih dahulu sebelum membuat logbook.');
        }

        return view('logbook.create');
    }


    // ============================
    // 1. STORE NAMA PROJECT
    // ============================
    public function storeNamaProject(Request $request)
    {
        $request->validate([
            'nama_project' => 'required|string|max:255'
        ]);

        $user = User::find(session('user_id'));

        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login.');
        }

        $user->update([
            'judul_project' => $request->nama_project
        ]);

        return redirect()->route('user.logbook.index')->with('success', 'Nama project berhasil disimpan.');
    }

    // ============================
    // 2. STORE LOGBOOK
    // ============================
    public function storeLogbook(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $user = User::find(session('user_id'));

        // Cegah pembuatan logbook jika nama_project belum ada
        if (!$user->judul_project) {
            return redirect()->route('user.logbook.index')
                ->with('error', 'Anda wajib mengisi Nama Project terlebih dahulu.');
        }

        Logbook::create([
            'user_id' => $user->id,
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('user.logbook.index')->with('success', 'Logbook berhasil ditambahkan.');
    }

}
