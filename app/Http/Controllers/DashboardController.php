<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Periksa apakah pengguna sedang login
        if (Auth::check()) {
            // Jika ya, ambil informasi pengguna
            $user = Auth::user();
            // Kirimkan informasi pengguna ke view
            return view('dashboard', compact('user'));
        } else {
            // Jika tidak, kembalikan pengguna ke halaman login
            return redirect()->route('login');
        }
    }
}
