<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Coba login dengan kredensial yang diberikan
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('dashboard'); // Redirect ke dashboard jika sukses
        }

        // Jika gagal, kembali ke login dengan pesan error
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}
