<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 
class Book extends Model
{
    protected $fillable = [
        'id', 'title', 'author'
    ];
}
// {
//     use HasFactory;
//     // protected $fillable = [
//     //     'id',
//     //     'kelas'
//     // ];
//     public function read(){
//         DB::raw("SELECT * FROM books");
//     }
// }