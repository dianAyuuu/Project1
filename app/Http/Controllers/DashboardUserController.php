<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        return view('dashboarduser');
    }

    public function tutorialGallery(Request $request)
    {
        // Menerima data file dari halaman kategori
        $videos = json_decode($request->get('videos'));
        $pdfs = json_decode($request->get('pdfs'));
        $ppts = json_decode($request->get('ppts'));

        // Menampilkan galeri tutorial di halaman dashboarduser
        return view('user.tutorial_gallery', compact('videos', 'pdfs', 'ppts'));
    }
}
