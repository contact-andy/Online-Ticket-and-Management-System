<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $fillable =['theatre_id','show_id','date','time'];

    const STATUS_INACTIVE = 1;
    const STATUS_ACTIVE = 0;
    
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
    public function theatre(){
        return $this->belongsTo(Theatre::class);
    }
    public function show(){
        return $this->belongsTo(Show::class);
    }
}
