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
        $profile = SeekerProfile::where('user_id', $user_id)->first();
        return view('profile.show', compact('profile'));
    }

    public function update(Request $request, $user_id){
        $profile = SeekerProfile::where('user_id', $user_id)->first();

        if($request->edit_bio){
            $profile->bio = $request->edit_bio;
        }
        $profile->save();

        if($request->educationDetails_id){
            if(auth()->user()->id == $profile->user_id){
                $educationDetails = $profile->educationDetails->find($request->educationDetails_id);
                $educationDetails->institute = $request->edit_institute;
                $educationDetails->course = $request->edit_course;
                $educationDetails->certificate = $request->edit_certificate;
                $educationDetails->starting_date = $request->edit_from_date;
                $educationDetails->completion_date = $request->edit_to_date;
                $educationDetails->save();
            }
        }
        return redirect()->back();    
    }
}
