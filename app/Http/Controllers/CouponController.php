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
       return view('admin.coupon');
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
        echo "insert";
        return redirect()->route('admin.add_coupon')->with('message', 'Category not found.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
