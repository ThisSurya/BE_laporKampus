<?php

namespace App\Http\Middleware;

use App\Models\Staff;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class StaffMidleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $check = Auth::guard('staff')->user();
        if($check){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
