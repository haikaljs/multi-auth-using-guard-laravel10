<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\Admin;
use App\Mail\WebsiteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function login_submit(Request $request){
        // $password = Hash::make($request->password);
        // dd($password);
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            
        ];
        
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin-dashboard');
        }else{
            return redirect()->route('admin-login');
        }
     

    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }

    public function settings(){
        return view('admin.settings');
    }
}
