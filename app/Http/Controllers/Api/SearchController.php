<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\BusinessStream;
use App\County;
use App\Job;
use App\JobFunction;

class SearchController extends Controller
{
    // $counties = County::all();
    //         $categories = JobFunction::all()->toArray(); 
    //         $data=$request->all();
    //         $title=$data['job_title'];
    //         $county = $data['county'];
    //         $category = $data['category'];

            public $counties;
           public $categories; 
           public $data;
           public $title;
           public $county; 
           public $category; 

    public $paginate_value = 5;

    public function __construct(Request $request){
    //  $this->counties = County::all();
    //         $this->categories = JobFunction::all()->toArray(); 
            // $this->data=$request->all();

            // dd($request->job_title);
            $this->title=$request->title;
            $this->county = $request->county;
            $this->category = $request->category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counties = County::all();
        $categories = JobFunction::all()->toArray();  
        // dd($categories);
        $totalJobs = Job::all()->count();
        $joblist = Job::with('location','company','county','businessStream','type','jobFunction')->orderBy('created_at', 'desc')->paginate(5);
        // return view('search.index', compact(['joblist', 'totalJobs','categories','counties']));
        return view('search.index',compact(['categories','counties','joblist']));
    }

    public function search(Request $request)

    {
         $this->request =$request;
        
        //no search field  filled
        // if(!$title && !$county && !$category){
        //     return redirect()->route('jobs') ;
        // }      
        //all 3 search fields  filled
        if($this->title && $this->county && $this->category){
           $query =  Job::with('location','company','county','businessStream','type','jobFunction')->whereHas('jobFunction', function($q){
                    $q->where('id',$this->request->category);
                })
                ->whereHas('county',function($c){
                    $c->where('id','=',$this->request->county);
                })
                ->where('title','like','%'.$this->title.'%')
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);
        }
        // only title search filled
        if($this->title && !$this->county && !$this->category){
            $query = Job::with('location','company','county','businessStream','type','jobFunction')
                ->where('title', 'like','%'.$this->title.'%')
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);

        }
        // only county search filled
        if(!$this->title && $this->county && !$this->category){
            $query = Job::with('location','company','county','businessStream','type','jobFunction')
                ->where('county_id', $this->county)
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);

        }
        //only category search filled
        if(!$this->title && !$this->county && $this->category){
            $query = Job::with('location','company','county','businessStream','type','jobFunction')
                ->where('job_function_id', $this->category)
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);

        }
        //title and county search fields only
        if($this->title &&  $this->county && !$this->category){
            $query =  Job::with('location','company','county','businessStream','type','jobFunction')
                ->whereHas('county',function($c){
                    $c->where('id','=',$this->request->county);
                })
                ->where('title','like','%'.$this->title.'%')->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);

        }
        //title and category only
        if($this->title &&!$this->county &&$this->category){

            // dd($request->category);
                $query =  Job::with('location','company','county','businessStream','type','jobFunction')->whereHas('jobFunction', function($q){
                    $q->where('id',$this->request->category);
                })
                ->where('title','like','%'.$this->title.'%')->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);
                    
        }
        //county and category only
        if(!$this->title &&$this->county &&$this->category){
                $query =  Job::with('location','company','county','businessStream','type','jobFunction')->whereHas('jobFunction', function($q){
                    $q->where('id',$this->request->category);
                })
                ->whereHas('county',function($c){
                    $c->where('id','=',$this->request->county);
                })->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);
                        
        }

        if(!$this->title &&!$this->county &&!$this->category){
                $query =  Job::with('location','company','county','businessStream','type','jobFunction')->orderBy('created_at', 'desc')
                ->paginate($this->paginate_value);
                        
        }

        // return view('search.results',compact('query','request'));

        return response()->json($query);
        // return response()->json($jobList, 200, ['testheader'=>'testheader']);

        

        // return response()->json($data);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

