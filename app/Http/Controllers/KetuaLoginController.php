<?php

namespace App\Http\Controllers;

use App\Ketua;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class KetuaLoginController extends Controller
{
    //
    use AuthenticatesUsers;

    protected $guard = 'ketua';

    protected $redirectTo = '/ketua';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function guard()
    {
        return auth()->guard('ketua');
    }

    public function showRegisterPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:199',
            'email' => 'required|string|email|max:255|unique:ketuas',
            'password' => 'required|string|min:6|confirmed'
        ]);
        Ketua::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('ketua-login')->with('success','Registration Success');
    }

    public function login(Request $request)
    {
        if (auth()->guard('ketua')->attempt([
            'email' => $request->email, 
            'password' => $request->password ])) 
            {
            return redirect()->route('ketuapage');
        }


        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
}
