<?php

namespace App\Http\Controllers\Api;

use App\ExperienceDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ExperienceDetailsController extends Controller
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
     * @param  \App\ExperienceDetails  $experienceDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ExperienceDetails $experienceDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExperienceDetails  $experienceDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ExperienceDetails $experienceDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExperienceDetails  $experienceDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user() && ExperienceDetails::find($id)->seekerProfile == Auth::user()->seekerprofile){
            $profile = Auth::user()->seekerprofile;
            $experience = ExperienceDetails::findOrFail($id);
            $experience->update($request->toArray());
            $profile->fresh();
            return response()->json($profile->experienceDetails);
        }

        return response()->json("unauthorized");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExperienceDetails  $experienceDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user() && ExperienceDetails::find($id)->seekerProfile == Auth::user()->seekerprofile){
            $profile = Auth::user()->seekerprofile;
            ExperienceDetails::findOrFail($id)->delete();
            $profile->fresh();
            return response()->json($profile->experienceDetails);
        }

        return \response()->json("unauthorized");
    }
}
