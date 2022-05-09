<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        //$data['login'] = DB::table('logins')->get();
       // dd($data['login']);
        return view ('page.login');
        
    }
    public function register(){
        //$data['login'] = DB::table('logins')->get();
       // dd($data['login']);
        return view ('page.register');
        
    }
    
    public function daftar(Request $r){
        $validator = Validator::make($r->all(),[
            'nama' =>'required',
            'username' =>'required',
            'password' =>'required',

        ]);
        if($validator->fails()){
            return back();
        }
        $simpan= DB::table('logins')->insert([
            'nama'=> $r->nama,
            'username'=> $r->username,
            'password'=>Hash::make($r->password),
        ]);
        if($simpan == TRUE){
            return redirect ('login')-> with('success','Data Berhasil Disimpan');
        }else{
            return redirect ('register')-> with('error','Data Gagal Disimpan');

        }
        
  
    }
    public function aksilogin(Request $r){
        $login = $r->validate([
            'username' =>['required'],
            'password' =>['required'],
        ]);
       

        if(Auth::guard('login')->attempt($login))
        {
            $r->session()->regenerate();
            return redirect('home');

        }
            return back();

    }
    
    public function logout(Request $r)
    {
        Auth::guard('login')->logout();
        $r->session()->regenerateToken();
        return redirect('/');
    }
}
