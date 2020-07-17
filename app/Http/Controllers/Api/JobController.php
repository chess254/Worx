<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Job;
use App\User;
Use App\County;
use App\BusinessStream;
use App\SeekerProfile;
use App\Application;
use App\JobFunction;
use Illuminate\Http\Request;
use App\Jobs\SendEmailQueue;
use Auth;

class JobController extends Controller
{

    public $paginate_value = 5;
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum')->only(['favouriteJobs']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalJobs = Job::all()->count();
        $jobList = Job::with('location','company','company.media','county','businessStream','type','jobFunction')->orderBy('created_at', 'desc')->paginate($this->paginate_value);
        // return $jobList;
    
        //  dd($jobList->links());
        return response()->json($jobList, 200, ['testheader'=>'testheader']);
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
        // return response()->json($request);
        //get user
        $user =  Auth::user();
        //company
        $company = \App\Company::find($request->company['id']);
        //  return response()->json([$company, $user]);
        //get job data
        $Job = [

            'title' => $request->job['title'],
            'email'=> "",
            'town' => $request->job['town'],
            'user_id' => Auth::user()->id,
            'type_id' => intval($request->job['type_id']),
            'county_id'=>intval($request->job['county']),
            'company_id'=>$company->id,
            'company_name_hidden' => 1,
            'no_of_positions' => $request->job['no_of_positions'],
            'job_function_id' => $request->job['job_function_id'],
            'description' => $request->job['description'], 
            'deadline'=>$request->job['deadline'],
            'location_id' => 1,           
            'is_active' => 1,
            'salary_range' => $request->job['salary_range'],
            'responsibilities' => $request->job['responsibilities'],
            'requirements' =>$request->job['requirements'],             
            'education' => $request->job['certificate'],
            'business_stream_id'=>$request->job['biz_stream'],
            'applicationMethod'=>$request->job['applicationMethod'],
            // 'applicationMethod'=>2, //this sets application for every job to worx, to be sorted
            'applicationEmail'=>$request->job['applicationEmail'],
            'applicationWebsite'=>$request->job['applicationWebsite'],
            'applicationWorx'=>$request->job['applicationMethod'] == 3 ? 'true' : null,
            'applicationInstructions'=>$request->job['applicationInstructions'],
        ];


        //create job with current user as user_id
        $job = auth()->user()->job()->create($Job); //create job with current user as user_id
        //associate job with company
        $job->company()->associate($company);   
        return response()->json($job);

        //save job
        $job->save();
        return response($job->id, 200);
        //return job data
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($job)
    {
        $Job = Job::where('id', $job)
        ->with(['location', 'company', 'type','businessStream','jobFunction','county'])->first()
        ;
        $Job->increment('views');
        // dd($Job);
        return $Job;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

    public function apply(Request $request,Job $Job){
        //check authenticated user
        if(!Auth::check()){
            // return redirect('login')->with('message', 'Login to apply');
            return \response()->json(['message'=>'not logged in']);
        }

        if(auth()->user()->user_type_id != 1){
            // return redirect()->back()->with('message', 'login as job seeker to apply for job');
            return response()->json(['message'=> 'login as candidate to apply']);
        }

        //check if user has created profile, if not redirect to create profile page
        if(!SeekerProfile::where('user_id', auth()->user()->id)->first()){
            // return redirect()->route('profile.show',auth()->user()->id)->with('message', 'Create your profile first to apply');
            return response()->json(['message'=> 'create profile to apply']);
        }
        //check if user has already applied for this job
        if(count(Application::where('job_id', $Job->id)->where('applicant_id',auth()->user()->seekerProfile->id)->get())){
            // return redirect()->back()->with('message', 'You had already applied for this job');
            return response()->json(['message'=> 'you have already applied for this job']);
        }
        
        $application = new Application;
        $application->employer_id = $Job->user_id;
        $application->job_id = $Job->id;
        $application->company_id = $Job->company->id;
        $application->applicant_id = auth()->user()->seekerProfile->id;
        $application->user_id = auth()->user()->id;
        $application->save();

        foreach ($request->input('document', []) as $file) {
            //todo: findout how to add media from request(url) instead of path, then save to disk
            $application->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');//link file in storage to application
        }
        //send application sent notice to email queue for user and employer
        SendEmailQueue::dispatch($request->user(),Job::findOrFail($Job->id));

        // return redirect()->back()->with('message', 'Application Submitted');
        return response()->json(['message'=> 'Application Submitted']);
    }
    

    // fetch applications, for both seeker and employer
    public function applications(Request $request){

        if(auth()->user() && auth()->user()->user_type_id == 2){        
        $applications = Application::where('employer_id',auth()->user()->id)->with(['applicant', 'user', 'employer'])->orderBy('created_at', 'desc')->get(); //return applicatioin with the related applicant
        // return view('applications', compact('applications'));
        }

        if(auth()->user() && auth()->user()->user_type_id == 1){        
            $applications = Application::where('user_id',auth()->user()->id)->with(['job', 'user', 'employer', 'company'])->orderBy('created_at', 'desc')->get(); //return applicatioin with the related applicant
            // return view('applications', compact('applications'));
            return response()->json($applications);
            }
    

        return redirect()->route('home');
    }

    public function favouriteJob($job_id)
    {
        $profile = Auth::user()->seekerProfile()->first();
        $profile->favourite_jobs()->toggle($job_id);
        return $profile->fresh()->favourite_jobs;
    }

    public function favouriteJobs(){
        $profile = Auth::user()->seekerProfile()->first();
        $favourites  =  $profile->favourite_jobs()->with(['company', 'county'])->get();
        return  response()->json($favourites);
    }
}

