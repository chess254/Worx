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
                'email'=>$request->company['email'],
                'name' => $request->company['name'],
            ],
            [
                'description' => $request->company['description'],
                'services'=>$request->company['services'],
                // 'services'=>['services','render','all', 'lists'],
                'business_stream_id'=>$request->company['business_stream_id'],
                'website' => $request->company['website'],
                'city'=>$request->company['city'],
                'county_id'=>$request->company['county_id'],
                'country'=>$request->company['country'],
                'mobile'=>$request->company['mobile'],
                'landline'=>$request->company['landline'],
                'facebook'=>$request->company['facebook'],
                'twitter'=>$request->company['twitter'],
                'linked_in'=>$request->company['linked_in'],
                'number_of_employees'=>$request->company['no_of_employees'],
                'date_of_formation'=>$request->company['date_of_formation'],

                
            
            ]
        );

        $company = auth()->user()->companies()->save($company);
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
}
