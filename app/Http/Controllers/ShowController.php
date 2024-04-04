<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;



class ShowController extends Controller
{
    public function index()
    {
        $data = Show::where('is_disabled', Show::STATUS_ACTIVE)->get();
        return view('admin.show.index',compact('data'));
    }

    public function create()
    {
        return view('admin.show.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'genre'=>'required|max:255',
            'description'=>'required|max:255',
        ]);
        $filename ="";
        if($request->hasFile('image')){
            $filename = $request->getSchemeAndHttpHost().'/images/'.time().'.'. $request->image->extension();
            $request->image->move(public_path('/images/'),$filename);
        }
            Show::create([
                'name' => $request->name,
                'genre' => $request->genre,
                'description' => $request->description,
                'production_year' => $request->productionyear,
                'show_image' => $filename
            ]);
            return redirect()->route('admin.show.index')->with('success','Show created successfully.');
        // }
        // else{
           // return view('admin.show.create')->with('error','file upload error');
        // }
    
    }
        

    public function edit($show)
    {
        $data = Show::where('id',decrypt($show))->first();
        return view('admin.show.edit',compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'genre'=>'required|max:255',
            'description'=>'required|max:255',
        ]);
            $filename = "";
        if($request->hasFile('image')){
            $filename = $request->getSchemeAndHttpHost().'/images/'.time().'.'. $request->image->extension();
            $request->image->move(public_path('/images/'),$filename);
            Show::where('id', $request->id)->update([
                'name' => $request->name,
                'genre' => $request->genre,
                'description' => $request->description,
                'production_year' => $request->productionyear,
                'show_image' => $filename
    
            ]);
            return redirect()->route('admin.show.index')->with('info','Show updated successfully.');   
        }
     else{
        echo "file upload error";
     }
       
    }

    public function destroy($id)
    {
        Show::where('id', decrypt($id))
            ->update(['is_disabled' => Show::STATUS_INACTIVE]);
        return redirect()->route('admin.show.index')->with('error','Show deleted successfully.');   
    }

}
