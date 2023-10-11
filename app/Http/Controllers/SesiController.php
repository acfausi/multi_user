<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class SesiController extends Controller
{
    //
    public function index(){
        return view('login');
    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=> 'Email wajib diisi',
            'password.required'=> 'Password wajib diisi',

        ]);
        $infologin=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            if (Auth::user()->role == 'operator'){
                return redirect('admin/operator');
            }elseif (Auth::user()->role == 'keuangan'){
                return redirect('admin/keuangan');
            }elseif (Auth::user()->role == 'marketing'){
                return redirect('admin/marketing');
            }

        }else{
            return redirect('')->withErrors('Username dan password salah')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    } 
    
}
