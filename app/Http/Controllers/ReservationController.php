<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Seat;
use App\Models\Show;
use App\Models\Theatre;
use App\Models\Showtime;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        $data = Showtime::with('show','theatre')->where('is_disabled', Show::STATUS_ACTIVE)->get();
        return view('admin.reservation.index',compact('data'));
    }

    public function show($showtime){

        $showtime = Showtime::with('show','theatre')->where('id', decrypt($showtime))->get();
        $totalseat = Seat::count();
        $totalreserved = Seat::where('is_available',0)->count();
        $vipreserved = Seat::where('is_available',0)->where('seat_type','VIP')->count();
        $regularReserved = $totalreserved-$vipreserved;
        return view('admin.reservation.show',compact('showtime','totalseat','totalreserved','vipreserved','regularReserved'));

    }
}
