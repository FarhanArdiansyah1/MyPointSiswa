<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordPenghargaanController extends Controller
{
    public function index(){
        return view('admin.penghargaan.record');
    }
}
