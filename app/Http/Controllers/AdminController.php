<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function auth(Request $request){
        // var_dump($request->post());
        $email = $request->post('email');
        $password = $request->post('password');
        $result = Admin::Where(['email'=>$email,'password'=>$password])->first();
        // print_r($result);
        if($result){
            echo "success login";
            Session::put('admin_id', $result->id);
            Session::put('admin_email', $result->email);
            echo $admin_id = session('admin_id');
            echo $admin_email = session('admin_email');

        }else{
            $request->session()->flash('error','Please enter valid username and password');
            return view('admin/login');
        }
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
