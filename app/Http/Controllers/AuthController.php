<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();

            session([
                'user_id' => Auth::user()->id,
                'username' => Auth::user()->name
            ]);

            // Debugging: cek apakah ID tersimpan
            // dd([
            //     'auth_usser' => Auth::user(),
            //     'session_user_id' => session('user_id')
            // ]);

            // Redirect berdasarkan role (tidak berjalan karena dd menghentikan)
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }


    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth/login')->with('error', 'Anda telah logout');
    }
}
