<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriPelanggaranController extends Controller
{
    public function index(){
        return view('admin.pelanggaran.kategori');
    }
}
