<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatusPengajuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil status dari URL, default = 0 (Pending)
        $status = $request->get('status', 0);

        // Ambil data sesuai status
        $data = StatusPengajuan::with('pengajuan')
                    ->where('status', $status)
                    ->get();

        // Kirim ke view
        return view('admin.dashboard_admin', [
            'data' => $data,
            'status' => $status
        ])->with('cek_view', 'INI VIEW ADMIN DASHBOARD TERBARU');

    }

}
