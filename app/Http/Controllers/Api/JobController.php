<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Job;
use App\User;
Use App\County;
use App\BusinessStream;
use App\Application;
use App\JobFunction;
use Illuminate\Http\Request;
use Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalJobs = Job::all()->count();
        $jobList = Job::with('location','company','county','businessStream','type','jobFunction')->orderBy('created_at', 'desc')->paginate(10);
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
}
