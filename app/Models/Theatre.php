<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','location','number_of_columns','number_of_rows'
    ];
    public function seats(){
        return $this->hasMany(Seat::class);
    }
    public function showtimes(){
        return $this->hasMany(Showtime::class);
    }
}
