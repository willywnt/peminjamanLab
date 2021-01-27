<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function postlogin(Request $request){
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/');
        }
        return redirect('/login');
    }
    public function postloginAdmin(Request $request){
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/dashboard');
        }
        return redirect('/admin');
    }

    public function logout(Request $request){
        
        Auth::logout();
        return redirect('/login');
        
    }

    public function logoutAdmin(Request $request){
        
        Auth::logout();
        return redirect('/admin');
    }
}
