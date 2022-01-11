<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordPenghargaan extends Model
{
    use HasFactory;
    protected $table = 'record_data';
    protected $primarykey = 'id';
    protected $fillable = [
        'id', 'nis', 'penghargaan', 'poin_penghargaan', 'keterangan'
    ];
    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }
}
