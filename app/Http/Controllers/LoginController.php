<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import namespace untuk model User

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

public function callback()
{
    $googleUser = Socialite::driver('google')->user();
    $user = User::where('email', $googleUser->email)->first();

    // Cek apakah pengguna adalah admin
    $isAdmin = ($googleUser->email === 'dianayu8285@gmail.com');

    if (!$user) {
        $user = User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'is_admin' => $isAdmin, // Tambahkan kolom 'is_admin' ke tabel user
        ]);
    }

    Auth::login($user);

    if ($isAdmin) {
        // Jika pengguna adalah admin, arahkan ke dashboard biasa
        return redirect()->route('login.dashboard');
    } else {
        // Jika pengguna bukan admin, arahkan ke dashboarduser
        return redirect()->route('dashboarduser');
    }
}
}