<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class colorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Color::all();
        return view('admin.color', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addcolorPage()
    {
        //
        return view('admin.add_color');
    }


    public function store(Request $request)
    {
        if ($request->has('id') && !empty($request->id)) {
            $color = Color::find($request->id);
            if (!$color) {
                return redirect()->back()->with('message', 'color not found.');
            }
            $msg = "color updated successfully.";
        } else {
            $request->validate([
                'color' => 'required|string|unique:colors,color,' . $request->id,
            ]);
            $color = new color();
            $msg = "color added successfully.";
        }

        $color->color = $request->post('color');
        $color->status = 1;

        $color->save();

        return redirect()->route('admin.color')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $results = Color::where('id', $id)->first();
        // print_r($results); die();
        return view('admin.add_color', compact('results'));
    }


    public function delete(Request $request,$id)
    {
        $color = Color::find($id);
        if($color){
            $color->delete();
            return redirect()->route('admin.color')->with('message','Coupen deleted successfully');
        }else{
            return back()->with('message', 'Category not found.');
        }
    }
    public function update_status($id, $status){
        $color = Color::find($id);
        if($status==1){
            $msg = "activated";
        }else{
            $msg = "deactivated";

        }
        if($color){
            $color->status = $status;
            $color->save();
            return redirect()->route('admin.color')->with('message', 'Color '.$msg.' successfully.');
        }else{
            return redirect()->back('admin.color')->with('message', 'Color not found.');
        }
    }
}
