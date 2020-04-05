<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SeekerProfile;

class ProfileController extends Controller
{
    public function index(){

        $profiles = SeekerProfile::all();

        dd($profiles);
        return view('profile.index', ['profiles']);
    }

    public function show($user_id){

        // $id = auth()->
        $profile = SeekerProfile::where('user_id', $user_id)->first();

        // dd($profile->experienceDetails);

        return view('profile.show', compact('profile'));
    }
}
