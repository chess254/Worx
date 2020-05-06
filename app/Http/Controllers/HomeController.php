<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BusinessStream;
use App\County;
use App\Job;
use App\JobFunction;
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
        $categories = JobFunction::all()->toArray(); 
        $summary = JobFunction::orderByRaw('RAND()')->take(8)->with('jobs')->get();

       
                
                // $jobs = Job::with('businessStream','county')->where('title','like','%web%')->whereHas('businessStream', function($q){
                //     $q->where('name','LIKE','%%');
                //     })->whereHas('county',function($c){$c->where('county_name','like','%%');})->get();
                    

                // dd($jobs[0]->businessStream->name);
                // dd($jobs);

                return view('home', compact(['categories','counties','summary']));
             
    }

    public function search(Request $request)

    {
            // dd($request->all());
        $counties = County::all();
        $categories = JobFunction::all()->toArray(); 

        $data=$request->all();
        $title=$data['job_title'];
        $county = $data['county'];
        $category = $data['category'];

        // dd($data);
        
        //all 3 fields filled
        if(!$title &&!$county&&!$category){
            // $query =  Job::with('jobFunction','county')->whereHas('jobFunction', function($q){
            //          $q->where('id',$this->request->category);
            //      })
            //      ->whereHas('county',function($c){
            //          $c->where('id','=',$this->request->county);
            //      })
            //      ->where('title','like','%'.$title.'%')->get();
                 
             
             return redirect()->route('jobs') ;
         }

        if($title &&$county&&$category){
           $query =  Job::with('jobFunction','county')->whereHas('jobFunction', function($q){
                    $q->where('id',$this->request->category);
                })
                ->whereHas('county',function($c){
                    $c->where('id','=',$this->request->county);
                })
                ->where('title','like','%'.$title.'%')->get();
                
            
            return view('search', compact(['query','categories','counties']));
        }
        // only title filled
        if($title&&!$county&&!$category){
            $query = Job::with('jobFunction','county')->where('title', 'like','%'.$title.'%')->orderBy('created_at', 'desc')->paginate(20);

            return view('search', compact(['query','categories','counties']));
        }
        // only county filled
        if(!$title&&$county&&!$category){
            $query = Job::with('jobFunction','county')->where('county_id', $county)->orderBy('created_at', 'desc')->paginate(20);

            return view('search', compact(['query','categories','counties']));
        }
        //only category filled
        if(!$title&&!$county&&$category){
            $query = Job::with('jobFunction','county')->where('job_function_id', $category)->orderBy('created_at', 'desc')->paginate(20);

            return view('search', compact(['query','categories','counties']));
        }
        //title and county only
        if( $title && $county && !$category){
            $query =  Job::with('jobFunction','county')
                ->whereHas('county',function($c){
                    $c->where('id','=',$this->request->county);
                })
                ->where('title','like','%'.$title.'%')->orderBy('created_at', 'desc')->paginate(20);
            return view('search', compact(['query','categories','counties']));
        }
        //title and category only
        if($title&&!$county&&$category){
            $query =  Job::with('jobFunction','county')->whereHas('jobFunction', function($q){
                $q->where('id',$this->request->category);
            })
            ->where('title','like','%'.$title.'%')->orderBy('created_at', 'desc')->paginate(20);
            
        
        return view('search', compact(['query','categories','counties']));        }
        //county and category only
        if(!$title&&$county&&$category){
            $query =  Job::with('jobFunction','county')->whereHas('jobFunction', function($q){
                $q->where('id',$this->request->category);
            })
            ->whereHas('county',function($c){
                $c->where('id','=',$this->request->county);
            })->orderBy('created_at', 'desc')->paginate(20);
            
        
        return view('search', compact(['query','categories','counties']));        
        }

        if(!$title&&!$county&&!$category){
            $query =  Job::with('jobFunction','county')->whereHas('jobFunction', function($q){
                $q->where('id',$this->request->category);
            })
            ->whereHas('county',function($c){
                $c->where('id','=',$this->request->county);
            })->orderBy('created_at', 'desc')->paginate(20);
            
        
        return view('search', compact(['query','categories','counties']));        
        }

        

        // return response()->json($data);

    }

    
}
