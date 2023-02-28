<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        if (Auth::check()) {
            return Redirect::back();
        }
        return view('login.index');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['username', 'password']))) {
            Auth::logoutOtherDevices(request('password'));
            return redirect('/');
        }
        // $username = $request->user_id;
        // $data = Officer::where('user_id', $username)->first();
        // if ($data == null) {
        //     return redirect('/login');
        // }

        // $password = Hash::check($request->password, $data->password);
        // if ($password) {
        //     return redirect('/')->with('person', $data);
        // }
        return redirect('/login')->with('failed', 'Username atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('/login');
    }

    // public function authenticated(Request $request, $user)
    // {
    //     Auth::logoutOtherDevices(request('password'));
    // }
}
