<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kelas'
    ];
    // public function read(){
    //     DB::raw("SELECT kelas.`id`, kelas.`kelas`, SUM(data_penghargaan.`poin`) FROM kelas, data_penghargaan, siswa WHERE kelas.`id` = siswa.`id_kelas` AND siswa.`nis` = data_penghargaan.`nis` GROUP BY kelas");
    // }
}
