<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BusinessStream;
use App\County;
use App\Job;
use App\JobFunction;
use App\Application;
use App\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $paginate_value = 10;
    
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

     public function getJobFunctionsCertificateBizStreamLists(){
         $job_functions = JobFunction::all();
         $biz_streams = BusinessStream::all();
         $education = ['High school','Certificate','Diploma','Degree','Post-graduate Diploma','Masters','Doctorate'];
         $companies = auth()->user()->companies()->get();
         return response(compact(['job_functions','biz_streams','education','companies']));
     }

    public function index()
    {
       $companies= Company::count();
        $applications =Application::count();
        $jobs =Job::count();
        $users =User::count();
        // $counties = County::all();
        // $categories = JobFunction::all()->toArray(); 
        $summary = JobFunction::orderByRaw('random()')->take(8)->with('jobs')->get();
        return view('home', compact(['summary','jobs','companies','applications','users']));
             
    }

    public function search(Request $request)

    {
        $counties = County::all();
        $categories = JobFunction::all()->toArray(); 
        $data=$request->all();
        $title=$data['job_title'];
        $county = $data['county'];
        $category = $data['category'];
        
        //no search field  filled
        if(!$title && !$county && !$category){
            return redirect()->route('jobs') ;
        }      
        //all 3 search fields  filled
        if($title && $county && $category){
           $query =  Job::with('jobFunction','county')->whereHas('jobFunction', function($q){
                    $q->where('id',$this->request->category);
                })
                ->whereHas('county',function($c){
                    $c->where('id','=',$this->request->county);
                })
                ->where('title','like','%'.$title.'%')
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);
        }
        // only title search filled
        if($title && !$county && !$category){
            $query = Job::with('jobFunction','county')
                ->where('title', 'like','%'.$title.'%')
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);

        }
        // only county search filled
        if(!$title && $county && !$category){
            $query = Job::with('jobFunction','county')
                ->where('county_id', $county)
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);

        }
        //only category search filled
        if(!$title && !$county && $category){
            $query = Job::with('jobFunction','county')
                ->where('job_function_id', $category)
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);

        }
        //title and county search fields only
        if($title &&  $county && !$category){
            $query =  Job::with('jobFunction','county')
                ->whereHas('county',function($c){
                    $c->where('id','=',$this->request->county);
                })
                ->where('title','like','%'.$title.'%')->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);

        }
        //title and category only
        if($title &&!$county &&$category){
                $query =  Job::with('jobFunction','county')->whereHas('jobFunction', function($q){
                    $q->where('id',$this->request->category);
                })
                ->where('title','like','%'.$title.'%')->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);
                    
        }
        //county and category only
        if(!$title &&$county &&$category){
                $query =  Job::with('jobFunction','county')->whereHas('jobFunction', function($q){
                    $q->where('id',$this->request->category);
                })
                ->whereHas('county',function($c){
                    $c->where('id','=',$this->request->county);
                })->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);
                        
        }

        if(!$title &&!$county &&!$category){
                $query =  Job::with('jobFunction','county')->whereHas('jobFunction', function($q){
                    $q->where('id',$this->request->category);
                })
                ->whereHas('county',function($c){
                    $c->where('id','=',$this->request->county);
                })->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);
                        
        }

        return view('search.results', compact(['query','categories','counties']));

        

        // return response()->json($data);

    }

    
}
