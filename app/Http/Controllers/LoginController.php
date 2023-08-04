<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function home()
    {
        return view('home');
    }

    public function client()
    {
        return view('client');
    }


    public function auth(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if(Auth::attempt($credentials) && Auth::user()->role == 'admin'){
            $req->session()->put('name');
            $req->session()->has('name', 'Admin');
            return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
            return back()->withErrors([
                'email' => 'Email atau password anda salah',
            ])->onlyInput('email', 'password');
        
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->forget('name');
        return redirect()->route('login')->with('success','Anda berhasil logout');
    }

}
