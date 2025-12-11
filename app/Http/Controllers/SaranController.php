<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email',
            'pesan' => 'required|string'
        ]);

        Saran::create($validated);

        return redirect()->back()->with('success', 'Saran Anda berhasil dikirim!');
    }
}
