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

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('nama_pelanggaran', 'like', $term)
                ->orWhere('poin', 'like', $term);
        });
    }
}
