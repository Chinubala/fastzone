<?php

namespace App\Http\Controllers;

use App\Models\User;
use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function loginPost(Request $request){
      

        $validator =  $request->validate([
            'email' => 'required',
            'password' => 'required',
            // '_answer'=>'required|simple_captcha'

        ]);
   
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route("home"))->withSuccess('Signed in');
        }
        $validator['emailPassword'] = 'Email address or password is incorrect.';
        return redirect("login")->withErrors($validator);

    }

    public function register(){
        return view("auth.register");
    } 

    public function registerPost(Request $request){
        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
           $User = new User();
           $User->fullName = $request->fullName;
           $User->email = $request->email;
           $User->password = Hash::make($request->password) ;
           

           if($User->save()){
            return redirect(route("login"))->with("success", "User create successfully");

           }
            return redirect(route("register"))->with("error", " fail to create ");


    }
}
