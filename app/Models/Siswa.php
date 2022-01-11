<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primarykey = 'nis';
    protected $fillable = [
        'nis', 'nama'
    ];
    public function recordpenghargaan() {
        return $this->hasMany(RecordPenghargaan::class);
    }
}
