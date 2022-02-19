<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keresmian extends Model
{
    protected $table = 'keresmian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'keresmian'
    ];
    public function contact(){
        return $this->hasMany(Contact::class);
    }
}
