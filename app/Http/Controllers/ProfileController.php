<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SeekerProfile;
use App\EducationDetails;
use Auth;

class ProfileController extends Controller
{
    public function index(){
        $profiles = SeekerProfile::all();
        dd($profiles);
        return view('profile.index', ['profiles']);
    }

    public function show($user_id){

        $profile = SeekerProfile::where('user_id', $user_id)->first();
        // dd($profile);
        if($profile)
       {
        return view('profile.show', compact('profile'));
       }else{
           return redirect('/profile')->with('status', 'Create your profile');;
       }
    }

    public function update(Request $request, $user_id){

        // dd($request->all());

        $profile = SeekerProfile::where('user_id', $user_id)->first();

        if($request->edit_bio){
            $profile->bio = $request->edit_bio;
        }
        $profile->save();

        if(($request->add_institute) && (auth()->user()->id == $profile->user_id)){

            $newEduc = new \App\EducationDetails();

            $newEduc->institute = $request->add_institute;
            $newEduc->course = $request->add_course;
            $newEduc->certificate = $request->add_certificate;
            $newEduc->starting_date = $request->add_from_date;
            $newEduc->completion_date = $request->add_to_date;
            $newEducEntry = $profile->educationDetails()->save($newEduc);
            // dd($newEducEntry);
            // Url::route('profile.show').'#rowED';
            return redirect('profile/'.'/#rowED');

        }

        if($request->educationDetails_id){
            if(auth()->user()->id == $profile->user_id){
                $educationDetails = $profile->educationDetails->find($request->educationDetails_id);
                $educationDetails->institute = $request->edit_institute;
                $educationDetails->course = $request->edit_course;
                $educationDetails->certificate = $request->edit_certificate;
                $educationDetails->starting_date = $request->edit_from_date;
                $educationDetails->completion_date = $request->edit_to_date;
                $educationDetails->save();
                return redirect('profile/'.'/#rowED');
            }
        }

        if(($request->add_company_name) && (auth()->user()->id == $profile->user_id)){

            $newExperience = new \App\ExperienceDetails();

            $newExperience->company_name = $request->add_company_name;
            $newExperience->job_title = $request->add_job_title;
            $newExperience->website = $request->add_website;
            $newExperience->start_date = $request->add_start_date;
            $newExperience->end_date = $request->add_end_date;
            $newExperience->job_location_city = $request->add_job_city;
            $newExperience->job_location_county = $request->add_job_county;
            $newExperience->job_location_country = $request->add_job_country;

            $newExperienceEntry = $profile->experienceDetails()->save($newExperience);
            // dd($newEducEntry);
            // Url::route('profile.show').'#rowED';
            return redirect('profile/'.'/#rowEXP');

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

                return redirect('profile/'.'/#rowEXP');
            }
        }

        return redirect()->back();    
    }

  

    public function create(Request $request){
        // $userprofile = $request->session()->get('userprofile');
        if(Auth::guest()){
            return redirect('register');
        }
        if(auth()->user()->seekerProfile){
            return redirect()->route('profile.show', auth()->user()->id);
        }
        return view('profile.create');
    }


    public function store(Request $request){
        // dd($request->all());
        // dd($request->educ[1]);
        
        // if(!auth()){
            if(Auth::guest()){
            return redirect('register');
        }

        $user = auth()->user();
        if(auth()->user()->seekerProfile){
            return redirect('/profile/'.$user->id);
        }

        $education = New EducationDetails($request->educ[1]);
        $experience = New \App\ExperienceDetails($request->exp[1]);
        
       
            // dd($experience , $education);

        // $profile = New SeekerProfile;
        // $profile->title = $request->name;
        
        $user->name = $request->name;
        $user->middle_name = $request->middle_name;
        $user->second_name = $request->second_name;
        $user->city = $request->city;
        $user->county_id = $request->county;
        $user->country = $request->country;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->website = $request->website;
        $user->address = $request->address;
        // dd($user->skills);
        $user->save();

        // dd($user);



        // $job = auth()->user()->job()->create($data); //create job with current user as user_id
        $profile = auth()->user()->seekerProfile()->create();
        // dd($profile->user_id);
// $education->seeker_profile_id = $profile->id;
// $experience->seeker_profile_id = $profile->id; 
// $education->save();
// $experience->save();


        $skills =explode(',', $request->skills);
        
        $profile->educationDetails()->create($education->toArray());
        $profile->experienceDetails()->create($experience->toArray());  
        $profile->skills = $skills;
        // dd($profile);

        // dd($user->seekerProfile->experienceDetails);
        $profile->save();

        return redirect('/profile/'.$user->id);
    }
}
