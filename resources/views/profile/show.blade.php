@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>

      tinymce.init({
          selector: 'textarea',
          plugins: 'lineheight lists',
          menubar: false,
          branding: false,
          toolbar: true,
          toolbar: 'lineheightselect numlist bullist undo redo | styleselect | bold italic | link image' ,
          lineheight_formats: "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 36pt", 
          statusbar : false,
          // toolbar_sticky: true,
          
          
          
      });
    </script>
@endsection

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
                                {{-- <h6 class="f-19 mb-2">@foreach($profile->skills as $skill)<span class="badge badge-success" style="padding: 10px; margin: 5px;">{{$skill}}</span>@endforeach</h6> --}}
                            <p class="text-dark">{{$profile->highest_qualification}}</p>
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
<section class="section" id="summary">
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-md-6">
                <div class="candidates-profile-details text-center">
                <img src="{{$profile->getProfilePic()}}" height="250" alt="{{$profile->user->name}} {{$profile->user->second_name}}"
                         class="d-block mx-auto shadow rounded mb-2">
                <h2 class="text-dark display-4 ">{{$profile->user->name}} {{$profile->user->second_name}}</h2>
                    {{-- <p class="text-dark h6 mb-2"><i class="mdi mdi-bank mr-2"></i>Maida Themes Pvt LTD</p> --}}
                    <p class="text-muted h3 mb-1">{{$profile->title}}</p>
                    <ul class="candidates-profile-icons list-inline mb-1">
                        <small><li class="list-inline-item"><a href="#" class="text-dark"><i class="mdi mdi-star"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="text-dark"><i class="mdi mdi-star"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="text-dark"><i class="mdi mdi-star"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="text-dark"><i class="mdi mdi-star"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="text-dark"><i class="mdi mdi-star"></i></a>
                        </li></small>
                    </ul>
                    <label class="text-dark"> <span><i class="mdi mdi-school mr-1"></i></span> {{$profile->highest_qualification}}

                    
                    </label>@if(auth()->check() && $profile->user_id == auth()->user()->id)
                        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#highestQualificationModal"> <i class="mdi mdi-pencil" style="color:orange;"></i> </button>
                    
                @endif

                                <!-- Modals edit highest qualification -->
                                @if(auth()->check())
                                <div class="modal fade" id="highestQualificationModal" tabindex="-1" role="dialog" aria-labelledby="highestQualificationModal" aria-hidden="true">
                                        
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title w-100 font-weight-light">Edit Highest Qualification</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <form action="{{auth()->user()->id}}" method="post">
                                                @csrf
                                                <div class="modal-body d-flex" style="justify-content: space-around;">
                                                   
                                                    
                                                    
                                                           
                                                        <table style="">
                                                            <tr>
                                                                <td><input type="radio" name="highest_qualification" value="High School"></td><td class="ml-4" style="float:left;"> High School</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="radio" name="highest_qualification" value="Certificate"></td><td class="ml-4" style="float:left;"> Certificate</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="radio" name="highest_qualification" value="Diploma"></td><td class="ml-4" style="float:left;"> Diploma</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="radio" name="highest_qualification" value="Degree"></td><td class="ml-4" style="float:left;"> Degree</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="radio" name="highest_qualification" value="Post Graduate Diploma"></td><td class="ml-4" style="float:left;"> Post-graduate Diploma</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="radio" name="highest_qualification" value="Masters"></td><td class="ml-4" style="float:left;"> masters</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="radio" name="highest_qualification" value="PhD"></td><td class="ml-4" style="float:left;"> PhD</td>
                                                            </tr>
                                                        </table>
                                                       
                                                    
                
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button class="btn btn-success-outline btn-sm" type="submit" id="update_highest_qualification ">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif

                    <div class="row">
                        <div class="col-lg-12">
                          
                            <div class="job-list-desc candidates-profile-exp-desc">
                                {{-- <h6 class="f-19 mb-1">@foreach($profile->skills as $skill)<span class="badge badge-success badge-sm" style="padding: 10px; margin: 5px;">{{$skill}}</span>@endforeach</h6>                               --}}
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
     

    {{-- only show dropzone add image box if user is viewing their own profile --}}
        @if(auth()->check() && $profile->user_id == auth()->user()->id)
        <form action="#" method="post" id="attachFiles">


            <div class="form-group">
                <label for="document">Picture</label>
                <div class="needsclick dropzone" id="document-dropzone" name="pic">
        
                </div>
            </div>
            
            @csrf
            <input type="hidden">
            <button class="btn btn-primary btn-block btn-sm mb-4"type="submit"> <i class="mdi mdi-send mr-2"style="color:white;"></i> submit pic</button> 
        </form>      
        @endif

        <div class="row">
            <div class="col-lg-12 mt-4 pt-2 d-flex" style="justify-content: center;">
                <h2 class="text-dark">Bio </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="border rounded p-4">
                    <div class="job-detail-desc" id="bio">
                        <p class="text-muted f-14 mb-3" style="padding-top: 8px; margin-bottom:40px;">{!!$profile->bio!!}</p>
                    </div>
                    <ul class="list-inline pt-4 border-top mb-0 text-center " style="">
                        <li class="list-inline-item mr-3">
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-map-marker mr-2"></i>{{$profile->user->city}}, {{$profile->user->county->county_name}}, {{$profile->user->country}}</a>
                        </li>

                        <li class="list-inline-item mr-3">
                            {{-- <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-web mr-2"></i>www.{{$profile->user->name}}-{{$profile->user->second_name}}.com</a> --}}
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-web mr-2"></i>{{$profile->user->website}}</a>

                        </li>

                        <li class="list-inline-item mr-3">
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-email mr-2"></i>{{$profile->user->email}}</a>
                        </li>

                        <li class="list-inline-item mr-3">
                            <a href="#" class="text-muted f-15 mb-0"><i class="mdi mdi-cellphone-iphone mr-2"></i>{{$profile->user->phone}}</a>
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
                                    <textarea name="edit_bio" id="edit_bio" class="form-control validate" cols="100" rows="10" >{{$profile->bio}}</textarea>
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

                <!-- edit Bio Modal -->
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
                    <h2 class="text-dark">Education </h2>
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
                <form action="{{auth()->user()->id ?? ""}}" method="post">
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

     

        <div class="row d-flex" style="justify-content:center;">
          {{-- {{dd($profile->educationDetails)}} --}}
            @foreach($profile->educationDetails as $education)
            <div class="col-lg-4 col-md-6 mt-4 pt-5 detailCard">
                <div class="border rounded candidates-profile-education text-center text-muted">
                    <div class="profile-education-icon border rounded-pill bg-white text-primary">
                        <i class="mdi mdi-36px mdi-school"></i>
                    </div>
                    <h6 class="text-uppercase f-17"><a href="#" class="text-dark">{{$education->institute}}</a></h6>
                    <p class="f-14 mb-1"><small>{{date_format($education->starting_date, 'M Y')}} - {{ date_format($education->completion_date,'M Y')}} </small></p>
                    <p class="pb-3 mb-0">{{$education->certificate}}</p>
                    <p class="pb-3 mb-0 text-dark">{{$education->course}}</p>
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
            <h2 class="text-dark">Experience </h2>
            @if(auth()->check() && ($profile->user_id == auth()->user()->id))
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#addExpModal">Add entry</button>
            @endif
        </div>
            </div>
        </div>

         {{-- add experience entry modal --}}
         @if(auth()->check())
         <div class="modal fade" id="addExpModal" tabindex="-1" role="dialog" aria-labelledby="addExpModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel">Add Experience Entry</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                

                <form  action="{{auth()->user()->id}}"method="post" id="addExperienceEntryForm">
                    @csrf
                  <div class="modal-body">
                    <div class="form-group has-feedback"> 
                        <label for="add_company">Company</label>
                        <input value="{{old('add_company_name')}}" type="text" class="form-control"  name="add_company_name" id="add_company_name" required="true" >
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                    </div>
                   <div class="form-group has-feedback">   
                        <label for="add_job_title">Job Title</label>
                        <input value="{{old('add_job_title')}}" type="text" class="form-control" required="true"  name="add_job_title" id="add_job_title" >
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                    <div class="form-group has-feedback">
                        <label for="add_job_city">Website</label>
                        <input value="{{old('add_website')}}" type="text" class="form-control" required="true"  name="add_website" id="add_website" >
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                    <div class="form-group has-feedback">
                        <label for="add_job_city">City</label>
                        <input value="{{old('add_job_city')}}" type="text" class="form-control" required="true"  name="add_job_city" id="add_job_city" >
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                    <div class="form-group has-feedback">
                        <label for="add_job_county">County</label>
                        <input value="{{old('add_job_county')}}" type="text" class="form-control" required="true"  name="add_job_county" id="add_job_county" >
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                    <div class="form-group has-feedback">
                        <label for="add_job_country">Country</label>
                        <input value="{{old('add_job_country')}}" type="text" class="form-control" required="true"  name="add_job_country"= id="add_job_country" >
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                    <div class="form-group has-feedback">
                        <label for="add_start_date">Start Date</label>
                        <input value="{{old('add_start_date')}}" type="date" class="form-control" required="true" name="add_start_date" id="add_start_date" >
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                    <div class="form-group has-feedback"> 
                        <label for="add_end_date">End Date</label>
                        <input value="{{old('add_end_date')}}" type="date" class="form-control" required="true" name="add_end_date" id="add_end_date" >
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                  <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Add</button>

                    {{-- <button type="button" id="submitAddExperienceEntry" class="btn btn-success">Add</button> --}}
                  </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
        @endif
        

        

        <div class="row d-flex" style="justify-content:center;">

            @foreach($profile->experienceDetails as $experience)
            <div class="col-md-6 mt-3 mt-md-0 pt-3">
                <div class="border rounded job-list-box p-4">
                    <div class="row">
                        {{-- <div class="col-lg-3">
                            <div class="company-brand-logo text-center mb-4">
                                <img src="images/featured-job/img-2.png" alt="" class="img-fluid mx-auto d-block">
                            </div>
                        </div> --}}

                        <div class="col-lg-12 detailCard">
                            <div class="job-list-desc candidates-profile-exp-desc ">
                                <h5 class="f-19 mb-2"><a href="#" class="text-dark">{{$experience->company_name}}</a></h5>
                                <p class="text-dark mb-0 f-16">{{$experience->job_title}}</p>
                                <p class="text-muted mb-0 f-16" style=""><small>{{date_format($experience->start_date,'M Y')}} - {{date_format($experience->end_date,'M Y')}}</small></p>
                                <br>
                                {{-- <p class="text-muted mb-0 f-16">Salary : $950</p> --}}
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-bank mr-2"></i><small>{{$experience->website}}</small>
                                </p>
                                <p class="text-muted mb-0 f-16"><i class="mdi mdi-map-marker mr-2"></i><small>{{$experience->job_location_city}}, {{$experience->job_location_county}}, {{$experience->job_location_country}}</small>
                            
                                </p> 
                                {{-- <br> {{$experience->id}} --}}

                                @if( auth()->check() && ($profile->user_id == auth()->user()->id) ) 
                                    <div id="editExpCard" class="pt-0 d-flex" style="justify-content: space-around;">
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
                    <h2 class="text-dark">Skills </h2>
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

                                    <div class="f-19 mb-2 d-flex"  style="justify-content: center;">
                                        {{-- @foreach($profile->skills as $skill)
                                            <button class="btn btn-secondary-outline rounded-pill btn-sm" style="margin:3px;">{{$skill}}</button>
                                        @endforeach</div> 
                                 --}}
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{-- 
            <div class="col-md-12 mt-4 pt-2">
                <h6 class="mb-0 text-uppercase">Coding Expertise </h3>
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
