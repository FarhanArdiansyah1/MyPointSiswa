<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'record_data';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'id_siswa', 'id_pelanggaran', 'poin', 'id_pelapor', 'keterangan', 'prestasi'
    ];
    public function getsiswa(){
        return $this->belongsTo(User::class, 'id_siswa', 'id');
    }
    public function getpelapor(){
        return $this->belongsTo(User::class, 'id_pelapor', 'id');
    }
}
