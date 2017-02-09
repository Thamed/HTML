<?php

namespace Gallery\Http\Controllers;
use Illuminate\Http\Request;
use Gallery\Models\User;
use Auth;

class AuthController extends Controller{
    public function getSignup(){
        return view('auth.signup');
    }

    public function postSingup(Request $request){
        $this->validate($request,[
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|min:6',
        ]);

        User::create([
            'email'=>$request->input('email'),
            'username'=>$request->input('username'),
            'password'=>bcrypt($request->input('password')),
        ]);

        return redirect()->route('home')->with('info', 'Your account has been created, feel free to Sign In');
    }
    public function getSignin(){
        return view('auth.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email'=> 'required',
            'password'=> 'required',
            
        ]);

       if(!Auth::attempt($request->only(['email','password']), $request->has('remember')))
       {
           return redirect()->route('home')->with('info', 'Could not sign you in with those details.');
       }

        return redirect()->route('home')->with('info', 'You are signed in.');
    }

    public function getSignout(){
        Auth::logout();

        return redirect()->route('home')->with('info', 'You are signed out.');
    }
}