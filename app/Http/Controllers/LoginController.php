<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function postlogin(Request $request){
        // dd($request->all());

        if(Auth::guard('user')->attempt(['email'=>$request->email,'password' => $request->password])){
            return redirect('/beranda')->with('success', 'Anda Berhasil Login');
        }else{
            return redirect('/login')->with('warning','email atau password salah');
        }


    }




    public function logout(){
       ;
       if(Auth::guard('user')->check()){

        Auth::guard('user')->logout();
       }
       elseif(Auth::guard('admin')->check()){

        Auth::guard('admin')->logout();
       }




        return redirect('/login');
    }
}
