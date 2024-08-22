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
        if (Session::has('admin_id')) {
            
            return redirect('admin.dashboard');
            // return redirect()->route('admin')->withErrors(['message' => 'Please log in first.']);
        }
        return view('admin/login');
    }

   
    public function auth(Request $request){
        $email = $request->post('email');
        $check_email = Admin::where(['email'=>$email])->first();
        $password = $request->post('password');
        // $result = Admin::Where(['email'=>$email,'password'=>$password])->first();
        if($check_email){
            if(Hash::check($password,$check_email->password)){
                Session::put('admin_id', $check_email->id);
                Session::put('admin_email', $check_email->email);
                $admin_id = session('admin_id');
                 $admin_email = session('admin_email');
                return redirect('admin.dashboard');
            }else{
                $request->session()->flash('error','Please enter valid password');
                return view('admin/login');
            }
            
        }else{
            $request->session()->flash('error','Please enter valid username');
            return view('admin/login');
        }
    
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function updatePassword(Request $request)
    // {
    //     $pass_upd = Admin::find(1);
    //     $pass_upd->password = Hash::make('123');
    //     $pass_upd->save();
    // }

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
