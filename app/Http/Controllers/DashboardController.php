<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::user()->hasRole('admin')) {
            return view('admin.dashboard');
        }else if (Auth::user()->hasRole('guru')) {
            return view('guru.dashboard');
        } else {
            return view('siswa.dashboard');
        }
    }
}
