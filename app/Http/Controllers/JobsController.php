<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SeekerProfile;
use App\Job;
use App\User;
Use App\County;
use App\BusinessStream;
use App\Application;
use App\JobFunction;
use Auth;
use App\Jobs\SendEmailQueue;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $counties = County::all();
        // $categories = JobFunction::all()->toArray();  
        // dd($categories);
        $totalJobs = Job::all()->count();
        $joblist = Job::with('location','company','county','businessStream')->orderBy('created_at', 'desc')->paginate(20);
        return view('search.index', compact(['joblist', 'totalJobs']));
        // return view('search.index');

    }

    public function category(JobFunction $category)
    {
        $categoryName=JobFunction::find($category)->first()->name;
        // dd($category);
        // $counties = County::all();
        // $categories = BusinessStream::all()->toArray();
        $totalJobs = Job::where('job_function_id', $category->id)->with('location','company','county','businessStream')->count();  
        $joblist = Job::where('job_function_id', $category->id)->with('location','company','county','businessStream')->orderBy('created_at', 'desc')->paginate(20);
        // $joblist = JobFunction::find($category)('location','company','county','businessStream')->orderBy('created_at', 'desc')->paginate(20);
        return view('job-category', compact(['joblist', 'totalJobs','categoryName']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = User::where('id', auth()->user()->id)->with('type')->first();
        $job_functions = JobFunction::all();
        if ($user->type['name'] != "Employer"){

            session()->flash('message', 'You must login with an employer account to post a job');
            Auth::logout();
            return redirect('login');   //alternate redirect back with message, so they can logout themeselves instead of login em out automatically
        }
        $user_companies = $user->companies;
        if($user_companies->toArray() == null){
            session()->flash('message', 'Create your company profile to post a job');
            return redirect()->route('company.create');
        }
        return view('post-job',compact('user_companies', 'job_functions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        // dd($request->all());
        $company = \App\Company::firstOrNew([
            'id'=>$request->company_id,
            'name' => $request->company_name,
            'description' => $request->company_description,
            'website' => $request->company_website,
            'business_stream_id'=>$request->company_business_stream_id
        ]);

        // dd($request->all());

        $data = [
            'title' => $request->title,
            'email'=> "",
            'town' => $request->town,
            'user_id' => $user = Auth::user()->id,
            'type_id' => intval($request->type_id),
            'county_id'=>intval($request->county),
            'company_id'=>$request->company_id,
            'company_name_hidden' => 1,
            'no_of_positions' => $request->no_of_positions,
            'job_function_id' => $request->job_function_id,
            'description' => $request->description, 
            'deadline'=>$request->deadline,
            'location_id' => 1,           
            'is_active' => 1,
            'salary_range' => $request->salary_range,
            'responsibilities' => $request->responsibilities,
            'requirements' =>$request->requirements,             
            'education' => $request->education,
            'business_stream_id'=>$request->company_business_stream_id,
            'applicationMethod'=>$request->applicationMethod,
            'applicationEmail'=>$request->applicationEmail,
            'applicationWebsite'=>$request->applicationWebsite,
            'applicationWorx'=>$request->applicationWorx,
            'applicationInstructions'=>$request->applicationInstructions,
        ];
        // dd($data);
        $job = auth()->user()->job()->create($data); //create job with current user as user_id
        $job->company()->associate($company);   
        $job->save();
        return redirect('/job/'.$job->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($job)
    {
        $Job = Job::where('id', $job)
        ->with(['location', 'company', 'type','businessStream','jobFunction'])
        ->first();
        $Job->increment('views');
        return view('job', compact('Job'));
    }

    public function jobsPostedBy(){
        
        if(auth()->user() && auth()->user()->user_type_id == 2){   
            $user_id = auth()->user()->id;
            $JobsPostedByUser = Job::where('user_id', $user_id)->orderBy('created_at', 'desc')->with('applications')->paginate(10);
            return view('myjobs', compact('JobsPostedByUser'));
        }

        return redirect('home')->with('message', 'unauthorized!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        
        if(auth()->user() && auth()->user()->id == $job->user_id){
            
                    $user = User::where('id', auth()->user()->id)->with('type')->first();
                    $job_functions = JobFunction::all();
                    if ($user->type['name'] != "Employer"){
            
                        session()->flash('message', 'You must login with an employer account to post a job');
                        Auth::logout();
                        return redirect('login');   //alternate redirect back with message, so they can logout themeselves instead of login em out automatically
                    }
                    $user_companies = $user->companies;
                    if($user_companies->toArray() == null){
                        session()->flash('message', 'Create your company profile to post a job');
                        return redirect()->route('company.create');
                    }
                    return view('job.edit',compact('user_companies', 'job_functions','job'));

        }else {
            return redirect('home')->with('message', 'you can only edit a job you posted');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        // dd($request->all());
        if(auth()->user() && auth()->user()->id == $job->user_id){
            $job->update($request->all());
            return redirect()->route('job.show',$job->id);
        }else{
            return redirect('home')->with('message', 'you can only update a job you posted');
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

    public function apply(Request $request,Job $Job){
        //check authenticated user
        if(!Auth::check()){
            return redirect('login')->with('message', 'Login to apply');
        }

        if(auth()->user()->user_type_id != 1){
            return redirect()->back()->with('message', 'login as job seeker to apply for job');
        }

        //check if user has created profile, if not redirect to create profile page
        if(!SeekerProfile::where('user_id', auth()->user()->id)->first()){
            return redirect()->route('profile.show',auth()->user()->id)->with('message', 'Create your profile first to apply');
        }
        //check if user has already applied for this job
        if(count(Application::where('job_id', $Job->id)->where('applicant_id',auth()->user()->seekerProfile->id)->get())){
            return redirect()->back()->with('message', 'You had already applied for this job');
        }
        
        $application = new Application;
        $application->employer_id = $Job->user_id;
        $application->job_id = $Job->id;
        $application->applicant_id = auth()->user()->seekerProfile->id;
        $application->user_id = auth()->user()->id;
        $application->save();

        foreach ($request->input('document', []) as $file) {
            //todo: findout how to add media from request(url) instead of path, then save to disk
            $application->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');//link file in storage to application
        }
        //send application sent notice to email queue for user and employer
        SendEmailQueue::dispatch($request->user(),Job::findOrFail($Job->id));

        return redirect()->back()->with('message', 'Application Submitted');
    }
    
    /**
     * Copy file attachments submitted with job applcation to storage
     */
    public function attachFiles(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    // returns all applications sent for jobs posted by an employer(all jobs mixed together)
    // public function applications(Request $request, $user_id){

    //     if(auth()->user() && auth()->user()->user_type_id == 2){        
    //     $applications = Application::where('employer_id',$user_id)->with(['applicant', 'user', 'employer'])->orderBy('created_at', 'desc')->get(); //return applicatioin with the related applicant
    //     return view('applications', compact('applications'));
    //     }

    //     if(auth()->user() && auth()->user()->user_type_id == 1){        
    //         $applications = Application::where('user_id',$user_id)->with(['job', 'user', 'employer'])->orderBy('created_at', 'desc')->get(); //return applicatioin with the related applicant
    //         return view('applications', compact('applications'));
    //         }
    

    //     return redirect()->route('home');
    // }

    public function applications(Request $request){

        if(auth()->user() && auth()->user()->user_type_id == 2){        
        $applications = Application::where('employer_id',auth()->user()->id)->with(['applicant', 'user', 'employer'])->orderBy('created_at', 'desc')->get(); //return applicatioin with the related applicant
        return view('applications', compact('applications'));
        }

        if(auth()->user() && auth()->user()->user_type_id == 1){        
            $applications = Application::where('user_id',auth()->user()->id)->with(['job', 'user', 'employer'])->orderBy('created_at', 'desc')->get(); //return applicatioin with the related applicant
            return view('applications', compact('applications'));
            }
    

        return redirect()->route('home');
    }

    //returns a list of job applications for a particular job
    public function applicationsByJob(Request $request, $job_id){
        
        if(auth()->user() && auth()->user()->user_type_id == 2){    
            $applications = Application::where('job_id',$job_id)->with(['applicant', 'user', 'employer'])->orderBy('created_at', 'desc')->get(); 
            //return application with the related applicant
            return view('applications', compact('applications'));
        }

        return redirect()->back()->with('message', 'unauthorized');
    }

    public function worxJobs(){
        $counties = County::all();
        $categories = JobFunction::all()->toArray(); 
        $query = Job::with('jobFunction', 'county')->where('applicationMethod', 3)->orderBy('created_at','desc')->paginate(20);
        return view ('search',compact(['query','categories','counties']));
    }
 
}




