<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // $check = User::find($request->id);
        // if($check){
        //     return null;
        // }else{
        //     dd($request);
        //     return route('login');
        // }
        return $request->expectsJson() ? null : route('login');
    }
}
