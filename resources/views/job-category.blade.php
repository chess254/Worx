@extends('layouts.app')


@section('navbar')
  @include('partials.navbar')
@endsection

@section('content')

<!-- Start home -->
<section class="bg-half page-next-level">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center text-white">
                    <h4 class="text-uppercase title mb-4">Job List view</h4>
                    <ul class="page-next d-inline-block mb-0">
                        <li><a href="index.html" class="text-uppercase font-weight-bold">Home</a></li>
                        <li><a href="#" class="text-uppercase font-weight-bold">Jobs</a></li>
                        <li>
                            <span class="text-uppercase text-white font-weight-bold">Job Listing</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->

<div class="container">
    <div class="home-form-position">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="home-registration-form job-list-reg-form bg-light shadow p-4 mb-3">
                    <form class="registration-form" action="{{ url('search')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="registration-form-box">
                                    <i class="fa fa-briefcase"></i>
                                    <input type="text" id="exampleInputName1" name="job_title"
                                           class="form-control rounded registration-input-box"
                                           placeholder="Job keywords...">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="registration-form-box">
                                    <i class="fa fa-list-alt"></i>
                                    <select id="select-category" class="demo-default" name="category">
                                        <option value="">Categories...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="registration-form-box">
                                    <i class="mdi mdi-map-marker"></i>
                                    <select id="select-country" class="demo-default" name="county">
                                        <option value="">Location</option>
                                        @foreach ($counties as $county)
                                    <option value="{{$county['id']}}">{{$county['county_name']}}</option>
                                  @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="registration-form-box">
                                    <button type="submit" id="submit" 
                                           class="submitBnt btn btn-primary btn-block" value="Submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JOB LIST START -->
<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                <h4 class="title title-line pb-5"> <small> Category</small> "{{$categoryName}}"</h4>
                    <p class="text-muted para-desc mx-auto mb-1">Post a job to tell us about your project. We'll quickly
                        match you with the right freelancers.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="left-sidebar">
                    <div class="accordion" id="accordionExample">
                        <div class="card rounded mt-4">
                            <a data-toggle="collapse" href="#collapseOne" class="job-list" aria-expanded="true"
                               aria-controls="collapseOne">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0 text-dark f-18">Date Posted</h6>
                                </div>
                            </a>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                                <div class="card-body p-0">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customRadio"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted" for="customRadio1">Last
                                            Hour</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customRadio"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted" for="customRadio2">Last 24
                                            hours</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="customRadio"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted" for="customRadio3">Last 7
                                            days</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio4" name="customRadio"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted" for="customRadio4">Last 14
                                            days</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio5" name="customRadio"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted" for="customRadio5">Last 30
                                            days</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- collapse one end -->
                        <div class="card rounded mt-4">
                            <a data-toggle="collapse" href="#collapsetwo" class="job-list" aria-expanded="true"
                               aria-controls="collapsetwo">
                                <div class="card-header" id="headingtwo">
                                    <h6 class="mb-0 text-dark f-18">Categories</h6>
                                </div>
                            </a>
                            <div id="collapsetwo" class="collapse show" aria-labelledby="headingtwo">
                                <div class="card-body p-0">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio7" name="customRadio1"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio7">Digital
                                            & Creative</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio8" name="customRadio1"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio8">Accountancy</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio9" name="customRadio1"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio9">Banking</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio10" name="customRadio1"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio10">IT
                                            Contractor</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio11" name="customRadio1"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio11">Graduate</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio12" name="customRadio1"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio12">Estate
                                            Agency</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- collapse one end -->
                        <div class="card rounded mt-4">
                            <a data-toggle="collapse" href="#collapsethree" class="job-list" aria-expanded="true"
                               aria-controls="collapsethree">
                                <div class="card-header" id="headingthree">
                                    <h6 class="mb-0 text-dark f-18">Experince</h6>
                                </div>
                            </a>
                            <div id="collapsethree" class="collapse show" aria-labelledby="headingthree">
                                <div class="card-body p-0">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio13" name="customRadio2"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio13">1Year
                                            to 2Year</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio14" name="customRadio2"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio14">2Year
                                            to 3Year</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio15" name="customRadio2"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio15">3Year
                                            to 4Year</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio16" name="customRadio2"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio16">IT
                                            Contractor</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- collapse one end -->
                        {{-- <div class="card rounded mt-4">
                            <a data-toggle="collapse" href="#collapsefour" class="job-list" aria-expanded="true"
                               aria-controls="collapsefour">
                                <div class="card-header" id="headingfour">
                                    <h6 class="mb-0 text-dark f-18">Gender</h6>
                                </div>
                            </a>
                            <div id="collapsefour" class="collapse show" aria-labelledby="headingfour">
                                <div class="card-body p-0">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio17" name="customRadio3"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio17">Male</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio18" name="customRadio3"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio18">Female</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio19" name="customRadio3"
                                               class="custom-control-input">
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customRadio19">Others</label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- collapse one end -->
                    </div>
                </div>
            </div>

            <div class="col-lg-9 mt-4 pt-2">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="show-results">
                            <div class="float-left">
                                <h5 class="text-dark mb-0 pt-2 f-18">{{$joblist->total()}} Jobs Listed</h5>
                            </div>
                            {{-- <div class="sort-button float-right">
                                <select class="nice-select rounded">
                                    <option data-display="Select">Nothing</option>
                                    <option value="1">Web Developer</option>
                                    <option value="2">PHP Developer</option>
                                    <option value="3">Web Designer</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="row list-image-adjust">

                    @foreach ($joblist as $job)
                        <div class="col-lg-12 mt-4 pt-2">
                            <div class="job-list-box border rounded">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-2">
                                            <div class="company-logo-img">
                                            <img src="{{$job->company->getLogo()}}" alt="{{$job->company->name}}logo"
                                                    class="img-fluid avatar avatar-small mr-3 rounded">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="job-list-desc">
                                                <h6 class="mb-2"><a href="/job/{{$job->id}}" class="text-dark" style="font-size: 20px;">{{$job->title}}</a></h6>
                                                <p class="text-muted mb-0"><i class="mdi mdi-bank mr-2"></i>{{$job->company['name']}}</p>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item mr-3">
                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker mr-2"></i>{{$job->town}}, {{$job->county['county_name']}}, {{$job->location['country']}}</p>
                                                    </li>

                                                    <li class="">
                                                        <p class="text-muted mb-0"><small><i
                                                                class="mdi mdi-clock-outline mr-2"></i>{{ $job->created_at->diffForHumans(null,true)." ago" }}</small></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <div class="job-list-button-sm text-left">
                                                @if ( $job->type['job_type'] == "Part Time" )
                                                <span class="badge badge-secondary">Part Time</span>
                                                @elseif( $job->type['job_type'] == "Full Time" )
                                                <span class="badge badge-success">Full Time</span>
                                                @else
                                                <span class="badge badge-warning">Remote</span>
                                                @endif

                                                {{-- <div class="mt-3">
                                                    <a href="/job/{{$job->id}}" class="btn btn-sm btn-primary">Apply</a>
                                                </div> --}}
                                            </div>
                                            <div class="job-list-button-sm text-left">
                                                <p class="text-muted mb-0"><i
                                                    class="mdi mdi-eye-outline mr-1"></i><small> {{$job->views}} </small></p>

                                                {{-- <div class="mt-3">
                                                    <a href="/job/{{$job->id}}" class="btn btn-sm btn-primary">Apply</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $joblist->onEachSide(1)->links('vendor.pagination.custom') }}

                </div>
            </div>
        </div>
    </div>
</section>
<!-- JOB LIST START -->

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


