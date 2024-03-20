<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    public function seatbookings(){
        return $this->hasMany(Seatbooking::class);
    }
    public function theatre(){
        return $this->belongsTo(Theatre::class);
    }
}
