<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if(Auth::guard('staff')->check()){
            return redirect(RouteServiceProvider::HOMESTAFF);
        }
        if(Auth::guard('web')->check()){
            return redirect(RouteServiceProvider::HOME);
        }
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         $user = Auth::user();
        //         $check = User::IsStaff($user->nim);
        //         if($check){
        //             return redirect(RouteServiceProvider::HOMESTAFF);
        //         }
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        return $next($request);
    }
}
