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
        if(Auth::user()->user_type_id !== 2){
         return redirect('/home')->with("Only Employers can create company profile");
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

            $company = auth()->user()->companies()->save($company);
            if($request->hasFile('logo') && $request->file('logo')->isValid()){
                $company->addMediaFromRequest('logo')->toMediaCollection('logos');
            }
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
       
        $Company = Company::where('id', $company)->with('businessStream')
        ->first();

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
    public function edit( \App\Company $company){
        if(auth()->user() && auth()->user()->id == $company->user_id){
        
        $business_stream = \App\BusinessStream::all();
        return view('company.edit' , compact('company', 'business_stream') );
        } else {
            return redirect('home')->with('message', 'you can only edit your company');
        }
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Company $company)
    {  
         if(auth()->user() && auth()->user()->id == $company->user_id){
                $data = request()->validate(
                    [
                        'email'=>"",
                        'name' => "" ,
                        'description' => "" ,
                        'services'=> "",
                        'business_stream_id'=> "",
                        'website' => "" ,
                        'city'=> "",
                        'county_id'=> "",
                        'country'=> "",
                        'mobile'=> "",
                        'landline'=> "",
                        'facebook'=> "",
                        'twitter'=> "",
                        'linked_in'=> "",
                        'number_of_employees'=> "",
                        'date_of_formation'=> "",
                    
                    ]
                );

                //  dd($data, $company, $request->all());

                if($request->hasFile('logo') && $request->file('logo')->isValid()){
                    $company->addMediaFromRequest('logo')->toMediaCollection('logos');
                    sleep ( 2 ); //short delay to allow queue to process image
                }

                $company->update(array_merge($data,['services'=>explode(',', $request->services)]));

                // dd($company);
                
                return redirect('/company/'.$company->id);
        } else{
            return redirect()->back()->with('message', 'unauthorized');
        }
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
