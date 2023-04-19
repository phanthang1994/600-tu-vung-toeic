<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function showProfile(){
//        return 'login ok';
//        if(Auth::check())
//        {
            return view('show_profile');
//        }
//        return redirect()->route('showLogin');
    }
    public function login(Request $request)
    {
//        dd($request->password);
//        $password = bcrypt($request->password);
      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
      {

            return redirect()->route('show_profile');
      }
      return redirect()->route('showLogin')->with('error','email or password is nor exact');
    }
    public function logout()
    {

        Auth::logout();
        return redirect()->route('showLogin');
    }
}
