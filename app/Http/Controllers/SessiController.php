<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessiController extends Controller
{
    function index(){
        return view('/Sessions/login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajid diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)) {
           if(Auth::user()->role == 'merchant'){
            return redirect('/admin/merchant');
           }elseif (Auth::user()->role == 'customer'){
            return redirect('/admin/customer');
           }elseif(Auth::user()->role == 'admin'){
            return redirect('/admin');
           }
        } else {
            return redirect('')->withErrors('Username dan Password yang di masukkan tidak sesuai')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
