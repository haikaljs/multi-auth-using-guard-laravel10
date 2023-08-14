<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use App\Mail\WebsiteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function index(){
        return view('home');
    }
    public function dashboard(){
        return view('dashboard');
    }

    public function dashboard_user(){
        return view('dashboard_user');
    }
    public function dashboard_admin(){
        return view('dashboard_admin');
    }

    public function settings(){
        return view('settings');
    }

    public function login(){
        return view('login');
    }

    public function login_submit(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'Active'
        ];
        
        if(Auth::attempt($credentials)){

          return redirect()->route('dashboard-user');

        }else{

            return redirect()->route('login');
        };

    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
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
        $message = "Please click on this link "."<a href=$verification_link>Click this link</a>";

        \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        echo 'Email is sent';
    }

    public function register_verify($token, $email){
       $user = User::where('token', $token)->where('email', $email)->first();
       if(!$user){
        return redirect()->route('login');
       }
       $user->status = 'Active';
       $user->token = "";
       $user->update();
       echo 'Registration Verificaton is successfull';
    }

    public function forget_password(){
        return view('forget_password');
    }

    public function forget_password_submit(Request $request){
    
        $token = Hash('sha256', time());

        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect()->route('register');
        }

        $user->token = $token;
        $user->update();

        $reset_link = url('reset-password/'.$token.'/'.$request->email);
        $subject = "Reset Password";
        $message = "Please click the following link"."<br/>"."<a href=$reset_link>Click Here</a>";

        \Mail::to($request->email)->send(new WebsiteMail($subject, $message));
        
        echo 'Check your email';
    }

    public function reset_password($token, $email){
        $user = User::where('token', $token)->where('email', $email)->first();
        if(!$user){
            dd('No user is found');
        }

        return view('reset_password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request){
      
        $user = User::where('token', $request->token)->where('email', $request->email)->first();
        if(!$user){
            return redirect()->route('login');
        }
        $user->token = '';
        $user->password = Hash::make($request->new_password);
        $user->update();

        echo 'Password is reset';
    }
 

}
