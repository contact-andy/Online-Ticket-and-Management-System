<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
    public function showtimes(){
        return $this->hasMany(Showtime::class);
    }
//     public function user(){
//         return $this->hasOne(User::class);
//     }
}
