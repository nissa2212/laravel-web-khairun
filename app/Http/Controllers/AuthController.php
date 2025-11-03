<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function index()
    {
        // Jika user sudah login, redirect ke dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('login-form');
    }

    /**
     * Memproses form login
     */
    public function login(Request $request)
    {
        // Validasi input - ubah username menjadi email
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // Cari user berdasarkan email
        $user = User::where('email', $email)->first();

        // Cek apakah email ditemukan
        if (!$user) {
            return redirect('/auth')->withErrors([
                'Email tidak ditemukan.'
            ])->withInput($request->except('password'));
        }

        // Cek password menggunakan Hash::check
        if (!Hash::check($password, $user->password)) {
            return redirect('/auth')->withErrors([
                'Password tidak sesuai.'
            ])->withInput($request->except('password'));
        }

        // Login berhasil - set session/auth dan redirect ke dashboard
        Auth::login($user);

        return redirect()->route('dashboard')->with([
            'success' => 'Login berhasil! Selamat datang ' . $user->name
        ]);
    }

    /**
     * Logout
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/auth')->with('success', 'Logout berhasil!');
    }
}
