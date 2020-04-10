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
                    <h4 class="text-uppercase title mb-4">{{$Job->title}}</h4>
                    <ul class="page-next d-inline-block mb-0">
                        <li><a href="{{route('home')}}"  class="text-uppercase font-weight-bold">Home</a></li>
                        <li><a href="{{ route('jobs') }}" class="text-uppercase font-weight-bold">Jobs</a></li>
                        <li>
                            <span class="text-uppercase text-white font-weight-bold">{{$Job->title}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->

<!-- JOB SINGLE START -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="job-detail text-center job-single border rounded p-4">
                    <div class="job-single-img mb-2">
                        <img src="{{ asset('images/featured-job/img-1.png') }}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                    <h4 class="text-dark">{{$Job->title}}</h4>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <p class="text-muted mb-2"><i class="mdi mdi-bank mr-1"></i>{{$Job->company['name']}}</p>
                        </li>

                        <li class="list-inline-item">
                            <p class="text-muted mb-2"><i class="mdi mdi-map-marker mr-1"></i>{{$Job->location['city']}},  {{$Job->location['country']}}</p>
                        </li>

                        <li class="list-inline-item">
                            <p class="text-muted mb-2"><i class="mdi mdi-currency-usd mr-1"></i>{{ $Job->salary_range }}/month</p>
                        </li>
                    </ul>
                    {{-- <p class="text-muted mb-0"></p>
                        <br /> --}}

                        <li class="list-inline-item">
                            <p class="text-muted mb-2"><i class="mdi mdi-calendar-today text-muted mdi-18px"></i>Application Deadline {{ $Job->deadline }}</p>
                        </li>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-dark mt-4">Job Description :</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <p class="text-muted mb-3">{{$Job->description}}</p>

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
                        <h4 class="text-dark mt-4">Education & Experience :</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">{{$Job->requirements}}</p>
                                </div>

                                {{-- <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Phasellus viverra nulla ut metus varius laoreet uisque
                                        rutrum enean imperdiet.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Etiam ultricies nisi vel augue Curabitur ullamcorper
                                        ultricies nisi am eget dui tiam rhoncus.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Donec mollis hendrerit risus hasellus nec sem in justo
                                        pellentesque facilisis.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Praesent congue erat at massa Sed cursus turpis vitae
                                        tortor onec posuere vulputate arcu.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Donec elit libero, sodales nec volutpat a suscipit non
                                        turpis ullam sagittis.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Pellentesque auctor neque nec urna Proin sapien ipsum
                                        porta a auctor quis euismod ut mi.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Pellentesque habitant morbi tristique senectus et netus
                                        et malesuada fames ac turpis egestas.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-0">Ptristique senectus et netus et malesuada fames porta a
                                        auctor quis euismod ut mi.</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-dark mt-4">Responsibilities :</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <p class="text-muted mb-3">{{$Job->responsibilities}}</p>
                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Morbi mattis ullamcorper velit hasellus gravida semper
                                        nisi nullam vel sem.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Phasellus viverra nulla ut metus varius laoreet uisque
                                        rutrum enean imperdiet.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Etiam ultricies nisi vel augue Curabitur ullamcorper
                                        ultricies nisi am eget dui tiam rhoncus.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Donec mollis hendrerit risus hasellus nec sem in justo
                                        pellentesque facilisis.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-2">Praesent congue erat at massa Sed cursus turpis vitae
                                        tortor onec posuere vulputate arcu.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="mdi mdi-minus text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-0">Donec elit libero, sodales nec volutpat a suscipit non
                                        turpis ullam sagittis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-dark mt-4">How To Apply :</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <p class="text-muted mb-0">1 )</p>
                                    </div>
                                    <p class="text-muted mb-3 overflow-hidden d-block">Vestibulum ante ipsum primis in
                                        faucibus orci luctus et ultrices posuere cubilia Curae In ac dui quis mi
                                        consectetuer lacinia ed aliquam ultrices mauris nteger ante arcu accumsan
                                        consectetuer thet a eget posuere ut mauris raesent adipiscing Sed lectus Donec
                                        mollis hendrerit risus hasellue.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <p class="text-muted mb-0">2 )</p>
                                    </div>
                                    <p class="text-muted mb-3 overflow-hidden d-block">In enim justo rhoncus ut
                                        imperdiet a venenatis vitae justo ullam dictum felis eu pede mollis pretium
                                        nteger tincidunt enean imperdiet tiam ultricies nisi vel augue urabitur
                                        ullamcorper ultricies nisi am eget Etiam rhoncus ras dapibus ivamus elementum
                                        semper nisi.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <p class="text-muted mb-0">3 )</p>
                                    </div>
                                    <p class="text-muted mb-0 overflow-hidden d-block">Maecenas nec odio et ante
                                        tincidunt tempus onec vitae sapien ut libero venenatis faucibus ullam quis ante
                                        tiam sit Vestibulum purus quam scelerisque ut mollis sed nonummy id metus ullam
                                        accumsan lorem in dui ras ultricies mi eu turpis hendrerit fringilla amet orci
                                        eget eros.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="company-brand-logo text-center">
                    <img src="{{ asset('images/featured-job/img-2.png') }}" alt="" class="img-fluid mx-auto d-block mb-3">
                    <h5 class="text-muted mb-0"><a href="#" class="text-muted"><i class="mdi mdi-bank mr-1"></i>{{$Job->company->name}}</a></h5>
                </div>

                <div class="job-detail rounded border job-overview mt-4 mb-4">
                    <div class="single-post-item mb-4">
                        <div class="float-left mr-3">
                            <i class="mdi mdi-security text-muted mdi-24px"></i>
                        </div>
                        <div class="overview-details">
                            <h6 class="text-muted mb-0">Experience</h6>
                            <h6 class="text-black-50 pt-2 mb-0">1 To 3 Years Exp.</h6>
                        </div>
                    </div>

                    <div class="single-post-item mb-4">
                        <div class="float-left mr-3">
                            <i class="mdi mdi-currency-usd text-muted mdi-24px"></i>
                        </div>
                        <div class="overview-details">
                            <h6 class="text-muted mb-0">Salary</h6>
                            <h6 class="text-black-50 pt-2 mb-0">{{$Job->salary_range}}</h6>
                        </div>
                    </div>

                    <div class="single-post-item mb-4">
                        <div class="float-left mr-3">
                            <i class="mdi mdi-apps text-muted mdi-24px"></i>
                        </div>
                        <div class="overview-details">
                            <h6 class="text-muted mb-0">Category</h6>
                            <h6 class="text-black-50 pt-2 mb-0">Developer</h6>
                        </div>
                    </div>

                    <div class="single-post-item mb-4">
                        <div class="float-left mr-3">
                            <i class="mdi mdi-human-male-female text-muted mdi-24px"></i>
                        </div>
                        <div class="overview-details">
                            <h6 class="text-muted mb-0">Gender</h6>
                            <h6 class="text-black-50 pt-2 mb-0">Male & Female</h6>
                        </div>
                    </div>

                    <div class="single-post-item mb-4">
                        <div class="float-left mr-3">
                            <i class="mdi mdi-calendar-today text-muted mdi-24px"></i>
                        </div>
                        <div class="overview-details">
                            <h6 class="text-muted mb-0">Date Posted</h6>
                            <h6 class="text-black-50 pt-2 mb-0">{{$Job->created_date}}</h6>
                        </div>
                    </div>

                    <div class="single-post-item mb-4">
                        <div class="float-left mr-3">
                            <i class="mdi mdi-email text-muted mdi-24px"></i>
                        </div>
                        <div class="overview-details">
                            <h6 class="text-muted mb-0">Company email</h6>
                            <h6 class="text-black-50 pt-2 mb-0">{{$Job->company->email}}</h6>
                        </div>
                    </div>

                    <div class="single-post-item mb-4">
                        <div class="float-left mr-3">
                            <i class="mdi mdi-email text-muted mdi-24px"></i>
                        </div>
                        <div class="overview-details">
                            <h6 class="text-muted mb-0">Company Address</h6>
                            <h6 class="text-black-50 pt-2 mb-0">{{$Job->company->website}}</h6>
                        </div>
                    </div>

                    <div class="single-post-item">
                        <div class="float-left mr-3">
                            <i class="mdi mdi-phone-classic text-muted mdi-24px"></i>
                        </div>
                        <div class="overview-details">
                            <h6 class="text-muted mb-0">Contact No</h6>
                            <h6 class="text-black-50 pt-2 mb-0">{{$Job->user->contact_number}}</h6>
                        </div>
                    </div>
                </div>

                <h5 class="text-dark">Job Location</h5>
                <div class="map">
                    <iframe src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            class="rounded" style="border: 0" allowfullscreen=""></iframe>
                </div>

                <div class="job-details-desc-item mt-2">
                    <div class="float-left mr-2">
                        <i class="mdi mdi-map-marker text-muted"></i>
                    </div>
                    <p class="text-muted mb-2">2254 Horizon CircleTacoma, WA 98499</p>
                </div>

                <ul class="social-icon list-inline mb-0 mt-4">
                    <li class="list-inline-item item-start">Share :</li>
                    <li class="list-inline-item"><a href="#" class=" rounded"><i class="mdi mdi-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#" class=" rounded"><i class="mdi mdi-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" class=" rounded"><i class="mdi mdi-google-plus"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="#" class=" rounded"><i class="mdi mdi-whatsapp"></i></a></li>
                    <li class="list-inline-item"><a href="#" class=" rounded"><i class="mdi mdi-linkedin"></i></a></li>
                </ul>

                <div class="mt-4">
                    <a href="#" class="btn btn-primary btn-block btn-sm"><i class="mdi mdi-send mr-2"></i>Apply This Job</a>
                </div>

                <div class="mt-4">
                    <div class="job-single-or position-relative">
                        <h6 class="mb-0 text-dark text-center">OR</h6>
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
