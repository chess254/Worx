<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;
Use App\County;
use App\BusinessStream;
use Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $counties = County::all();
        $categories = BusinessStream::all()->toArray();  
        $totalJobs = Job::all()->count();
        $joblist = Job::with('location','company','county','businessStream')->orderBy('created_date', 'desc')->paginate(20);
        return view('job-listings', compact(['joblist', 'totalJobs','categories','counties']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = User::where('id', auth()->user()->id)->with('type')->first();
        if ($user->type['name'] != "Employer"){

            session()->flash('message', 'You must login with an employer account to post a job');
            Auth::logout();
            return redirect('login');
        }

        $user_companies = $user->companies;
        // dd($user_companies);

        return view('post-job',compact('user_companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $company = \App\Company::firstOrNew([
            'id'=>$request->company_id,
            'name' => $request->company_name,
        'description' => $request->company_description,
        'website' => $request->company_website,
        'business_stream_id'=>$request->company_business_stream_id

        ]);

        // dd($company);

        // $company->save();
        // dd($request);
            // dd($request->all());
        $data = [
            'title' => $request->title,
            'email'=> $request->email,
            'town' => $request->town,
            'user_id' => $user = Auth::user()->id,
            'type_id' => intval($request->type_id),
            'county_id'=>intval($request->county),
            'company_id'=>$request->company_id,
            'company_name_hidden' => 1,
            'no_of_positions' => $request->no_of_positions,
            'description' => $request->description, 
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
        // dd($company);    //add the company_id to the created job
        $job->save();
        return redirect('/job/'.$job->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(\App\Job $job)
    public function show($job)
    {
        $Job = Job::where('id', $job)
        ->with(['location', 'company', 'type','businessStream'])
        ->first();
        // dd($Job);    
        return view('job', compact('Job'));
    }

    public function jobsPostedBy(){
        $user_id = auth()->user()->id;
        $JobsPostedByUser = Job::where('user_id', $user_id)->get();

        return view('myjobs', compact('JobsPostedByUser'));

        // dd($JobsPostedByUser);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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




