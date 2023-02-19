<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        if (Auth::attempt($request->only(['username', 'password']))) {

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
        return redirect('/login');
    }
}
