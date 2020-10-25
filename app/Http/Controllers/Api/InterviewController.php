<?php

namespace App\Http\Controllers\Api;

use App\EducationDetails;
use App\Interview;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \DateTime;

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
        //
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

    public function generateTimeSlots(DateTime $period_start, DateTime $period_end, DateInterval $interval, $occupied_slots){

    }
}
