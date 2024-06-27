<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFsController extends Controller
{
    public function index()
    {
        return view('pdfs');
    }
 // Fungsi untuk menangani impor file PDF dari halaman kategori
    public function import(Request $request)
    {
        // Mendapatkan data file PDF yang dikirimkan
        $files = json_decode($request->input('files'), true);

        // Lakukan tindakan yang sesuai, seperti menyimpan data atau memprosesnya
        
        // Redirect kembali ke halaman kategori atau halaman lain yang diinginkan
    }
}

