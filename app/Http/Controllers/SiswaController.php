<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        return view('admin.siswa');
    }
}
