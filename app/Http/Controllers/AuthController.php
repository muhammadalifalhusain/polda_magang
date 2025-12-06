<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = \App\Models\User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan');
        }
        if ($user->password !== $request->password) {
            return back()->with('error', 'Password salah');
        }
        \Illuminate\Support\Facades\Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('error', 'Anda telah logout');
    }
}
