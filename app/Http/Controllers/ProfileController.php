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
        if($profile)
       {
        return view('profile.show', compact('profile'));
       }else{
           return redirect('/profile')->with('status', 'Create your profile');;
       }
    }

    public function update(Request $request, $user_id){

        $profile = SeekerProfile::where('user_id', $user_id)->first();

        if($request->input('document')){

            foreach ($request->input('document', []) as $file) {
                $profile->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('profilepics');
                // $profile->save();
            }

            // dd($profile->getFirstMedia('profilepics')->getPath());
            
            $profile->save();
        }
        //refactor to use $request->has
        if($request->edit_bio){ 
            $profile->bio = $request->edit_bio;
        }
        $profile->save();

        //refactor to use $request->has('add_institute')
        if(($request->add_institute) && (auth()->user()->id == $profile->user_id)){

            $data = request()->validate([
                'add_intitute' => 'required',
                'add_course' => 'required',
                'add_certificate' => 'required',
                'add_from_date' => 'required',
                'add_to_date' => 'required'
            ]);

            $newEduc = new \App\EducationDetails();

            $newEduc->institute = $request->add_institute;
            $newEduc->course = $request->add_course;
            $newEduc->certificate = $request->add_certificate;
            $newEduc->starting_date = $request->add_from_date;
            $newEduc->completion_date = $request->add_to_date;
            $newEducEntry = $profile->educationDetails()->save($newEduc);
        
            return redirect('profile/'.'/#rowED');

        }

        //refactor to use $request->has
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

        //refactor to use $request->has
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

            return redirect('profile/'.'/#rowEXP');

        }

        //refactor to use $request->has
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

                $experienceDetails->save();

                return redirect('profile/'.'/#rowEXP');
            }
        }

        return redirect()->back();    
    }



  

    public function create(Request $request){    
        if(Auth::guest()){
            return redirect('register');
        }
        if(auth()->user()->seekerProfile){
            return redirect()->route('profile.show', auth()->user()->id);
        }
        return view('profile.create');
    }


    public function store(Request $request){
       
        if(Auth::guest()){
            return redirect('register');
        }

        $user = auth()->user();
        if(auth()->user()->seekerProfile){
            return redirect('/profile/'.$user->id);
        }

        $education = New EducationDetails($request->educ[1]);
        $experience = New \App\ExperienceDetails($request->exp[1]);
  
        $underAge = date('m-d-Y', strtotime('18 years ago'));
        $data = request()->validate([
            'name' => 'required | max:20',
            'middle_name' => 'required',
            'second_name'=>'required',
            'city' => 'required',
            'county' => 'required',
            'country' => 'required',
            'phone' => 'required',
            // 'website' => 'url',
            'date_of_birth' => 'date | before:18 years ago',
            'gender'=>'required',
            'marital_status'=>'required',
            'city'=>'required',
            'title'=>'required',
            
        ]);
        
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
        
        $user->save();
        $profile = auth()->user()->seekerProfile()->create();
        $skills =explode(',', $request->skills);
        
        if($request->educ[1]["institute"] != null){ 
        //refactor to use $request->has('educ')
        $profile->educationDetails()->create($education->toArray());
        }

        if($request->exp[1]["company_name"]!= null){
            $profile->experienceDetails()->create($experience->toArray());
            }
          
        $profile->skills = $skills;
        $profile->title = $request->title;
        $profile->save();

        return redirect('/profile/'.$user->id);
    }
    
    public function deleteExperience($expId){

    }
}


