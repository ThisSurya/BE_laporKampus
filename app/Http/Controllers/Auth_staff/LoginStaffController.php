<?php

namespace App\Http\Controllers\Auth_staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class LoginStaffController extends Controller
{
    public function create() : View
    {
        return View('authStaff/loginstaff');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate_staff();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOMESTAFF);
    }

    public function test(){
        echo "asdfasfsada";
    }

    public function staffOut(Request $request) : RedirectResponse
    {
        dd($request);
        Auth::guard('staff')->logout();
        return Redirect('/');
    }
}
