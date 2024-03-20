<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seatbooking extends Model
{
    use HasFactory;
    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }
    public function seat(){
        return $this->belongsTo(Seat::class);
    }
}
