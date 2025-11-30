<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Halaman login
    public function index()
    {
        return view('perpus.login');
    }

    // Proses Login
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Proses login
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/perpus');
        }

        return back()->with('loginError', 'Username atau Password salah!');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah logout!');
    }
}
