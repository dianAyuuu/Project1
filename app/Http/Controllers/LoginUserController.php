<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginUserController extends Controller
{
    public function showLoginForm()
    {
        return view('loginuser'); // pastikan view ini ada di resources/views/loginuser.blade.php
    }
    public function showDashboard()
{
    return view('dashboarduser'); // pastikan view ini ada di resources/views/dashboarduser.blade.php
}


    public function login(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboarduser'); // Ganti dengan rute yang sesuai
        } else {
            return redirect()->route('login.user')->with('error', 'Email tidak ditemukan.');
        }
    }
}
