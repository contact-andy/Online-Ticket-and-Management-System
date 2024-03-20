<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
    public function theater(){
        return $this->belongsTo(Theatre::class);
    }
    public function show(){
        return $this->belongsTo(Show::class);
    }
}
