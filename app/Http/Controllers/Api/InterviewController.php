<?php

namespace App\Http\Controllers\Api;

use App\utils\generateTimeSlots;
use App\EducationDetails;
use App\Interview;
use App\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Job;
// use \App\DateTime\DateTime;
use \DateTime;
use App\Carbon;

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



    public function scheduleInterview(Request $request){
        // todo check if user making request is authenticated, is an employer and owns the job hes generating interviews for
        if(!Auth::check()){
            return \response()->json(['message'=>'not logged in']);
        }

        if(auth()->user()->user_type_id != 2){
            return response()->json(['message'=> 'login as candidate to apply']);
        }

        if(auth()->user()->id == Job::find($job_id)->user_id){

            $unavailable_slots = $request->unavailable_slots ? json_decode($request->unavailable_slots, true) : [];
            //find a way to make sure there are always applications to schedule, or provide feedback to user that there are no applications in selected for scheduling
            $applications = $request->applications ? explode(",", $request->applications) : [];
            $interview_duration = $request->duration;
            $closing_date = $request->closing_date;
            $opening_date = $request->opening_date;
            $opening_hour = $request->opening_hour;
            $closing_hour = $request->closing_hour;
            $available_slots = $request->available_slots ? json_decode($request->input('available_slots'), true) : [];

            $index=0;
            foreach($applications as $application){
                if($available_slots[$index]){
                    Interview::createFromApplication(Application::find($application), new DateTime($available_slots[$index]['start']),  new DateTime($available_slots[$index]['end']));
                    $index++;
                }
            }

            return response()->json(['message'=>'success'], 201);
        } else {
            return response()->json(['message'=> 'unauthorized'], 403);
        }

    }
}
