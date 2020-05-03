@extends('layouts.app')

@section('scripts')
           
@endsection

@section('navbar')
  @include('partials.navbar')
@endsection
@section('content')

<!-- Start home -->
<section class="bg-quarter page-next-level">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center text-white">
                    {{-- flash message here on successful aplication --}}
                    
                    {{-- <h4 class="text-uppercase title mb-4">{{$Job->title}}</h4>
                    <ul class="page-next d-inline-block mb-0">
                        <li><a href="{{route('home')}}"  class="text-uppercase font-weight-bold">Home</a></li>
                        <li><a href="{{ route('jobs') }}" class="text-uppercase font-weight-bold">Jobs</a></li>
                        <li>
                            <span class="text-uppercase text-white font-weight-bold">{{$Job->title}}</span>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->

<!-- JOB SINGLE START -->
<section class="section">
    <div class="container" >
        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                    </div>
                    @endif
        <div class="row" style="display: flex; justify-content:space-between;">
            <div class="col-lg-8 col-md-7">
                <div class="job-detail text-center job-single border rounded p-4">
                    <div class="job-single-img mb-2">
                    <img src="{{ $Job->company->getFirstMediaUrl('logos','square')}}" alt="{{$Job->company->name}}" class="img-fluid mx-auto d-block">
                    </div>
                    <h2 class="text-dark ">{{$Job->title}}</h2>
                    {{-- {{dd($Job)}} --}}
                    <h5>{{$Job->jobFunction->name}}</h5>

                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <p class="text-muted mb-0"><i class="mdi mdi-bank mr-1"></i>{{$Job->company['name']}}</p>
                        </li>

                        <li class="list-inline-item mr-3" >
                            <p class="text-muted mb-0"><i  class="mdi mdi-map-marker mr-1"></i>{{$Job->town}}, {{$Job->county->county_name}}, {{$Job->location['country']}}</p>
                        </li>

                        <li class="list-inline-item mr-3" >
                            <p class="text-muted mb-0"><i  class="mdi mdi-cash-multiple mr-1"></i>{{ $Job->salary_range }}/month</p>
                        </li>
                    </ul>
                   
<ul class="list-inline mb-0">
                        <li class="list-inline-item mr-4">
                            <p class="text-muted mb-0"><i class="mdi mdi-calendar-today mdi-18px mr-2"></i><small>deadline</small> {{date_format($Job->deadline,'D d-M-Y')}}  <small>({{ $Job->deadline->diffForHumans() }})</small></p>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-dark mt-4">Job Description </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <p class="text-muted mb-3">{!!$Job->description!!}</p>

                            </div>

                            <ul class="list-inline mt-3 mb-0">
                                <li class="list-inline-item mr-3">
                                    <a href="#" class="text-muted mb-0"><i class="mdi mdi-earth mr-1"></i>{{$Job->company->website}}</a>
                                </li>

                                <li class="list-inline-item mr-3">
                                    <a href="#" class="text-muted mb-0"><i class="mdi mdi-download mr-1"></i>Download
                                        Info</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-dark mt-4">Education & Experience </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <div class="job-details-desc-item">
                                    
                                    <p class="text-muted mb-2">{!!$Job->requirements!!}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-dark mt-4">Responsibilities </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <p class="text-muted mb-3">{!!$Job->responsibilities!!}</p>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-dark mt-4">How To Apply </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            @if ($Job->applicationEmail)
                                {!!$Job->applicationInstructions!!}
                            @endif
                            
                            
                            @if ($Job->applicationWebsite)
                            {!!$Job->applicationInstructions!!} <br>
                                
                            <a href="http://{{$Job->applicationWebsite}} ">Click to apply</a>                            
                            @endif
                            @if ($Job->applicationWorx)  
                                
                                @if (auth()->check() && count($Job->applications->where('user_id', auth()->user()->id)))
                                <button class="btn btn-success btn-block btn-sm mb-4"type="submit" disabled > <i class="mdi mdi-check mr-2"></i> You have applied for this job </button> 
                                @else

                                {!!$Job->applicationInstructions!!}
                            
                                <form action="/job/{{$Job->id}}/apply" method="post" id="attachFiles">

                                    @if(auth()->check() && auth()->user()->user_type_id == 1)
                                        
                                        <div class="form-group">
                                            <label for="document">Documents</label>
                                            <div class="needsclick dropzone" id="document-dropzone">
                                    
                                            </div>
                                        </div>
                                    @endif

                                    @csrf
                                    <input type="hidden">
                                    <button class="btn btn-primary btn-block btn-sm mb-4"type="submit"> <i class="mdi mdi-send mr-2"></i> apply</button> 
                                </form>     
                                @endif                    
                            @endif
                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0" style="position: sticky; position: -webkit-sticky; top: 100px;" >

                    <div class="job-detail border rounded p-4">
                        <h5 class="text-muted text-center pb-1"><i class="mdi mdi-book mr-2"></i></h5>

                        <div class="job-detail-location pt-4 border-top">
                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-bank text-muted"></i>
                                </div>
                                
                                <p class="text-muted"><a  href="/company/{{$Job->company->id}}" >{{$Job->company->name}}</a></p>
                            </div>
                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-email text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">{{$Job->company->email}}</p>
                               
                            </div>


                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-web text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">{{$Job->company->website}}</p>
                            </div>

                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-cellphone-iphone text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">{{$Job->company->mobile}}</p>
                            </div>

                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-currency-usd text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">KShs {{$Job->salary_range}}/month</p>
                            </div>

                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-security text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">1 To 3 Years.</p>
                            </div>

                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-clock-outline text-muted"></i>
                                </div>
                                <p class="text-muted mb-2"> {{ $Job->created_at->diffForHumans(null,true)." ago" }}</p>
                            </div>

                            <h6 class="text-dark f-17 mt-3 mb-0">Share Job </h6>
                            <ul class="social-icon list-inline mt-3 mb-0">
                                <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-whatsapp"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-linkedin"></i></a></li>
                            </ul>
                        </div>
                    

                    

                    <div class="job-detail border rounded mt-4">
                        <a href="#" class="btn btn-primary btn-block">Apply For Job</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="job-single-social-icon btn-primary fb-btn text-center mt-4">
                            <a href="#" class="text-white"><i class="mdi mdi-facebook facebook"></i></a>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="job-single-social-icon gp-btn btn-primary  text-center mt-4">
                            <a href="#" class="text-white"><i class="mdi mdi-google-plus google"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- JOB SINGLE END -->

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
