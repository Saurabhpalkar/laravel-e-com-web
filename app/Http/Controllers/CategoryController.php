<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $result = [];
        $result['data'] = Category::all();
        

        return view('admin.category',$result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function manage_category($id="")
    {
        if($id){
            $result = Category::where('id',$id)->first();
            return view('admin.manage_category', compact('result'));
        }else{
            return view('admin.manage_category');
        }
    }

    public function add(Request $request)
    {
        if($request->id){
        $category = Category::find($request->post('id'));
        $msg= "Record updated successfully";
    }else{
        $request->validate([
            'category'=> 'required',
            'category_slug'=> 'required'
        ]);
        $category = new Category();
        $msg= "Inserted successfully.....!";
    }
        $category_name = $request->post('category');
        $category_slug = $request->post('category_slug');
        $category->caregory_name = $category_name ;
        $category->caregory_slug = $category_slug ;
        $save_success  = $category->save();
        $request->session()->flash('message', $msg);
        return redirect('admin.category');
        // return redirect()->route('admin.category'); // Assuming 'admin.category' is a named route

    }

    /**
     * Store a newly created resource in storage.
     */
    public function delete($id)
    {
        $category= Category::find($id);
        if($category){
            $category->delete();
            return redirect('admin.category')->with('message','category deleted successfully');
        }
            return redirect()->route('admin.category')->with('message', 'Category not found.');

        // return redirect();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category')->with('error', 'Category not found.');
        }
        // return view('admin.category.edit', compact('category'));


    }   

    
}
