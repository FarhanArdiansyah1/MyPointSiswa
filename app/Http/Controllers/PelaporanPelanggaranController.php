<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelaporanPelanggaranController extends Controller
{
    public function index(){
        return view('admin.pelanggaran.pelaporan');
    }
}
