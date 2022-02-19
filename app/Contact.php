<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'keresmian_id', 'email'
    ];
    public function keresmian(){
        return $this->belongsTo(Keresmian::class, 'keresmian_id', 'id');
    }
}
