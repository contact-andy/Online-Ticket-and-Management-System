<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Theatre;
use Illuminate\Http\Request;

use function Psy\sh;

class TheatreController extends Controller
{
    public function index(){
        $data =Theatre::orderby('id','DESC')->get();
        return view('admin.theatre.index',compact('data'));
    }

    public function create(){
        return view('admin.theatre.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'location'=>'required|max:255',
        ]);

        $ncolumns = $request->columns;
        $totalSeats = $request->seats;
        $vipSeats = $request->vseats;
        $requiredRows = ceil($totalSeats/$ncolumns);
        $vipSeatsFirstRow = min($vipSeats, $ncolumns);
        $remainingVIPSeats = $vipSeats - $vipSeatsFirstRow;

        $theatre = Theatre::create([
            'name'=> $request->name,
            'location'=> $request->location,
            'number_of_columns'=> $request->columns,
            'number_of_rows'=> $requiredRows,
        ]);
        $theatreId = $theatre->id;

    // Assign VIP seats in the first row
    for ($column = 1; $column <= $vipSeatsFirstRow; $column++) {
        $seatName = "R1_S{$column}"; 
        Seat::create([
            'theatre_id' => $theatreId,
            'seat_name' => $seatName,
            'seat_type' => 'VIP',
        ]);
    }

    // Assign VIP seats in subsequent rows
    $currentRow = 2;
    while ($remainingVIPSeats > 0 && $currentRow <= $requiredRows) {
        $seatsInThisRow = min($ncolumns, $remainingVIPSeats);
        for ($column = 1; $column <= $seatsInThisRow; $column++) {
            $seatName = "R{$currentRow}_S{$column}"; 
            Seat::create([
                'theatre_id' => $theatreId,
                'seat_type' => 'VIP',
                'seat_name' => $seatName,
            ]);
        }
        $remainingVIPSeats -= $seatsInThisRow;
        if($seatsInThisRow<$ncolumns){
            for ($row = $currentRow; $row <= $requiredRows; $row++) {
                for ($column = $seatsInThisRow+1; $column <= $ncolumns; $column++) {
                    $seatName = "R{$row}_S{$column}";
                    Seat::create([
                        'theatre_id' => $theatreId,
                        'seat_name' => $seatName,
                        'seat_type' => 'Regular',
                    ]);
                }
                $seatsInThisRow=0;
            }
        
            break;
        }
        else{
        $currentRow++;
        for ($row = $currentRow; $row <= $requiredRows; $row++) {
            for ($column = 1; $column <= $ncolumns; $column++) {
                $seatName = "R{$row}_S{$column}";
                Seat::create([
                    'theatre_id' => $theatreId,
                    'seat_name' => $seatName,
                    'seat_type' => 'Regular',
                ]);
            }
        }
        }

    }

    return redirect()->route('admin.theatre.index')->with('success','Theatre craeted successfully');
    }

    public function edit($theatre)
    {
        $data = Theatre::where('id',decrypt($theatre))->first();
        $seat = Seat::where('theatre_id',decrypt($theatre))->first();
        $vseat = $seat->where('seat_type', 'VIP')->count();

        return view('admin.theatre.edit',compact('data','vseat'));
    }

    public function update(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'location'=>'required|max:255',
        ]);

        $ncolumns = $request->columns;
        $totalSeats = $request->seats;
        $vipSeats = $request->vseats;
        $requiredRows = ceil($totalSeats/$ncolumns);
        $vipSeatsFirstRow = min($vipSeats, $ncolumns);
        $remainingVIPSeats = $vipSeats - $vipSeatsFirstRow;

        Theatre::where('id',$request->id)->update([
            'name'=> $request->name,
            'location'=> $request->location,
            'number_of_columns'=> $request->columns,
            'number_of_rows'=> $requiredRows,
        ]); 
        Seat::where('theatre_id',$request->id)->delete();
        // Assign VIP seats in the first row
        for ($column = 1; $column <= $vipSeatsFirstRow; $column++) {
            $seatName = "R1_S{$column}"; 
            Seat::create([
                'theatre_id' => $request->id,
                'seat_name' => $seatName,
                'seat_type' => 'VIP',
            ]);
        }
    
        // Assign VIP seats in subsequent rows
        $currentRow = 2;
        while ($remainingVIPSeats > 0 && $currentRow <= $requiredRows) {
            $seatsInThisRow = min($ncolumns, $remainingVIPSeats);
            for ($column = 1; $column <= $seatsInThisRow; $column++) {
                $seatName = "R{$currentRow}_S{$column}"; 
                Seat::create([                    
                    'theatre_id' => $request->id,
                    'seat_type' => 'VIP',
                    'seat_name' => $seatName,
                ]);
            }
            $remainingVIPSeats -= $seatsInThisRow;
            if($seatsInThisRow<$ncolumns){
                for ($row = $currentRow; $row <= $requiredRows; $row++) {
                    for ($column = $seatsInThisRow+1; $column <= $ncolumns; $column++) {
                        $seatName = "R{$row}_S{$column}";
                        Seat::create([                            
                            'theatre_id' => $request->id,
                            'seat_name' => $seatName,
                            'seat_type' => 'Regular',
                        ]);
                    }
                    $seatsInThisRow=0;
                }
            
                break;
            }
            else{
            $currentRow++;
            for ($row = $currentRow; $row <= $requiredRows; $row++) {
                for ($column = 1; $column <= $ncolumns; $column++) {
                    $seatName = "R{$row}_S{$column}";
                    Seat::create([
                        'theatre_id' => $request->id,
                        'seat_name' => $seatName,
                        'seat_type' => 'Regular',
                    ]);
                }
            }
            }
        }
    return redirect()->route('admin.theatre.index')->with('info','Theatre updated successfully.');
    
    }

}
