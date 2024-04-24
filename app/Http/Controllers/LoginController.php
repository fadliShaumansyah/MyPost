<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('Login.index',[
            'title'=>'Login',
            'active'=>'Login'
        ]);
    }

    public function autenticate(request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
       if(Auth::attempt($credentials)){
        // redirect dulu ke middleware lalu ke dashboard
       $request->session()->regenerate();
      return redirect()->intended('/dashboard');
       }
       return back()->with('loginError','loginfailed!');

    }

    public function Logout(request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/Login');

    }
}
