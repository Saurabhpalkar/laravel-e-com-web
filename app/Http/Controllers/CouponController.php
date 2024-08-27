<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Coupon::all();
        return view('admin.coupon', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addCouponForm()
    {
        //
        return view('admin.add_coupon');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        if ($request->has('id') && !empty($request->id)) {
            $coupon = Coupon::find($request->id);
            if (!$coupon) {
                return redirect()->back()->with('error', 'Coupon not found.');
            }

            $msg = "Coupon updated successfully.";
        } else {
            $request->validate([
                'title' => 'required|string|max:255',
                'code' => 'required|string|max:50|unique:coupons,code,' . $request->id,
                'value' => 'required|numeric|min:1',
            ]);
            $coupon = new Coupon();
            $msg = "Coupon added successfully.";
        }

        $coupon->title = $request->post('title');
        $coupon->code = $request->post('code');
        $coupon->value = $request->post('value');
        $coupon->status = 1;

        $coupon->save();

        return redirect()->route('admin.coupon')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $results = Coupon::where('id', $id)->first();
        // print_r($results); die();
        return view('admin.add_coupon', compact('results'));
    }


    public function delete(Request $request,$id)
    {
        $coupon = Coupon::find($id);
        if($coupon){
            $coupon->delete();
            return redirect()->route('admin.coupon')->with('message','Coupen deleted successfully');
        }else{
            return back()->with('message', 'Category not found.');
        }
    }
    public function update_status($id, $status){
        $category = Coupon::find($id);
        if($status==1){
            $msg = "activated";
        }else{
            $msg = "deactivated";

        }
        if($category){
            $category->status = $status;
            $category->save();
            return redirect()->route('admin.coupon')->with('message', 'Coupon '.$msg.' successfully.');
        }else{
            return redirect()->back('admin.coupon')->with('message', 'Coupon not found.');
        }
    }
}
