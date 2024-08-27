<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Product::all();
        return view('admin.product', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addproductPage()
    {
        $categories = Category::select('id', 'caregory_name')
        ->get();
        return view('admin.add_product',compact('categories'));
    }


    public function store(Request $request)
    {
        if ($request->has('id') && !empty($request->id)) {
            $product = Product::find($request->id);
            if (!$product) {
                return redirect()->back()->with('message', 'product not found.');
            }
            $msg = "product updated successfully.";
        } else {
            // $request->validate([
            //     'product' => 'required|string|unique:products,product,' . $request->id,
            // ]);
            $product = new Product();

            $msg = "product added successfully.";

        }
        var_dump($_POST);
        // exit();
        $product->category_id = $request->post('category_id');
        $product->name = $request->post('name');
        $product->slug = $request->post('slug');
        $product->brand = $request->post('brand');
        $product->model = $request->post('model');
        $product->short_desc = $request->post('short_desc');
        $product->desc = $request->post('desc');
        $product->keyword = $request->post('keyword');
        $product->technical_specification = $request->post('technical_specification');
        $product->uses = $request->post('uses');
        $product->warranty = $request->post('warranty');
        $product->img = $request->post('img');
        $product->status = 1;
        $product->save();

        return redirect()->route('admin.product')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $results = Product::where('id', $id)->first();
        // print_r($results); die();
        return view('admin.add_product', compact('results'));
    }


    public function delete(Request $request,$id)
    {
        $product = Product::find($id);
        if($product){
            $product->delete();
            return redirect()->route('admin.product')->with('message','Coupen deleted successfully');
        }else{
            return back()->with('message', 'Category not found.');
        }
    }
    public function update_status($id, $status){
        $product = Product::find($id);
        if($status==1){
            $msg = "activated";
        }else{
            $msg = "deactivated";

        }
        if($product){
            $product->status = $status;
            $product->save();
            return redirect()->route('admin.product')->with('message', 'product '.$msg.' successfully.');
        }else{
            return redirect()->back('admin.product')->with('message', 'product not found.');
        }
    }
}
