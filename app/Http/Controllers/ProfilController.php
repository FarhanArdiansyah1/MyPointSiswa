<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Foundation\helpers;

class ProfilController extends Controller
{
    public function index(){
        $data = Kelas::get();
        // return response()->json($data);
        if (request()->ajax()) {
            return datatables()->of($data)
            ->addColumn('aksi', function($data){
                $button = '<button class="edit btn btn-warning" id="'.$data->id.'" name="edit">Edit</button>';
                $button .= '<button class="hapus btn btn-danger" id="'.$data->id.'" name="hapus">Hapus</button>';
                return $button;
            })
            ->rawColumn(['aksi'])
            ->make(true);
        }
        return view('admin.kelashome');
    }
    // public function readKelas2(){
    //     $Kelas = new Kelas();
    //     $data = $Kelas->read();
    //     return response()->json($data);
    // }
}
