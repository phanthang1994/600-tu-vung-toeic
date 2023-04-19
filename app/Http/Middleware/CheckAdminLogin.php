<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::viaRemember()) {
//            dd('ok');
            return redirect()->route('category');
        }
        if (Auth::check())
        {
            $user = Auth::user();
            // nếu level =1 (admin), status = 1 (actived) thì cho qua.
            if ($user->status == 1&&$user->level==1)
            {
                return $next($request);
            }
            else
            {
                Auth::logout();
                return redirect()->route('getLogin')->with('status','Chỉ tài khoản admin mới được truy cập vào trang này');
            }
        } else
            return redirect()->route('getLogin')->with('status','Bạn chưa đăng nhập');
    }
}
