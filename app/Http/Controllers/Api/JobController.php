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
