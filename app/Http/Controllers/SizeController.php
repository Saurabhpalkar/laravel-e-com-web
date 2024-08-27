<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Size::all();
        return view('admin.size', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addSizePage()
    {
        //
        return view('admin.add_size');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        if ($request->has('id') && !empty($request->id)) {
            $size = Size::find($request->id);
            if (!$size) {
                return redirect()->back()->with('error', 'Size not found.');
            }

            $msg = "Size updated successfully.";
        } else {
            $request->validate([
                'size' => 'required|string|max:255',
            ]);
            $size = new size();
            $msg = "Size added successfully.";
        }

        $size->size = $request->post('size');
        $size->status = 1;

        $size->save();

        return redirect()->route('admin.size')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $results = Size::where('id', $id)->first();
        // print_r($results); die();
        return view('admin.add_size', compact('results'));
    }


    public function delete(Request $request,$id)
    {
        $size = Size::find($id);
        if($size){
            $size->delete();
            return redirect()->route('admin.size')->with('message','Coupen deleted successfully');
        }else{
            return back()->with('message', 'Category not found.');
        }
    }
    public function update_status($id, $status){
        $category = Size::find($id);
        if($status==1){
            $msg = "activated";
        }else{
            $msg = "deactivated";

        }
        if($category){
            $category->status = $status;
            $category->save();
            return redirect()->route('admin.size')->with('message', 'size '.$msg.' successfully.');
        }else{
            return redirect()->back('admin.size')->with('message', 'size not found.');
        }
    }
}
