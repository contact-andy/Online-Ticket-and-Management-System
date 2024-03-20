<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public function seatbooking(){
        return $this->hasMany(Seatbooking::class);
    }
    public function showtime(){
        return $this->hasOne(Showtime::class);
    }
}
