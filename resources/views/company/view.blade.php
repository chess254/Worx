@extends('layouts.app')
@section('navbar')
  @include('partials.navbar')
@endsection

@section('content')
<section class="bg-quarter page-next-level">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                {{-- <div class="text-center text-white">
                    <h4 class="text-uppercase title mb-4">{{$Company->name}}</h4>
                    <ul class="page-next d-inline-block mb-0">
                        <li><a href="index.html" class="text-uppercase font-weight-bold">Home</a></li>
                        <li><a href="#" class="text-uppercase font-weight-bold">Pages</a></li>
                        <li><a href="#" class="text-uppercase font-weight-bold">Employer</a></li>
                        <li>
                            <span class="text-uppercase text-white font-weight-bold">{{$Company->name}}</span>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- end home -->

<!-- EMPLOYERS DETAILS START -->
<section class="section">
    <div class="container">
        <div class="row">
            @if (auth()->user() && auth()->user()->id == $Company->user_id)
            <div class="col-lg-12"> <a href="{{route('company.edit', $Company->id)}}" style="float:right;"> <button class="btn btn-sm btn-secondary-outline" class="text-dark"> <i class="mdi mdi-pencil" style="color: black;"></i> Edit </button></a></div>                
            @endif
            
            <div class="col-lg-12">
                <div class="text-sm-center" style="margin-top: 40px;">
                    <img src="{{$Company->getLogo()}}" alt="{{$Company->name}}" class="img-fluid mx-md-auto d-block">
                    {{-- {{$Company->getFirstMedia('logos')}} --}}
                    <h2 class="mt-3"><a href="#" class="text-dark">{{$Company->name}}</a></h2>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <p class="text-muted mb-0"><i class="mdi mdi-map-marker mr-2"></i>{{$Company->city}}, {{$Company->country}}</p>
                        </li>

                        <li class="list-inline-item">
                            <p class="text-success mb-0"><i class="mdi mdi-bookmark-check mdi-18px mr-2"></i>Verified
                            </p>
                        </li>
                    </ul>

                    <ul class="list-inline mb-2">
                        <li class="list-inline-item mr-3 ">
                            <p class="text-muted"><i class="mdi mdi-earth mr-2"></i>{{$Company->website}}</p>
                        </li>

                        <li class="list-inline-item mr-3">
                            <p class="text-muted"><i class="mdi mdi-email mr-2"></i>{{$Company->email}}</p>
                        </li>

                        <li class="list-inline-item">
                            <p class="text-muted"><i class="mdi mdi-cellphone-iphone mr-2"></i>{{$Company->mobile}}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="border-top border-bottom pt-4 pb-4">
                    <div class="row justify-content-sm-center">
                        <div class="col-lg-2 col-md-3 col-6">
                            <div class="text-sm-center m-14">
                                <h5 class="text-dark mb-2">Employs</h5>
                                <p class="text-muted mb-0">{{$Company->number_of_employees}} +</p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-6">
                            <div class="text-sm-center m-14">
                                <h5 class="text-dark mb-2">Type</h5>
                                <p class="text-muted mb-0">{{$Company->businessStream->name}}</p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-6">
                            <div class="text-sm-center m-14">
                                <h5 class="text-dark mb-2">Experience</h5>
                                <p class="text-muted mb-0">10 Years + Exp.</p>
                            </div>
                        </div>

                        {{-- <div class="col-lg-2 col-md-3 col-6">
                            <div class="text-sm-center m-14">
                                <h5 class="text-dark mb-2">Revenue</h5>
                                <p class="text-muted mb-0">$7000 - $50000 </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-6">
                            <div class="text-sm-center m-14">
                                <h5 class="text-dark mb-2">Followers</h5>
                                <p class="text-muted mb-0">5584230 +</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <h4>Company Overview </h4>
                <div class="rounded border p-4 mt-3 text-muted">
                    {{$Company->description}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <h4 class="">Services </h4>
                <div class="rounded border p-4 mt-3">
                   

                        @foreach($Company->services as $service)
                        <p class="text-muted"><i class="mdi mdi-check text-success mr-4"></i>{{$service}}</p>
                        @endforeach

                    
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <h4>Company Review :</h4>
            </div>

            <div class="col-lg-8 col-md-7">
                <div class="shadow rounded p-4 mt-4">
                    <img src="images/employers/img-1.jpg" alt="" height="90"
                         class="float-left shadow rounded-pill mr-3">
                    <div class="d-block overflow-hidden">
                        <h6 class="text-muted font-weight-light float-right mb-0"><i
                                class="mdi mdi-clock-outline mr-1"></i>32 minutes ago</h6>
                        <h5 class="mb-1"><a href="#" class="text-dark">Mario Thomas</a></h5>
                        <small class="text-muted font-weight-bold">Web Developer</small>
                        <ul class="employers-icons list-inline mb-1">
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                        </ul>
                        <p class="text-muted mb-0">Phasellus viverra nulla ut metus varius laoreet quisque rutrum aenean
                            imperdiet etiam ultricies nisi avel augue curabitur ullamcorper ultricies nisi nam eget
                            dui.</p>
                    </div>
                </div>

                <div class="shadow rounded p-4 mt-4">
                    <img src="images/employers/img-2.jpg" alt="" height="90"
                         class="float-left shadow rounded-pill mr-3">
                    <div class="d-block overflow-hidden">
                        <h6 class="text-muted font-weight-light float-right mb-0"><i
                                class="mdi mdi-clock-outline mr-1"></i>49 minutes ago</h6>
                        <h5 class="mb-1"><a href="#" class="text-dark">Mario Thomas</a></h5>
                        <small class="text-muted font-weight-bold">Web Developer</small>
                        <ul class="employers-icons list-inline mb-1">
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                        </ul>
                        <p class="text-muted mb-0">Phasellus viverra nulla ut metus varius laoreet quisque rutrum aenean
                            imperdiet etiam ultricies nisi avel augue curabitur ullamcorper ultricies nisi nam eget
                            dui.</p>
                    </div>
                </div>

                <div class="shadow rounded p-4 mt-4">
                    <img src="images/employers/img-3.jpg" alt="" height="90"
                         class="float-left shadow rounded-pill mr-3">
                    <div class="d-block overflow-hidden">
                        <h6 class="text-muted font-weight-light float-right mb-0"><i
                                class="mdi mdi-clock-outline mr-1"></i>1 Days Ago</h6>
                        <h5 class="mb-1"><a href="#" class="text-dark">Mario Thomas</a></h5>
                        <small class="text-muted font-weight-bold">Web Developer</small>
                        <ul class="employers-icons list-inline mb-1">
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                        </ul>
                        <p class="text-muted mb-0">Phasellus viverra nulla ut metus varius laoreet quisque rutrum aenean
                            imperdiet etiam ultricies nisi avel augue curabitur ullamcorper ultricies nisi nam eget
                            dui.</p>
                    </div>
                </div>

                <div class="shadow rounded p-4 mt-4">
                    <img src="images/employers/img-4.jpg" alt="" height="90"
                         class="float-left shadow rounded-pill mr-3">
                    <div class="d-block overflow-hidden">
                        <h6 class="text-muted font-weight-light float-right mb-0"><i
                                class="mdi mdi-clock-outline mr-1"></i>3 Day Ago</h6>
                        <h5 class="mb-1"><a href="#" class="text-dark">Mario Thomas</a></h5>
                        <small class="text-muted font-weight-bold">Web Developer</small>
                        <ul class="employers-icons list-inline mb-1">
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item mr-0 text-success"><i class="mdi mdi-star"></i></li>
                        </ul>
                        <p class="text-muted mb-0">Phasellus viverra nulla ut metus varius laoreet quisque rutrum aenean
                            imperdiet etiam ultricies nisi avel augue curabitur ullamcorper ultricies nisi nam eget
                            dui.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 mt-4">
                <div class="p-4 rounded text-center shadow">
                    <h5 class="text-dark">Share This Job</h5>
                    <ul class="social-icon social list-unstyled mb-0">
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-google-plus"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-linkedin"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-pinterest"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-instagram"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i
                                class="mdi mdi-share-variant"></i></a></li>
                    </ul>

                    <div class="map mt-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6030.418742494061!2d-111.34563870463673!3d26.01036670629853!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1471908546569"
                                class="rounded" style="border: 0" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
<!-- EMPLOYERS DETAILS END -->

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