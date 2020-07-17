<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CompanyController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::guest()){
            return response()->json('unauthorized');
        }
        $company = \App\Company::firstOrNew(
            [
                'email'=>$request->email,
                'name' => $request->name,
            ],
            [
                'description' => $request->description,
                // 'services'=>$request->services, this works for the laravel frontend
                'services'=>explode(",", $request->services),
                'business_stream_id'=>$request->business_stream_id,
                'website' => $request->website,
                'city'=>$request->city,
                'county_id'=>$request->county_id,
                'country'=>$request->country,
                'mobile'=>$request->mobile,
                'landline'=>$request->landline,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linked_in'=>$request->linked_in,
                'number_of_employees'=>$request->no_of_employees,
                'date_of_formation'=>$request->date_of_formation,
                

                
            
            ]
        );

        $company = auth()->user()->companies()->save($company);
        $company->fresh();
            if($request->hasFile('logo') && $request->file('logo')->isValid()){
                $company->addMediaFromRequest('logo')->toMediaCollection('logos');
            }
            return response()->json(Company::where('id',$company->id)->with('businessStream', 'jobs')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($company)
    {
        $Company = Company::where('id', $company)->with('businessStream','jobs')
        ->first();

        return $Company;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        
       $company->update($request->data['company']);
        return $request->data['company'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }

    public function logo(Request $request, $company_id)
    {
        $Company = Company::where('id', $company_id)->first();
        // if($request->hasFile('logo')){
        //     // return response()->json([$request->hasFile('image'), $request->image->getClientOriginalName(), $request->id ]);
        //     $company->addMedia($request->file('image'))->toMediaCollection('profilepics');
        //     $profile->fresh();
        //     $profile->image = $profile->getProfilePic();
        //     $profile->save();
        //     $profile->fresh();
        //     return response()->json($profile, 200);
        // }
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $company->addMediaFromRequest('logo')->toMediaCollection('logos');
            $company->fresh();
            return response()->json($company);
        }

        return \response()->json('not updated');
    }
}
