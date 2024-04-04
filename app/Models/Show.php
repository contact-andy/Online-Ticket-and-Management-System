<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','description','genre','production_year','show_image'];
    public function showtimes(){
        return $this->hasMany(Showtime::class);
    }

    const STATUS_INACTIVE = 1;
    const STATUS_ACTIVE = 0;

//     public function user(){
//         return $this->hasOne(User::class);
//     }
}
