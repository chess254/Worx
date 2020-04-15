<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::guest()){
            return redirect ('/home');
        }
        $business_stream = \App\BusinessStream::all();
        return view('company.create', compact('business_stream'));
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
                return redirect ('/home');
            }

        $company = \App\Company::firstOrNew(
            [
                'email'=>$request->email,
                'name' => $request->name,
            ],
            [
                'description' => $request->description,
                'services'=>explode(',', $request->services),
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
                'number_of_employees'=>$request->number_of_employees,
                'date_of_formation'=>$request->date_of_formation,
            
            ]
        );

            // $company->toArray();

            $company = auth()->user()->companies()->create($company->toArray());
            return redirect('/company/'.$company->id);
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $company)
    {
       
        // return view('job', compact('Job'));

        $Company = Company::where('id', $company)->with('businessStream')
        ->first();

        // dd($Company);
        if($Company){
            return view('company.view', compact('Company'));
        } else{
            return redirect('/company');
        }
    }

    public function view(Request $request, $company)
    {
        $Company = Company::where('id', $company)->with('businessStream')
        ->first();

        
        return $Company->toArray();
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
