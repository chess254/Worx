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

        if($request->experienceDetails_id){


            if(auth()->user()->id == $profile->user_id){
                $experienceDetails = $profile->experienceDetails->find($request->experienceDetails_id);
                $experienceDetails->job_title = $request->edit_job_title;
                $experienceDetails->company_name = $request->edit_company_name;
                $experienceDetails->website = $request->edit_website;
                $experienceDetails->start_date = $request->edit_start_date;
                $experienceDetails->end_date = $request->edit_end_date;
                $experienceDetails->job_location_city = $request->edit_job_city;
                $experienceDetails->job_location_county = $request->edit_job_county;
                $experienceDetails->job_location_country = $request->edit_job_country;
                // dd($experienceDetails);
                $experienceDetails->save();
            }
        }

        return redirect()->back();    
    }
}
