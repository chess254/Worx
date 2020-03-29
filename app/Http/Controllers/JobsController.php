<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;
use Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $joblist = Job::all();


       $joblist = Job::with('location','company')->orderBy('created_date', 'desc')->paginate(20);

       
    //    dd($joblist);
        //also works 
        // return view('job-listings')->with('joblist', $joblist);
        return view('job-listings', compact('joblist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = User::where('id', auth()->user()->id)->with('type')->first();

        // dd($user->type['name']);
        if ($user->type['name'] != "Employer"){

            session()->flash('message', 'You must login with an employer account to post a job');
            Auth::logout();
            return redirect('login');
        }

        // dd($user->type->user_type_name);
        return view('post-job');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // if($request->county ){$request->county = convert($request->county);}
        // if($request->type_id){$request->type_id = convert($request->type_id);}

        
        $data = [
            'title' => $request->title,
            'email'=> $request->email,
            'town' => $request->town,
'user_id' => $user = Auth::user()->id,
            'type_id' => intval($request->type_id),
            'county_id'=>intval($request->county),
            'company_id' => 1,
            'company_name_hidden' => 1,
            'no_of_positions' => $request->no_of_positions,
            'description' => $request->description, 
            'location_id' => 1,           
            'is_active' => 1,
            'salary_range' => $request->salary_range,
            'responsibilities' => $request->responsibilities,
           'requirements' =>$request->requirements,             
            'education' => $request->education,


            



        ];

       
        
        // dd($request);
        // dd($data);

        // $data = request([
        //     'title',
        //     // 'posted_by_id' => 1,
        //     'type_id', 
        //     'company_id', 
        //     'company_name_hidden', 
        //     'no_of_positions',
        //     'description', 
        //     'location_id', 
        //     'is_active', 
        //     'salary_range', 
        //     'responsibilities', 
        //    'requirements',              
        //     'education', 



        // ]);

        // dd($data);
        $job = auth()->user()->job()->create($data);

       
        return redirect('/job/'.$job->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(\App\Job $job)
    public function show($job)
    {
        $Job = Job::where('id', $job)
        ->with(['location', 'company', 'type'])
        ->first();

        // $users = User::where('id', auth()->user()->id)->with('type')->first();

        // dd($users->type->user_type_name);
        return view('job', compact('Job'));

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

 function convert(String $county){

    switch ($county) {
        case "MOMBASA":
            return 1;    
            break;
        case "KWALE":
            return 2;    
            break;
        case "KILIFI":
            return 3;    
            break;
        case "TANA RIVER":
            return 4;    
            break;
        case "LAMU":
            return 5;    
            break;
        case "TAITA TAVETA":
            return 5;    
            break;
        case "GARISSA":
            return 7;    
            break;
        case "WAJIR":
            return 8;    
            break;
        case "MANDERA":
            return 9;    
            break;
        case "MARSABIT":
            return 10;    
            break;
        case "ISIOLO":
            return 11;    
            break;
        case "MERU":
            return 12;    
            break;
        case "THARAKA-NITHI":
            return 13;    
            break;
        case "EMBU":
            return 14;    
            break;
        case "KITUI":
            return 15;    
            break;
        case "MACHAKOS":
            return 16;    
            break;
        case "MAKUENI":
            return 17;    
            break;
        case "NYANDARUA":
            return 18;    
            break;
        case "NYERI":
            return 19;    
            break;
        case "KIRINYAGA":
            return 20;    
            break;
        case "MURANG'A":
            return 21;    
            break;
        case "KIAMBU":
            return 22;    
            break;
        case "TURKANA":
            return 23;    
            break;
        case "WEST POKOT":
            return 24;    
            break;
        case "SAMBURU":
            return 25;    
            break;
        case "TRANS NZOIA":
            return 26;    
            break;
        case "UASIN GISHU":
            return 27;    
            break;
        case "ELGEYO/MARAKWET":
            return 28;    
            break;
        case "NANDI":
            return 29;    
            break;
        case "BARINGO":
            return 30;    
            break;
        case "LAIKIPIA":
            return 31;    
            break;
        case "NAKURU":
            return 32;    
            break;
        case "NAROK":
            return 33;    
            break;
        case "KAJIADO":
            return 34;    
            break;
        case "KERICHO":
            return 35;    
            break;
        case "BOMET":
            return 36;    
            break;
        case "KAKAMEGA":
            return 37;    
            break;
        case "VIHIGA":
            return 38;    
            break;
        case "BUNGOMA":
            return 39;    
            break;
        case "BUSIA":
            return 40;    
            break;
        case "SIAYA":
            return 41;    
            break;
        case "KISUMU":
            return 42;    
            break;
        case "HOMA BAY":
            return 43;    
            break;
        case "MIGORI":
            return 44;    
            break;
        case "KISII":
            return 45;    
            break;
        case "NYAMIRA":
            return 46;    
            break;
        case "NAIROBI":
            return 47;    
            break;
        case "Part Time":
            return 1;
        break;
          case  "Full Time":
          return 2;
          break;
            case "Remote":
                return 3;
            break;
    } 
    

}


