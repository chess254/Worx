<?php

namespace App\Http\Controllers\Api;

use App\EducationDetails;
use App\Interview;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
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
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->application_id){
            $application = Application::find($request->application_id)->first();
            $interview = new Interview();
            $interview->job_id = $application->job_id;
            $interview->application_id = $application->id;
            $interview->company_id = $application->company_id;
            $interview->save();
            $interview->seeker_profiles()->attach($application->applicant_id,['start_time'=> new DateTime('now') , 'end_time'=> new DateTime('now') , 'status'=> 'shortlisted'])
        }
    }

    // public static function makeFromApplication(Application $application): self
    // {
    //     // $application = Application::find($request->application_id)->first();
    //     return self::make([
    //         'job_id' => $applicatio->job_id,
    //         'application_id' => $application->id,
    //         'company_id' => $application->company_id,
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EducationDetails  $educationDetails
     * @return \Illuminate\Http\Response
     */
    public function show(EducationDetails $educationDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EducationDetails  $educationDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationDetails $educationDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EducationDetails  $educationDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationDetails $educationDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EducationDetails  $educationDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationDetails $educationDetails)
    {
        //
    }
}
