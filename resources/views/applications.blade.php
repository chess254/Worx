@extends('layouts.app')



@section('navbar')
  @include('partials.navbar')
@endsection

@section('content')


    <!-- Start home -->
    <section class="bg-half page-next-level">
        <div class="bg-overlay"></div>
        <div class="container">

            {{-- {{dd($applications)}} --}}
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h4 class="text-uppercase display-4 title mb-4">job Applications for {{$applications[0]->job->title }}</h4>
                        <ul class="page-next d-inline-block mb-0">
                            <li><a href="index.html" class="text-uppercase font-weight-bold">Home</a></li>
                            <li><a href="#" class="text-uppercase font-weight-bold">Applications</a></li>
                            <li>
                                <span class="text-uppercase text-white font-weight-bold">Candidates List</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <!-- CANDIDATES LISTING START -->
    <section class="section pt-0">
        <div class="container"> 
            {{-- <h3 style="align:center;" class="display-4">"{{$applications[0]->job->title}}"</h3> --}}
            <div class="row">
               
                <div class="col-lg-12 col-md-12">
                    @if (auth()->user() && auth()->user()->user_type_id == 2)
                    
                        @foreach ($applications as $application)
                        
                            <div class="candidates-listing-item ">
                                <div class="border mt-4 rounded p-3">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="float-left mr-4 d-inline:flex">
                                            <img src="{{$application->applicant->getFirstMediaUrl('profilepics')}}" alt="{{$application->applicant->name}}" class="d-block rounded" height="90">
                                                
                                            </div>
                                            <div class="candidates-list-desc overflow-hidden job-single-meta  pt-1 pb-1">
                                                <h5 class="mb-2"><a href="{{route('profile.show',$application->applicant->user_id )}}" class="text-dark">{{$application->user->name}} {{$application->user->second_name}}</a></h5>
                                                <ul class="list-unstyled">
                                                    <li class="text-muted"><i class="mdi mdi-account mr-1"></i>{{$application->applicant->title}}</li>
                                                    <li class="text-muted"><a href="#" class="text-muted"><i
                                                            class="mdi mdi-map-marker mr-1"></i><small>{{$application->user->city}}. {{$application->user->county->county_name}}, {{$application->user->country}}</small></a></li>
                                                    
                                                </ul>
                                                
                                                
                                                <p class="">
                                                    @foreach($application->applicant->skills as $skill)
                                                        <button class="btn btn-info btn-sm badge p-1" disabled><small>{{ $skill }}</small> </button> 
                                                    @endforeach
                                                </p>
                                                <div class="">
                                                    @foreach($application->getMedia('document') as $media)
                                                        <a class="badge badge-sm badge-warning" href="{{route('downloadone', $media)}}"><small>{{$media->id }}</small></a> 
                                                    @endforeach
                                                    <a class="badge badge-sm badge-success ml-4" href="{{route('download', $application)}}" > <small>Download all attachments</small> </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="candidates-list-fav-btn text-right">
                                                <div class="fav-icon">
                                                    <i class="mdi mdi-heart"></i>
                                                </div>
                                                <div class="candidates-listing-btn mt-4">
                                                <a href="{{route('profile.show',$application->applicant->user_id )}}" class="btn btn-primary-outline btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>             
                            </div>
                            
                        @endforeach
                     
                    @endif

                    @if (auth()->user() && auth()->user()->user_type_id == 1)
                        @foreach ($applications as $application)

                        <div class="col-lg-12 mt-4 pt-2">
                            <div class="job-list-box border rounded">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2">
                                            <div class="company-logo-img">
                                                <img src="images/featured-job/img-1.png" alt=""
                                                    class="img-fluid avatar avatar-small mr-3 rounded">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-9">
                                            <div class="job-list-desc">
                                                <h6 class="mb-2"><a href="/job/{{$application->job->id}}" class="text-dark" style="font-size: 20px;">{{$application->job->title}}</a></h6>
                                                <p class="text-muted mb-0"><i class="mdi mdi-bank mr-2"></i>{{$application->job->company['name']}}</p>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item mr-3">
                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker mr-2"></i>{{$application->job->town}}, {{$application->job->county['county_name']}}, {{$application->job->location['country']}}</p>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <p class="text-muted mb-0"><i
                                                                class="mdi mdi-clock-outline mr-2"></i>{{ $application->job->created_date }}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="job-list-button-sm text-right">
                                                @if ( $application->job->type['job_type'] == "Part Time" )
                                                <span class="badge badge-secondary">Part Time</span>
                                                @elseif( $application->job->type['job_type'] == "Full Time" )
                                                <span class="badge badge-success">Full Time</span>
                                                @else
                                                <span class="badge badge-warning">Remote</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                   
                        @endforeach
                    @endif
                    

                    <nav aria-label="Page navigation example">
                        <ul class="pagination job-pagination justify-content-center mb-0 mt-4 pt-2">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="mdi mdi-chevron-double-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="mdi mdi-chevron-double-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- CANDIDATES LISTING END -->

    <!-- subscribe start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="float-left position-relative notification-icon mr-2">
                        <i class="mdi mdi-bell-outline text-primary"></i>
                        <span class="badge badge-pill badge-danger">1</span>
                    </div>
                    <h5 class="mt-2 mb-0">Subscribe To Job Notification</h5>
                </div>
                <div class="col-lg-8 col-md-7 mt-4 mt-sm-0">
                    <form>
                        <div class="form-group mb-0">
                            <div class="input-group mb-0">
                                <input name="email" id="email" type="email" class="form-control"
                                    placeholder="Enter Your email here" required="" aria-describedby="newssubscribebtn">
                                <div class="input-group-append">
                                    <button class="btn btn-primary submitBnt" type="submit" id="newssubscribebtn">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe end -->

@endsection