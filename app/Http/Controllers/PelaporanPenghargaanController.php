<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelaporanPenghargaanController extends Controller
{
    public function index(){
        return view('admin.penghargaan.pelaporan');
    }
}
