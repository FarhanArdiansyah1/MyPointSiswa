<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
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

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('poin', 'like', $term)
                ->orWhere('prestasi', 'like', $term)
                ->orWhereHas('getsiswa', function ($query) use ($term) {
                    $query->where('name', 'like', $term);
                })
                ->orWhereHas('getsiswa', function ($query) use ($term) {
                    $query->where('nis_nim_nik', 'like', $term);
                })
                ->orWhereHas('getsiswa', function ($query) use ($term) {
                    $query->where('kelas', 'like', $term);
                })
                ->orWhereHas('getpelapor', function ($query) use ($term) {
                    $query->where('name', 'like', $term);
                });;
        });
    }
}
