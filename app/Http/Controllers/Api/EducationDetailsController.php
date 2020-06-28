<?php

namespace App\Http\Controllers\Api;

use App\EducationDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class EducationDetailsController extends Controller
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
    public function update(Request $request,$id)
    {
        if(Auth::user() && EducationDetails::find($id)->seekerProfile == Auth::user()->seekerprofile){
            $profile = Auth::user()->seekerprofile;
            // return response($request);
            $education = EducationDetails::findOrFail($id);
            

            $education->update($request->toArray());
            // $education->fresh();

            $profile->fresh();
            return response()->json($profile->educationDetails);
        }

        return response()->json("unauthorized");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EducationDetails  $educationDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        if(Auth::user() && EducationDetails::find($id)->seekerProfile == Auth::user()->seekerprofile){
            $profile = Auth::user()->seekerprofile;
            EducationDetails::findOrFail($id)->delete();
            $profile->fresh();
            return response()->json($profile->educationDetails);
        }

        return response()->json("unauthorized");
    }
}
