<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\SeekerProfile;
use App\EducationDetails;
use App\ExperienceDetails;
use Illuminate\Support\Arr;
class ProfileController extends Controller
{

    //something was wrong with csrf, find out what happened here
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum')->only(['update']);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(Auth::guest()){
        //     return redirect('register');
        // }

        // $user = auth()->user();
        // if(auth()->user()->seekerProfile){
        //     return redirect('/profile/'.$user->id);
        // }

        // $education = New EducationDetails($request->educ[1]);
        // $experience = New \App\ExperienceDetails($request->exp[1]);

        // uncomment later, for validation
        // $data = request()->validate([
        //     'name' => 'required | max:20',
        //     'middle_name' => 'required',
        //     'second_name'=>'required',
        //     'city' => 'required',
        //     'county' => 'required',
        //     'country' => 'required',
        //     'phone' => 'required',
            
        //     // 'website' => 'url',
        //     'date_of_birth' => 'date | before:18 years ago',
        //     'gender'=>'required',
        //     'marital_status'=>'required',
        //     'city'=>'required',
        //     'title'=>'required',
            
        // ]);

            $profile = SeekerProfile::where('user_id', auth()->user()->id)->first();
            

            if($request->has('bio') || $request->has('title')){
                $profile->title = $request['title'] ? $request['title'] : $profile->title;
                $profile->bio = $request['bio'] ? $request['bio'] : $profile->bio;   
                $profile->save() ;             
            }

            if ($request->has('education')){

                // $data = request()->validate([
                //     'add_institute' => 'required',
                //     'add_course' => 'required',
                //     'add_certificate' => 'required',
                //     'add_from_date' => 'required',
                //     'add_to_date' => 'required'
                // ]);
                $newEduc = new \App\EducationDetails();

                $newEduc->institute = $request->education['institute'];
                $newEduc->course = $request->education['course'];
                $newEduc->certificate = $request->education['certificate'];
                $newEduc->starting_date = $request->education['starting_date'];
                $newEduc->completion_date = $request->education['completion_date'];
                $newEduc->grade = $request->education['grade'];
                $newEduc->description = $request->education['description'];

                $newEducEntry = $profile->educationDetails()->save($newEduc);
                
                return response()->json($profile->educationDetails);
            }

            if ($request->experience){

                $newExperience = New ExperienceDetails();
                $newExperience->company_name = $request->experience['company_name'];
                $newExperience->job_title = $request->experience['job_title'];
                $newExperience->website = $request->experience['website'];
                $newExperience->start_date = $request->experience['start_date'];
                $newExperience->end_date = $request->experience['end_date'];
                $newExperience->description  = $request->experience['description'];
                $newExperience->job_location_city = $request->experience['job_location_city'];
                $newExperience->job_location_county = $request->experience['job_location_county'];
                $newExperience->job_location_country = $request->experience['job_location_country'];
                $newExperience->is_current_job = $request->experience['is_current_job'];

                $newExperienceEntry = $profile->experienceDetails()->save($newExperience);
                return response()->json($profile->experienceDetails);
            }

            if($request->has('user_details')){       
                $user = auth()->user();

                $user->name =  $request->name ? $request->name : $user->name ;
                $user->middle_name = $request->middle_name ? $request->middle_name : $user->middle_name;
                $user->second_name = $request->surname ? $request->surname : $user->second_name;
                $user->city = $request->city ? $request->city : $user->city;
                $user->county_id = $request->county_id ? $request->county_id : $user->county_id;
                $user->country = $request->country ? $request->country : $user->country;
                $profile->marital_status = $request->marital_status ? $request->marital_status : $profile->marital_status;    
                $user->date_of_birth = $request->date_of_birth ? $request->date_of_birth : $user->date_of_birth;
                $user->gender = $request->gender ? $request->gender : $user->gender;
                $user->phone = $request->phone ? $request->phone : $user->phone;
                $user->website = $request->website ? $request->website : $user->website;
                $user->address = $request->address ? $request->address : $user->address;

                $profile->save();
                $user->save();
            }

            if($request->has('skills')){
                // $user = auth()->user();
                // $profile = SeekerProfile::where('user_id', $user->id);
                $skills = explode(",",$request->skills); 
                $profile->skills = $skills;
                $profile->save();
                // return response()->json($request);

            }

            if($request->hasFile('avatar') && $request->file('avatar')->isValid()){

                $profile->addMedia($request->file('avatar'))->toMediaCollection('profilepics');
                $profile->fresh();
                $profile->image = $profile->getProfilePic();
                $profile->save();
                // $profile->fresh();
                // return response()->json($profile, 200);
                
            }

            return response()->json(User::where('id',auth()->user()->id)->with('seekerProfile')->first());
    }

    public function storeExperience(Request $request){
        if($request->experience){
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return response()->json(SeekerProfile::where('user_id', $id)->with('user','educationDetails','experienceDetails')->first());
        $profile = SeekerProfile::where('user_id', $id)->with('user','educationDetails','experienceDetails','favourite_jobs')->first();
        $profile->image = $profile->getProfilePic();
        return response()->json($profile);

    }

    public function profile(Request $request){
        // $profile = SeekerProfile::where('user_id', auth()->user()->id)->get();
        $profile = SeekerProfile::where('user_id', auth()->user()->id)->with('educationDetails','experienceDetails','favourite_jobs')->first();
        $userRole = $profile->user->user_type_id;
        $userRole = $userRole == 1 ? 'candidate' : $userRole == 2 ? 'employer' : 'guest';
        $profile->userRole = $userRole;
        return response()->json($profile); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function avatar(Request $request)
    {
        $profile = SeekerProfile::where('user_id', $request->id)->with('user','educationDetails','experienceDetails','favourite_jobs')->first();
        // $profile = SeekerProfile::where('user_id', $id)->with('user','educationDetails','experienceDetails')->first();
        // $profile->image = $profile->getProfilePic();
        
        if($request->hasFile('image')){
            // return response()->json([$request->hasFile('image'), $request->image->getClientOriginalName(), $request->id ]);
            $profile->addMedia($request->file('image'))->toMediaCollection('profilepics');
            $profile->fresh();
            $profile->image = $profile->getProfilePic();
            $profile->save();
            $profile->fresh();
            return response()->json($profile, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
