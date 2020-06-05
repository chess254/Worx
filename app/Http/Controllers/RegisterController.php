<?php

namespace App\Http\Controllers;

use App\User;
use App\SeekerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register (Request $request){
        $request->validate([
            'name'=>['required'],
            'email'=>['required', 'email', 'unique:users'],
            'password'=>['required', 'min:8','confirmed']
        ]);

       $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'user_type_id'=>$request->user_type_id
        ]);
        
        //return newly created user with id included
        $user = $user->fresh();

        if($user->user_type_id == 1){
          $profile =   $user->seekerProfile()->create();
            $profile->fresh();
            $profile->first_name = $user->name;
            $profile->save();
        }

    }
}
