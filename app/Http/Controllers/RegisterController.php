<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function index(){
        return view('/Sessions/register');
    }

    function create(Request $request){
        session()->flash('name', $request->name);
        session()->flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,merchant,customer'
        ],[
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Silahkan Masukan email yang valid',
            'email.unique' => 'Email Sudah di gunakan',
            'Passsword.required' => 'Password Wajib Diisi',
            'Passsword.min' => 'Password minimal 6 karakter',

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ];
        User::create($data);

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
}
