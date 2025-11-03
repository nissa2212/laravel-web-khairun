<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        // Cek jika user tidak login, redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors([
                'Silakan login terlebih dahulu.'
            ]);
        }

        return view('admin.dashboard');
    }
}
