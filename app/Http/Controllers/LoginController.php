<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {

    }
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('category');
        } else {
            return view('admin.loginregistor');
        }
    }
    public function postLogin(request $request)
    {
//        dd($request->all());
        $remember = $request->remember;
        $login = [
            'email' => $request->EMAIL,
            'password' => $request->PASSWORD,
//            'STATUS'    =>1,
        ];
//        dd($login);

        if (Auth::attempt($login,(boolval($remember) ? 'true' : 'false'))) {
            return redirect()->route('category');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
