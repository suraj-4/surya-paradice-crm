<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class settingsController extends Controller
{
    //This method show the Settings.
    public function showSettings(){ 
        $users = User::get();
        return view('admin.pages.settings',[
            'users' => $users
        ]);
    }

     //This method edit user.
    public function updateUser(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $users->role = $request->user_role;
        $users->update();
        return redirect()->back()->with('Success', 'User Role Change successfully');

    }

    //This method delete user from DB.
    public function destroyUser($id)
    {
        $users = User::findOrFail($id);

        $users-> delete();
        return redirect()->back()->with('Success', 'User deleted successfully');
    }
}
