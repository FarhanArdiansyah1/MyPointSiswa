<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordPelanggaranController extends Controller
{
    public function index(){
        return view('admin.pelanggaran.record');
    }
}
