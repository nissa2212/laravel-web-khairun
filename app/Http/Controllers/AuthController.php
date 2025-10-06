<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function index()
    {
        return view('login-form');
    }

    /**
     * Memproses form login
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Validasi custom
        $errors = [];

        // Cek password minimal 3 karakter
        if (strlen($password) < 3) {
            $errors[] = 'Password harus minimal 3 karakter.';
        }

        // Cek password mengandung huruf kapital
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = 'Password harus mengandung minimal satu huruf kapital.';
        }

        // Jika ada errors, redirect back dengan pesan
        if (!empty($errors)) {
            return redirect('/auth')->withErrors($errors);
        }

        // Cek username dan password sama
        if ($username === $password) {
            // Login berhasil
            return view('welcome')->with([
                'message' => 'Login berhasil! Selamat datang ' . $username,
                'username' => $username
            ]);
        } else {
            // Login gagal
            return redirect('/auth')->withErrors([
                'Username dan password tidak sesuai.'
            ]);
        }
    }
}
