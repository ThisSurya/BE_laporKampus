<?php

namespace App\Http\Controllers\Auth_staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Staff;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;

class RegisterStaffController extends Controller
{
    public function create() : View
    {
        return View('authStaff/registerstaff');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Staff::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Staff::create([
            'nama' => $request->nama,
            'kode' => strtoupper($request->kode),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOMESTAFF);
    }
}
