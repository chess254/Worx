<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login (Request $request){
        $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required']
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return response()->json(Auth::user()->seekerProfile()->with('educationDetails','experienceDetails','favourite_jobs')->first(), 200);
        }

        throw ValidationException::withMessages([
            'password' => ['Invalid Credentials...']
        ]);
    }

    public function logout(){
        Auth::logout();
    }
}
