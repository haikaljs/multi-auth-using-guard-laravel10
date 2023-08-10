<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Mail\WebsiteMail;

class WebsiteController extends Controller
{
    public function index(){
        return view('home');
    }
    public function dashboard(){
        return view('dashboard');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function register_submit(Request $request){

        $token = Hash('sha256', time());
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'Pending';
        $user->token = $token;
        $user->save();

        $verification_link = url('register/verify/'.$token.'/'.$request->email);
        $subject = 'Registration Confirmation';
        $message = 'Please click this link: <br>'.$verification_link;

        \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        echo 'Email is sent';
    }

    public function register_verify(){
        
    }

    public function forget_password(){
        return view('forget_password');
    }

  


}
