<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    //This method will be show the Register Form for customer / user.
    public function showRegisterForm(){
        return view('register');
    }

    // This method will show the process registertion for customers or User.
    public function register(Request $request){
        $validate = Validator::make($request->all(),[
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validate->passes()){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->save();

            return redirect()->route('login')->with('success', 'Registration Successful');

        }else{
            return redirect()->route('register')->withInput()->withErrors($validate);
        }

    }

    //This method will be show the Login Form for customer / user.
    public function showLoginForm(){
        return view('login');
    }


    //This method will be show the Login Authentication for customer / user.
    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'email' =>'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validate->passes()){
           if (Auth::attempt(['email' =>$request->email, 'password' =>$request->password])){
            return redirect()->route('home');
           }else{
            return redirect()
                ->route('login')
                ->with('error','Eighter email address and password is incorrect.');
           }
        }else{
            return redirect()->route('login')->withInput()->withErrors($validate);
        }
    }

    // This method will show the logout page for customers or User.
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Successful');
    }
}
