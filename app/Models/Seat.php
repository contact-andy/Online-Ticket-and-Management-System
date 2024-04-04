<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected  $fillable = [
       'theatre_id','seat_type','seat_name','is_available'
    ];
<<<<<<< HEAD
=======
    
>>>>>>> 5c1d2e6931c509da8bdea2fc08c2b11759d8722c
    public function seatbookings(){
        return $this->hasMany(Seatbooking::class);
    }
    public function theatre(){
        return $this->belongsTo(Theatre::class);
    }
}
