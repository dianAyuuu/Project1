<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\PDFsController;
use App\Http\Controllers\PPTsController;
use Illuminate\Support\Facades\Auth;


Route::middleware(['web'])->group(function () {
    // Rute Login
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::get('/google/redirect', [LoginController::class, 'redirect'])->name('google.redirect');
    Route::get('/google/callback', [LoginController::class, 'callback'])->name('google.callback');
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('login.dashboard');

    // Rute Logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    // Rute Dashboard setelah login
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('login.dashboard');
});

// Rute Manajemen Pengguna
Route::get('/user-management', [UserController::class, 'index'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

// Rute Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');

Route::middleware(['web'])->group(function () {
    // Rute untuk login user
    Route::get('/loginuser', [LoginUserController::class, 'showLoginForm'])->name('login.user');
    Route::post('/loginuser', [LoginUserController::class, 'loginuser'])->name('login.user.submit');

    // Grup rute dashboarduser dengan middleware auth
    Route::middleware(['auth'])->group(function () {
        // Rute untuk dashboard user
        Route::get('/dashboarduser', [DashboardUserController::class, 'index'])->name('dashboarduser');
        Route::get('/dashboarduser/tutorial-gallery', [DashboardUserController::class, 'tutorialGallery'])->name('user.tutorial_gallery');
    });
});

// routes/web.php
Route::get('/videos', [VideosController::class, 'index'])->name('videos.index');

Route::get('/pdfs', [PDFsController::class, 'index'])->name('pdfs.index');
Route::post('/pdfs/import', [PDFsController::class, 'import'])->name('pdfs.import');

Route::get('/ppts', [PPTsController::class, 'index'])->name('ppts.index');
Route::post('/ppts/import', [PPTsController::class, 'import'])->name('ppts.import');
