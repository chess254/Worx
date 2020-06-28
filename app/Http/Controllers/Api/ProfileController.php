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
                // $profile = SeekerProfile::where('user_id', auth()->user()->id)->first();
                $newEducEntry = $profile->educationDetails()->save($newEduc);

                    // $newExperienceEntry = $profile->educationDetails()->save($newExperience);
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

                // $profile = SeekerProfile::where('user_id', auth()->user()->id)->first();
                $newExperienceEntry = $profile->experienceDetails()->save($newExperience);
                return response()->json($profile->experienceDetails);
            }


            // $profile->experienceDetails()->create($request->experience);
             if($request->has('user_details')){       
                    $user = auth()->user();
                    // $user =User::where('id',auth()->user()->id);
                    // $profile->marital_status = $request->user_details['marital_status'] ;
                    $user->name =  $request->user_details['name'] ? $request->user_details['name'] : $user->name ;
                    $user->middle_name = $request->user_details['middle_name'] ? $request->user_details['middle_name'] : $user->middle_name;
                    $user->second_name = $request->user_details['surname'] ? $request->user_details['surname'] : $user->second_name;
                    $user->city = $request->user_details['city'] ? $request->user_details['city'] : $user->city;
                    $user->county_id = $request->user_details['county_id'] ? $request->user_details['county_id'] : $user->county_id;
                    $user->country = $request->user_details['country'] ? $request->user_details['country'] : $user->country;
                    $user->date_of_birth = $request->user_details['date_of_birth'] ? $request->user_details['date_of_birth'] : $user->date_of_birth;
                    $user->gender = $request->user_details['gender'] ? $request->user_details['gender'] : $user->gender;
                    $user->phone = $request->user_details['phone'] ? $request->user_details['phone'] : $user->phone;
                    $user->website = $request->user_details['website'] ? $request->user_details['website'] : $user->website;
                    $user->address = $request->user_details['address'] ? $request->user_details['address'] : $user->address;
                    
                    // return "no data";


                $user->save();

                // return response()->json(auth()->user()->with('seekerProfile')->get());
                
                // return \response()->json($user, 200);
                // $profile = auth()->user()->seekerProfile()->create();
                // $skills =explode(',', $request->skills);
                
                // return redirect('/profile/'.$user->id);
            }
            return response()->json(User::where('id',auth()->user()->id)->with('seekerProfile')->first());
            // return $request['bio'];
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
        
        return response()->json(SeekerProfile::where('user_id', auth()->user()->id)->with('educationDetails','experienceDetails','favourite_jobs')->first()); 

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
