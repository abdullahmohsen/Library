<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
            
        ]);
        return redirect( route('allBooks') ); //l7ad m3ml l saf7a l ra2esia
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:6'
        ]);
        
        // $is_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        // dd($is_login);
    
        if ( ! Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            return redirect( route('auth.login') );
        }

        return redirect( route('allBooks') );

    }

    public function logout()
    {
        Auth::logout();
        return redirect( route('auth.login'));
    }
}