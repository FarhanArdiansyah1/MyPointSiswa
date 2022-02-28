<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'pelanggaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nama_pelanggaran', 'poin'
    ];

    public function getrecord(){
        return $this->hasMany(Record::class);
    }
}
