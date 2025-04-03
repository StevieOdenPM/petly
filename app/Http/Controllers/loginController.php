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

    // Proses login untuk web
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

    // Proses login untuk API (Postman)
    public function apiLogin(Request $request)
    {
        // Validasi tetap sama
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Coba login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'message' => 'Login berhasil!',
                'user' => $user,
                'token' => $token
            ], 200);
        }

        return response()->json([
            'message' => 'Email atau password salah.'
        ], 401);
    }
}
