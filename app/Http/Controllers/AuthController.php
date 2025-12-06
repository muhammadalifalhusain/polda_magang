<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Gunakan attempt agar sesuai standar Laravel
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // regenerate session untuk keamanan
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // Jika gagal, kirim pesan error
        return back()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('error', 'Anda telah logout');
    }
}
