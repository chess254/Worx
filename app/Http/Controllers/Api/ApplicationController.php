<?php

namespace App\Http\Controllers\Api;

use App\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Job;
use App\Mail\GroupEmail;
use App\User;


class ApplicationController extends Controller
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
    public function create()
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
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }

    /**
     * Shortlist an applicants application
     * @param \App\Application $application
     * @return \Illuminate\Http\Response
     */
    public function shortlist( $id){
        $user = auth()->user();
        $application = Application::find($id);
        if($application->employer_id == $user->id){
            $application->shortlisted = !$application->shortlisted;
            $application->save();
            $application->fresh();
            return response()->json(["message"=>$application->shortlisted ? "Shortlisted" : "Removed from Shortlist", "application"=>$application]);
        }

        return \response()->json(["message"=>"error shortlisting candidate"]);
    }

    public function status(Request $request, $id){
        $user = auth()->user();
        $application = Application::find($id);
        if($application->employer_id == $user->id){
            $application->status = $request->status;
            $application->save();
            $application->fresh();
            return response()->json(["message"=>$application->status]);
        }

        return \response()->json(["message"=>"error setting application status"]);
    }

    public function sendShortlistEmail($job){
        $applicant_user_ids = Job::find($job)->applications()->where('status','shortlisted')->pluck('user_id');
        $users_shortlisted = User::findMany($applicant_user_ids);
        $company = Job::find($job)->company;
// dd($company);
        foreach ($users_shortlisted as $recipient) {
            Mail::to($recipient)->queue(new GroupEmail($company, Job::find($job)));
        }

    //     Mail::to($request->user())
    // ->cc($moreUsers)
    // ->bcc($evenMoreUsers)
    // ->queue(new OrderShipped($order));
    }
}
