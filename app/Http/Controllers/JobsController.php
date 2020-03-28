<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;
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
        // $joblist = Job::all();

       $joblist = Job::with('location','company')->orderBy('created_date', 'desc')->get();

       
    //    dd($joblist);
        //also works 
        // return view('job-listings')->with('joblist', $joblist);
        return view('job-listings', compact('joblist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = User::where('id', auth()->user()->id)->with('type')->first();

        // dd($user->type['name']);
        if ($user->type['name'] != "Employer"){

            session()->flash('message', 'You must login with an employer account to post a job');
            Auth::logout();
            return redirect('login');
        }

        // dd($user->type->user_type_name);
        return view('post-job');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // $data = [
        //     'title' => 'sample title',
        //     // 'posted_by_id' => 1,
        //     'type_id' => 1,
        //     'company_id' => 1,
        //     'company_name_hidden' => 1,
        //     'no_of_positions' => 10,
        //     'description' => 'lorem',
        //     'location_id' => 1,
        //     'is_active' => 1,
        //     'salary_range' => 'lorem',
        //     'responsibilities' => 'lorem',
        //    'requirements' => 'lorem',             
        //     'education' => 'lorem',



        // ];

        $data = request()->validate([
            'title' => 'required',
            // 'posted_by_id' => 1,
            'type_id' => 'required', 
            'company_id' => 'required', 
            'company_name_hidden' => 'required', 
            'no_of_positions' => 'required',
            'description' => 'required', 
            'location_id' => 'required', 
            'is_active' => 'required', 
            'salary_range' => 'required', 
            'responsibilities' => 'required', 
           'requirements' => 'required',              
            'education' => 'required', 



        ]);

        // dd($data);
        $job = auth()->user()->job()->create($data);

       
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
        ->with(['location', 'company', 'type'])
        ->first();

        // $users = User::where('id', auth()->user()->id)->with('type')->first();

        // dd($users->type->user_type_name);
        return view('job', compact('Job'));

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
