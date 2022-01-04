<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaliMuridController extends Controller
{
    public function index(){
        return view('admin.walimurid');
    }
}
