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
                        <h4 class="text-uppercase title mb-4">job Applications</h4>
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
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @foreach ($applications as $application)
                    
                    <div class="candidates-listing-item ">
                        <div class="border mt-4 rounded p-3">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="float-left mr-4 d-inline:flex">
                                        <img src="images/employers/img-1.jpg" alt="" class="d-block rounded" height="90">
                                        
                                    </div>
                                    <div class="candidates-list-desc overflow-hidden job-single-meta  pt-2">
                                    <h5 class="mb-2"><a href="#" class="text-dark">{{$application->user->name}} {{$application->user->second_name}}</a></h5>
                                        <ul class="list-unstyled">
                                            <li class="text-muted"><i class="mdi mdi-account mr-1"></i>{{$application->applicant->title}}</li>
                                            <li class="text-muted"><a href="#" class="text-muted"><i
                                                    class="mdi mdi-map-marker mr-1"></i><small>{{$application->user->city}}. {{$application->user->county->county_name}}, {{$application->user->country}}</small></a></li>
                                            {{-- <li class="text-muted"><i class="mdi mdi-currency-usd mr-1"></i>$700 -
                                                $900/month
                                            </li> --}}  
                                        </ul>
                                        
                                        
                                        <p class="text-muted mt-1 mb-0">
                                            @foreach($application->applicant->skills as $skill)
                                           <button class="btn btn-info btn-sm badge p-1" disabled>{{ $skill }} </button> 
                                            @endforeach</p>
                                            @foreach($application->getMedia('document') as $media)
                                            <p>{{$media->getPath()}}</p> 
                                            @endforeach

                                        <a class="btn btn-sm btn-success" href="{{route('download', $application)}}" >download</a>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="candidates-list-fav-btn text-right">
                                        <div class="fav-icon">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <div class="candidates-listing-btn mt-4">
                                            <a href="#" class="btn btn-primary-outline btn-sm">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>             
                    </div>
                        
                    @endforeach
                    

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