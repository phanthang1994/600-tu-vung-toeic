<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
{
    public function __construct()
    {

    }
    public function getRegister(Request $request)
    {
      return view('front_end.loginregistor');
    }
    public function postRegister(Request $request)
    {
//        dd($request->name);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails())
            {
                return redirect()->back()->with('status', 'Email hoặc user name hoặc Password còn thiếu');;
            }

        $user=User::create(
           [
               'name' => $request->name,
               'email' => $request->email,
               'password' => bcrypt($request->password)
           ]
         );
        if($user)
        {
            return redirect()->route('getLogin')->with('status','Đăng ký thành công');
        }
    }
    public function getLogin()
    {
//        if (Auth::check()) {
//            return redirect()->route('home');
//        } else {
            return view('front_end.loginregistor');
//        }
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
            return redirect()->route('home');
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
