<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //This method will be show the Login Form for Admin.
    public function showAdminLoginForm(){
        return view('admin.login');
    }

    //This method will be show the Dashboard Login Authentication for Admin.
    public function adminLogin(Request $request){
        $validate = Validator::make($request->all(),[
            'email' =>'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validate->passes()){
           if (Auth::guard('admin')->attempt(['email' =>$request->email, 'password' =>$request->password])){
            if (Auth::guard('admin')->user()->role != 'admin'){
                Auth::guard('admin')->logout();
                return redirect()
                ->route('admin.login')
                ->with('error','Eighter email address and password is incorrect.');
            }
            return redirect()->route('dashboard');

           }else{
            return redirect()
                ->route('admin.login')
                ->with('error','Eighter email address and password is incorrect.');
           }
        }else{
            return redirect()->route('admin.login')->withInput()->withErrors($validate);
        }
    }

    // This method will show the Admin Logout.
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
