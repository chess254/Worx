<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BusinessStream;
use App\County;
use App\Job;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     
    public function __construct(Request $request)
    {
        // $this->middleware('auth');
        $this->request = $request;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $counties = County::all();
        $categories = BusinessStream::all()->toArray(); 
       
                
                // $jobs = Job::with('businessStream','county')->where('title','like','%web%')->whereHas('businessStream', function($q){
                //     $q->where('name','LIKE','%%');
                //     })->whereHas('county',function($c){$c->where('county_name','like','%%');})->get();
                    

                // dd($jobs[0]->businessStream->name);
                // dd($jobs);

                return view('home', compact(['categories','counties']));
             
    }

    public function search(Request $request)

    {
            // dd($request->all());
        $counties = County::all();
        $categories = BusinessStream::all()->toArray(); 

        $data=$request->all();
        $title=$data['job_title'];
        $county = $data['county'];
        $category = $data['category'];

        $data = Job::with('businessStream','county')->where('title','like','%{$title}%')->whereHas('businessStream', function($q){
            $q->where('id', '8');
            })->whereHas('county',function($c){$c->where('id', '36');})->get();

           $query =  Job::with('businessStream','county')->whereHas('businessStream', function($q){
                $q->where('id',$this->request->category);
                })->whereHas('county',function($c){$c->where('id','=',$this->request->county);})->where('title','like','%'.$title.'%')->get();
                

        // $data = Job::select("title")->where("title","LIKE","%{$request->input('query')}%")

        // ->get();
            // dd($query);
            // echo($request);

            return view('search', compact(['query','categories','counties']));

        // return response()->json($data);

    }

    
}
