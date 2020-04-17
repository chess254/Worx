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
                    <h4 class="text-uppercase title mb-4">{{$profile->user->name}}'s Profile</h4>
                    <ul class="page-next d-inline-block mb-0">
                        <li><a href="index.html" class="text-uppercase font-weight-bold">Home</a></li>
                        <li><a href="#" class="text-uppercase font-weight-bold">Pages</a></li>
                        <li><a href="#" class="text-uppercase font-weight-bold">Candidates</a></li>
                        <li>
                            <span class="text-uppercase text-white font-weight-bold">Candidates Profile</span>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-lg-12">
                          
                            <div class="job-list-desc candidates-profile-exp-desc">

                                {{-- @foreach($profile->skills as $skill) --}}
                                <h6 class="f-19 mb-2">@foreach($profile->skills as $skill)<span class="badge badge-success" style="padding: 10px; margin: 5px;">{{$skill}}</span>@endforeach</h6>
                                {{-- @endforeach --}}
                                {{-- <p class="text-muted mb-0 f-16">PHP Developer</p>
                                <p class="text-muted mb-0 f-16">Jan 2016 - Dec 2017</p>
                                <p class="text-muted mb-0 f-16">Salary : $950</p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-bank mr-2"></i>www.blog.helpyea.com
                                </p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-map-marker mr-2"></i>1919 Ward Road
                                    West Nyack, NY 10994</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->

<!-- CANDIDATES PROFILE START -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="candidates-profile-details text-center">
                    <img src="images/employers/img-1.jpg" height="150" alt=""
                         class="d-block mx-auto shadow rounded-pill mb-4">
                <h5 class="text-dark mb-2">{{$profile->user->name}} {{$profile->user->second_name}}</h5>
                    {{-- <p class="text-dark h6 mb-2"><i class="mdi mdi-bank mr-2"></i>Maida Themes Pvt LTD</p> --}}
                    <p class="text-dark h6 mb-2">{{$profile->title}}</p>
                    <ul class="candidates-profile-icons list-inline mb-3">
                        <li class="list-inline-item"><a href="#" class="text-dark"><i class="mdi mdi-star"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="text-dark"><i class="mdi mdi-star"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="text-dark"><i class="mdi mdi-star"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="text-dark"><i class="mdi mdi-star"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="text-dark"><i class="mdi mdi-star"></i></a>
                        </li>
                    </ul>

                    <div class="row">
                        <div class="col-lg-12">
                          
                            <div class="job-list-desc candidates-profile-exp-desc">

                                {{-- @foreach($profile->skills as $skill) --}}
                                <h6 class="f-19 mb-2">@foreach($profile->skills as $skill)<span class="badge badge-success" style="padding: 10px; margin: 5px;">{{$skill}}</span>@endforeach</h6>
                                {{-- @endforeach --}}
                                {{-- <p class="text-muted mb-0 f-16">PHP Developer</p>
                                <p class="text-muted mb-0 f-16">Jan 2016 - Dec 2017</p>
                                <p class="text-muted mb-0 f-16">Salary : $950</p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-bank mr-2"></i>www.blog.helpyea.com
                                </p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-map-marker mr-2"></i>1919 Ward Road
                                    West Nyack, NY 10994</p> --}}
                            </div>
                        </div>
                    </div>

                    <ul class="list-unstyled social-icon social mb-0">
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-instagram"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-google-plus"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        {{-- <div class="row">
            <div class="col-lg-12">
                <h4 class="text-dark">About Us :</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="border rounded p-4">
                    <p class="text-muted">Aliquam erat volutpat Etiam vitae tortor Morbi vestibulum volutpat enim
                        Aliquam nunc Nunc sed turpis sed mollis eros et ultrices tempus mauris ipsum aliquam libero non
                        adipiscing dolor urna a orci Nulla porta dolor. Class aptent taciti sociosqu ad litora torquent
                        per conubia nostra inceptos hymenaeos pellentesque dapibus hendrerit tortor Praesent egestas
                        tristique nibh sed a libero cras us varius donec vitae orci sed dolor rutrum auctor fusce
                        egestas elit eget lorem.</p>

                    <p class="text-muted">Libero venenatis faucibus ullam quis ante tiam sit amet orci eget eros
                        faucibus tincidunt ed fringilla mauris sit amet nibh Donec sodales sagittis magna ed consequat
                        leo eget bibendum sodales augue velit cursus nunc quis gravida magna mi libero usce vulputate
                        eleifend sapien estibulum purus qua scelerisque ut mollis sed nonummy id metus ullam accumsan
                        lorem Vivamus elementum semper enean vulputate eleifend tellus enean leo ligula porttitor.</p>

                    <ul class="list-inline pt-3 border-top mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-map-marker mr-2"></i>3659 Peter
                                king Manhattan, NY 10016</a>
                        </li>

                        <li class="list-inline-item mr-3">
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-web mr-2"></i>www.blog.helpyea.com</a>
                        </li>

                        <li class="list-inline-item mr-3">
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-email mr-2"></i>maidathemes@gmail.com</a>
                        </li>

                        <li class="list-inline-item mr-3">
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-cellphone-iphone mr-2"></i>123
                                456 7890</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <h4 class="text-dark">Bio :</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="border rounded p-4">
                    <div class="job-detail-desc" id="bio">
                        <p class="text-muted f-14 mb-3">{{$profile->bio}}</p>
                    </div>
                    <ul class="list-inline pt-3 border-top mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-map-marker mr-2"></i>3659 Peter
                                king Manhattan, NY 10016</a>
                        </li>

                        <li class="list-inline-item mr-3">
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-web mr-2"></i>www.{{$profile->user->name}}-{{$profile->user->second_name}}.com</a>
                        </li>

                        <li class="list-inline-item mr-3">
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-email mr-2"></i>{{$profile->user->email}}</a>
                        </li>

                        <li class="list-inline-item mr-3">
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-cellphone-iphone mr-2"></i>{{$profile->user->contact_number}}</a>
                        </li>
                    </ul>
                    @if(auth()->check() && $profile->user_id == auth()->user()->id)
                        <div style="padding-top: 10px; align: center;">
                            <button class="btn btn-light-outline btn-sm" data-toggle="modal" data-target="#bioModal"> <i class="mdi mdi-pencil" style="color: orange;"></i> </button>
                        </div>
                    @endif
                </div>


                <!-- Modals -->
                @if(auth()->check())
                <div class="modal fade" id="bioModal" tabindex="-1" role="dialog" aria-labelledby="bioModalLabel" aria-hidden="true">
                        
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-light">edit bio</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <form action="{{auth()->user()->id}}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="md-form">
                                    {{-- <i class="fas fa-lock prefix grey-text"></i> --}}
                                    <textarea name="edit_bio" id="edit_bio" class="form-control validate">{{$profile->bio}}</textarea>
                                    {{-- <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label> --}}
                                    </div>

                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-success-outline btn-sm" type="submit" id="update_bio ">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="row" id="rowED">
            <div class="col-lg-12 mt-4 pt-2">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="text-dark">Education :</h4>
                    @if(auth()->check() && ($profile->user_id == auth()->user()->id))
                        <button class="btn btn-sm btn-info"  data-toggle="modal" data-target="#addEducModal">Add entry</button>
                    @endif
                </div>
                
            </div>
        </div>

        {{-- add education entry modal --}}
        <div class="modal fade" id="addEducModal" tabindex="-1" role="dialog" aria-labelledby="addEducModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel">Add Education Entry</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{auth()->user()->id}}" method="post">
                    @csrf
                  <div class="modal-body">
                    <div class="form-group">   
                        <label for="add_institute">Institute</label><br />
                        <input type="text" class="form-control" name="add_institute" id="add_institute" >
                    </div>
                    
                    <div class="form-group">
                        <label for="add_course">Course</label><br />
                        <input type="text" class="form-control" name="add_course" id="add_course" >
                       </div>
                   <div class="form-group"> 
                       <label for="add_certificate">Certificate</label>
                   <input type="text" class="form-control" name="add_certificate" id="add_certificate" >
                   </div>
                   <div class="form-group">
                       <label for="add_from_date">From</label><br />
                       <input type="date" class="form-control" name="add_from_date" id="add_from_date" >
                   </div>
                   <div class="form-group"> 
                       <label for="add_to_date">To:</label><br />
                       <input type="date" class="form-control" name="add_to_date" id="add_to_date" >
                   </div>
                  <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Add</button>
                  </div>
                  </div>
                </form>
              </div>
            </div>
        </div>

        <div class="row">
            @foreach($profile->educationDetails as $education)
            <div class="col-lg-4 col-md-6 mt-4 pt-5 detailCard">
                <div class="border rounded candidates-profile-education text-center text-muted">
                    <div class="profile-education-icon border rounded-pill bg-white text-primary">
                        <i class="mdi mdi-36px mdi-school"></i>
                    </div>
                    <h6 class="text-uppercase f-17"><a href="#" class="text-muted">{{$education->institute}}</a></h6>
                    <p class="f-14 mb-1">{{$education->starting_date}} - {{$education->completion_date}}</p>
                    <p class="pb-3 mb-0">{{$education->certificate}}</p>
                    <p class="pb-3 mb-0">{{$education->course}}</p>
                    {{-- {{$education->id}} --}}


                    

                    @if( auth()->check() && ($profile->user_id == auth()->user()->id) ) 
                        <div id="editEducCard" class="pt-0  d-flex" style="justify-content: space-around;">
                        {{-- <div  style=""> --}}
                                <button   class="btn btn-light-outline btn-sm" data-toggle="modal" data-target="#eduModal" name="id" data-institute="{{$education->institute}}" data-course="{{$education->course}}" data-fromdate="{{$education->starting_date}}" data-todate="{{$education->completion_date}}"  data-certificate="{{$education->certificate}}" data-educid="{{$education->id}}" > <i class="mdi mdi-pencil" style="color: orange;"></i> </button>
                            
                            
                                <button  class="btn btn-light-outline btn-sm" data-toggle="modal" data-target="#eduModal">  <i class="mdi mdi-delete" style="color: red;"></i></button>
                        
                        {{-- </div> --}}
                    </div>
                    @endif

                    {{-- <p class="pt-3 border-top mb-0">Suspendisse faucibus et pellentesque egestas lacus ante
                        convallis.</p> --}}
                </div>
            </div>
            @endforeach


            <div class="modal fade" id="eduModal" tabindex="-1" role="dialog" aria-labelledby="eduModalLabel" aria-hidden="true">
                        
                <div class="modal-dialog modal-dialog-centered"role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title">edit education entry</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        @if(auth()->check())
                    <form action="{{auth()->user()->id}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">   
                                     <label for="edit_institute">Institute</label><br />
                                     <input type="text" class="form-control" name="edit_institute" id="edit_institute" >
                                 </div>
                                 
                                 <div class="form-group">
                                     <label for="edit_course">Course</label><br />
                                     <input type="text" class="form-control" name="edit_course" id="edit_course" >
                                    </div>
                                <div class="form-group"> 
                                    <label for="edit_certificate">Certificate</label>
                                <input type="text" class="form-control" name="edit_certificate" id="edit_certificate" >
                                </div>
                                <div class="form-group">
                                    <label for="edit_from_date">From</label><br />
                                    <input type="date" class="form-control" name="edit_from_date" id="edit_from_date" >
                                </div>
                                <div class="form-group"> 
                                    <label for="edit_to_date">To:</label><br />
                                    <input type="date" class="form-control" name="edit_to_date" id="edit_to_date" >
                                </div>

                                <input type="hidden" name="educationDetails_id" id="educationDetails_id">
                               
                                

                                

                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-success-outline btn-sm" type="submit" id="update_bio" data-target="" >Update</button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        
        <div class="row" id="rowEXP">
            <div class="col-lg-12 mt-4 pt-2">
                
            <div style="display: flex; justify-content: space-between;">
            <h4 class="text-dark">Experience :</h4>
            @if(auth()->check() && ($profile->user_id == auth()->user()->id))
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#addExpModal">Add entry</button>
            @endif
        </div>
            </div>
        </div>

         {{-- add experience entry modal --}}
         <div class="modal fade" id="addExpModal" tabindex="-1" role="dialog" aria-labelledby="addExpModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel">Add Experience Entry</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{auth()->user()->id}}" method="post">
                    @csrf
                  <div class="modal-body">
                    <div class="form-group"> 
                        <label for="add_company">Company</label>
                    <input type="text" class="form-control"  name="add_company_name" id="add_company_name" >
                    </div>
                   <div class="form-group">   
                        <label for="add_job_title">Job Title</label>
                        <input type="text" class="form-control"  name="add_job_title" id="add_job_title" >
                    </div>
                    <div class="form-group">
                        <label for="add_job_city">Website</label>
                        <input type="text" class="form-control"  name="add_website" id="add_website" >
                    </div>
                    <div class="form-group">
                        <label for="add_job_city">City</label>
                        <input type="text" class="form-control"  name="add_job_city" id="add_job_city" >
                    </div>
                    <div class="form-group">
                        <label for="add_job_county">County</label>
                        <input type="text" class="form-control"  name="add_job_county" id="add_job_county" >
                    </div>
                    <div class="form-group">
                        <label for="add_job_country">Country</label>
                        <input type="text" class="form-control"  name="add_job_country" id="add_job_country" >
                    </div>
                    <div class="form-group">
                        <label for="add_start_date">Start Date</label>
                        <input type="date" class="form-control" name="add_start_date" id="add_start_date" >
                    </div>
                    <div class="form-group"> 
                        <label for="add_end_date">End Date</label>
                        <input type="date" class="form-control" name="add_end_date" id="add_end_date" >
                    </div>
                  <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Add</button>
                  </div>
                  </div>
                </form>
              </div>
            </div>
        </div>

        

        <div class="row">

            @foreach($profile->experienceDetails as $experience)
            <div class="col-md-6 mt-3 mt-md-0 pt-3">
                <div class="border rounded job-list-box p-4">
                    <div class="row">
                        {{-- <div class="col-lg-3">
                            <div class="company-brand-logo text-center mb-4">
                                <img src="images/featured-job/img-2.png" alt="" class="img-fluid mx-auto d-block">
                            </div>
                        </div> --}}

                        <div class="col-lg-12">
                            <div class="job-list-desc candidates-profile-exp-desc">
                                <h5 class="f-19 mb-2"><a href="#" class="text-dark">{{$experience->company_name}}</a></h5>
                                <p class="text-muted mb-0 f-16">{{$experience->job_title}}</p>
                                <p class="text-muted mb-0 f-16">{{$experience->start_date}} - {{$experience->end_date}}</p>
                                <br>
                                {{-- <p class="text-muted mb-0 f-16">Salary : $950</p> --}}
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-bank mr-2"></i>{{$experience->website}}
                                </p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-map-marker mr-2"></i>{{$experience->job_location_city}}, {{$experience->job_location_county}}, {{$experience->job_location_country}}
                            
                                </p> 
                                {{-- <br> {{$experience->id}} --}}

                                @if( auth()->check() && ($profile->user_id == auth()->user()->id) ) 
                                    <div class="pt-2 border-top d-flex" style="justify-content: space-around;">
                                    <button  class="btn btn-light-outline btn-sm" data-toggle="modal" data-target="#expModal" name="id" data-company_name="{{$experience->company_name}}" data-job_title="{{$experience->job_title}}" data-start_date="{{$experience->start_date}}" data-end_date="{{$experience->end_date}}"  data-website="{{$experience->website}}" data-city="{{$experience->job_location_city}}" data-county="{{$experience->job_location_county}}" data-country="{{$experience->job_location_country}}" data-expid="{{$experience->id}}" > <i class="mdi mdi-pencil" style="color: orange;"></i> </button>
                                        
                                        
                                            <button  class="btn btn-light-outline btn-sm" data-toggle="modal" data-target="#expModal">  <i class="mdi mdi-delete" style="color: red;"></i></button>
                                    
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="modal fade" id="expModal" tabindex="-1" role="dialog" aria-labelledby="expModalLabel" aria-hidden="true">
                        
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h4 class="modal-title">edit experience entry</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        @if(auth()->check())
                    <form action="{{auth()->user()->id}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group"> 
                                    <label for="edit_company">Company</label><br />
                                <input type="text" class="form-control"  name="edit_company_name" id="edit_company_name" >
                                </div>
                               <div class="form-group">   
                                    <label for="edit_job_title">Job Title</label><br />
                                    <input type="text" class="form-control"  name="edit_job_title" id="edit_job_title" >
                                </div>
                                <div class="form-group">
                                    <label for="edit_job_city">Website</label><br />
                                    <input type="text" class="form-control"  name="edit_website" id="edit_website" >
                                </div>
                                <div class="form-group">
                                    <label for="edit_job_city">City</label><br />
                                    <input type="text" class="form-control"  name="edit_job_city" id="edit_job_city" >
                                </div>
                                <div class="form-group">
                                    <label for="edit_job_county">County</label><br />
                                    <input type="text" class="form-control"  name="edit_job_county" id="edit_job_county" >
                                </div>
                                <div class="form-group">
                                    <label for="edit_job_country">Country</label><br />
                                    <input type="text" class="form-control"  name="edit_job_country" id="edit_job_country" >
                                </div>
                                <div class="form-group">
                                    <label for="edit_start_date">Start Date</label><br />
                                    <input type="date" class="form-control" name="edit_start_date" id="edit_start_date" >
                                </div>
                                <div class="form-group"> 
                                    <label for="edit_end_date">End Date</label><br />
                                    <input type="date" class="form-control" name="edit_end_date" id="edit_end_date" >
                                </div>

                                <input type="hidden" name="experienceDetails_id" id="experienceDetails_id">
                               
                                

                                

                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-success-outline btn-sm" type="submit" id="update_bio" data-target="" >Update</button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-6 mt-3 mt-md-0 pt-3">
                <div class="border rounded job-list-box p-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="company-brand-logo text-center mb-4">
                                <img src="images/featured-job/img-3.png" alt="" class="img-fluid mx-auto d-block">
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="job-list-desc candidates-profile-exp-desc">
                                <h5 class="f-19 mb-2"><a href="#" class="text-dark">Peter Code Pvt.Ltd</a></h5>
                                <p class="text-muted mb-0 f-16">Web Developer</p>
                                <p class="text-muted mb-0 f-16">Fab 2015 - July 2018</p>
                                <p class="text-muted mb-0 f-16">Salary : $1100</p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-bank mr-2"></i>www.helpyea.com</p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-map-marker mr-2"></i>519 Leo Street
                                    Butler, PA 16001</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        {{-- <div class="row">
            <div class="col-md-6 mt-3 mt-md-0 pt-3">
                <div class="border rounded job-list-box p-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="company-brand-logo text-center mb-4">
                                <img src="images/featured-job/img-5.png" alt="" class="img-fluid mx-auto d-block">
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="job-list-desc candidates-profile-exp-desc">
                                <h5 class="f-19 mb-2"><a href="#" class="text-dark">Nokia Pvt.Ltd</a></h5>
                                <p class="text-muted mb-0 f-16">PHP Developer</p>
                                <p class="text-muted mb-0 f-16">Jan 2016 - Dec 2017</p>
                                <p class="text-muted mb-0 f-16">Salary : $1000</p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-bank mr-2"></i>www.helpyea.com</p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-map-marker mr-2"></i>519 Leo Street
                                    Butler, PA 16001</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3 mt-md-0 pt-3">
                <div class="border rounded job-list-box p-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="company-brand-logo text-center mb-4">
                                <img src="images/featured-job/img-7.png" alt="" class="img-fluid mx-auto d-block">
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="job-list-desc candidates-profile-exp-desc">
                                <h5 class="f-19 mb-2"><a href="#" class="text-dark">Minor wave Pvt.Ltd</a></h5>
                                <p class="text-muted mb-0 f-16">PHP Developer</p>
                                <p class="text-muted mb-0 f-16">Jan 2016 - Dec 2017</p>
                                <p class="text-muted mb-0 f-16">Salary : $900</p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-bank mr-2"></i>www.helpyea.com</p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-map-marker mr-2"></i>519 Leo Street
                                    Butler, PA 16001</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="text-dark">Skills :</h4>
                    @if(auth()->check() && ($profile->user_id == auth()->user()->id))
                        <button class="btn btn-sm btn-info">Edit</button>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
           
            <div class="col-md-12 mt-3 mt-md-0 pt-3">
                <div class="border rounded job-list-box p-4">
                    <div class="row">
                        <div class="col-lg-12">
                          
                            <div class="job-list-desc candidates-profile-exp-desc">

                                {{-- @foreach($profile->skills as $skill) --}}
                                <div class="f-19 mb-2">
                                    @foreach($profile->skills as $skill)
                                        <button class="btn btn-primary-outline rounded-pill btn-sm" style="margin:3px;">{{$skill}}</button>
                                    @endforeach</div>
                                {{-- @endforeach --}}
                                {{-- <p class="text-muted mb-0 f-16">PHP Developer</p>
                                <p class="text-muted mb-0 f-16">Jan 2016 - Dec 2017</p>
                                <p class="text-muted mb-0 f-16">Salary : $950</p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-bank mr-2"></i>www.blog.helpyea.com
                                </p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-map-marker mr-2"></i>1919 Ward Road
                                    West Nyack, NY 10994</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{-- 
            <div class="col-md-12 mt-4 pt-2">
                <h6 class="mb-0 text-uppercase">Coding Expertise :</h6>
                <div class="progress-box mt-4">
                    <h6 class="title text-muted">WordPress</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped position-relative bg-primary" style="width:84%;">
                            <div class="progress-value d-block text-muted h6">84%</div>
                        </div>
                    </div>
                </div><!--end process box-->
                <div class="progress-box mt-4">
                    <h6 class="title text-muted">PHP / MYSQL</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped position-relative bg-primary" style="width:75%;">
                            <div class="progress-value d-block text-muted h6">75%</div>
                        </div>
                    </div>
                </div><!--end process box-->
                <div class="progress-box mt-4">
                    <h6 class="title text-muted">Angular / JavaScript</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped position-relative bg-primary" style="width:79%;">
                            <div class="progress-value d-block text-muted h6">79%</div>
                        </div>
                    </div>
                </div><!--end process box-->
                <div class="progress-box mt-4">
                    <h6 class="title text-muted">HTML / CSS</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped position-relative bg-primary" style="width:95%;">
                            <div class="progress-value d-block text-muted h6">95%</div>
                        </div>
                    </div>
                </div><!--end process box-->
            </div> --}}
        </div>
    </div>
</section>
<!-- CANDIDATES PROFILE END -->

<!-- subscribe start -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="float-left position-relative notification-icon mr-2">
                    <i class="mdi mdi-bell-outline text-primary"></i>
                    <span class="badge badge-pill badge-danger">1</span>
                </div>
                <h6 class="mt-2 mb-0">Subscribe To Job Notification</h5>
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
