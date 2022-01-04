<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisPelanggaranController extends Controller
{
    public function index(){
        return view('admin.pelanggaran.jenis');
    }
}
