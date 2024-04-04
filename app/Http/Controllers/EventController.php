<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\Showtime;
use App\Models\Theatre;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $data = Showtime::with('show','theatre')->where('is_disabled', Show::STATUS_ACTIVE)->get();
        return view ('admin.events.index',compact('data'));
    }

    public function create(){
        $shows = Show::orderby('id','DESC')->get();
        $theatres = Theatre::orderby('id','DESC')->get();

        return view('admin.events.create',compact('shows','theatres'));
    
    }

    public function store(Request $request){
        $request->validate([
            'show'=>'required|max:255',
            'theatre'=>'required|max:255'
        ]);

        Showtime::create([
            'show_id' => $request->selectedShowId,
            'theatre_id' =>$request->selectedTheatreId,
            'date' => $request->date,
            'time' => $request->time,
        ]);
        return redirect()->route('admin.events.index')->with('success','ShowTime created successfully.');

    }
    public function edit($showtime){
        $shows = Show::orderby('id','DESC')->get();
        $theatres = Theatre::orderby('id','DESC')->get();
        $showtimes = Showtime::where('id',decrypt($showtime))->first();


        return view('admin.events.edit',compact('shows','theatres','showtimes'));
    }

    public function update(Request $request){

        Showtime::where('id',$request->id)->update([
            'show_id' => $request->selectedShowId,
            'theatre_id' => $request->selectedTheatreId,
            'date' => $request->date,
            'time' => $request->time,
        ]);
        
        return redirect()->route('admin.events.index')->with('success','ShowTime updated successfully.');
    }

    public function destroy($id)
    {
        Showtime::where('id', decrypt($id))
            ->update(['is_disabled' => Showtime::STATUS_INACTIVE]);
        return redirect()->route('admin.events.index')->with('error','event deleted successfully.');   
    }

}
