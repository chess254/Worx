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
<!-- HOME -->
<section class="bg-quarter page-next-level">
  <div class="bg-overlay"></div>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="text-center text-white">
                  {{-- flash message here on successful aplication --}}
                  @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                  </div>
                  @endif
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

  
  <section class="site-section">
    <div class="container mt-100">

       <div class="row align-items-center mb-5">
        <div class="col-lg-12 mb-4 mb-lg-0">
          <div class="d-flex " style=" justify-content: space-around;">
            <div>
              <h2>Post A Job</h2>
            </div>
          </div>
        </div> 
        {{-- <div class="col-lg-4">
          <div class="row">
            <div class="col-6">
              <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-open_in_new mr-2"></span>Preview</a>
            </div>
            <div class="col-6">
              <a href="#" class="btn btn-block btn-primary btn-md">Save Job</a>
            </div>
          </div>
        </div> --}}
      </div> 
      <div class="row mb-5">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="/job" method="post">
            @csrf
            <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>

            
            <div class="row"> 
              <div class="col-md-6 form-group">
                <p for="title">Job Title</p>
                <input type="text" class="form-control" name="title" id="job-title" placeholder="Product Designer">
              </div>
              
             
              <div class="col-md-3 form-group">
                <p for="town">Town / City</p>
                <input type="text" class="form-control" name="town" id="job-location" placeholder="e.g. Nakuru">
              </div>

              <div class="col-md -3 form-group">
                <p for="town">Application Deadline</p>
                <input type="date" class="form-control" name="deadline" id="job-deadline">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 selectize-control">
                <div>
                  <p for="county">County</p>
                </div>
                <select class="selectize-input" name="county" id="county" data-style="btn-black" data-width="100%" data-live-search="true" title="Select County">
                  <option value="1">MOMBASA</option>
                  <option value="2">KWALE</option>
                  <option value="3">KILIFI</option>
                  <option value="4">TANA RIVER</option>
                  <option value="5">LAMU</option>
                  <option value="6">TAITA TAVETA</option>
                  <option value="7">GARISSA</option>
                  <option value="8">WAJIR</option>
                  <option value="9">MANDERA</option>
                  <option value="10">MARSABIT</option>
                  <option value="11">ISIOLO</option>
                  <option value="12">MERU</option>
                  <option value="13">THARAKA-NITHI</option>
                  <option value="14">EMBU</option>
                  <option value="15">KITUI</option>
                  <option value="16">MACHAKOS</option>
                  <option value="17">MAKUENI</option>
                  <option value="18">NYANDARUA</option>
                  <option value="19">NYERI</option>
                  <option value="20">KIRINYAGA</option>
                  <option value="21">MURANG'A</option>
                  <option value="22">KIAMBU</option>
                  <option value="23">TURKANA</option>
                  <option value="24">WEST POKOT</option>
                  <option value="25">SAMBURU</option>
                  <option value="26">TRANS NZOIA</option>
                  <option value="27">UASIN GISHU</option>
                  <option value="28">ELGEYO/MARAKWET</option>
                  <option value="29">NANDI</option>
                  <option value="30">BARINGO</option>
                  <option value="31">LAIKIPIA</option>
                  <option value="32">NAKURU</option>
                  <option value="33">NAROK</option>
                  <option value="34">KAJIADO</option>
                  <option value="35">KERICHO</option>
                  <option value="36">BOMET</option>
                  <option value="37">KAKAMEGA</option>
                  <option value="38">VIHIGA</option>
                  <option value="39">BUNGOMA</option>
                  <option value="40">BUSIA</option>
                  <option value="41">SIAYA</option>
                  <option value="42">KISUMU</option>
                  <option value="43">HOMA BAY</option>
                  <option value="44">MIGORI</option>
                  <option value="45">KISII</option>
                  <option value="46">NYAMIRA</option>
                  <option value="47">NAIROBI</option>


                </select>
              </div>

              <div class="form-group col-md-6">
                <div class="selectize-control ">
                <p for="job-type">Job Type</p></div>
                <select class="selectize-input single demo-default  " id="type_id" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type" name="type_id">
                  <option value="1">Part Time</option>
                  <option value="2">Full Time</option>
                  <option value="3">Remote</option>
                </select>
              </div>
            </div>


            <div class="form-group">
              <p for="description">Job Description</p>
              {{-- <div class="editor" id="editor-1" name="">
                <p>Write Job Description!</p>
                
              </div> --}}
              <textarea name="description"  ></textarea>
            </div>

            <div class="form-group">
              <p for="job-description">Job Requirements</p>
              {{-- <div class="editor" id="editor-3" name="requirements">
                <p name = "requirements">Write Job Description!</p>
                
              </div> --}}
              <textarea name="requirements" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <p for="job-description">Job Responsibilities</p>
              {{-- <div class="editor" id="editor-4" name="responsibilities">
                <p>Write Job Description!</p>
              </div> --}}
              <textarea name="responsibilities" class="form-control"></textarea>
            </div>

            <div class="row">
            <div class="form-group col-md-4">
              <p>Education level</p>
              <select class="nice-select wide border rounded" id="type_id" data-style="btn-black" data-width="100%" data-live-search="true" title="Pick One" name="education">
                <option ="2">Certificate</option>
                <option ="3">Diploma</option>
                <option ="1">Degree</option>
                <option ="2">Post-graduate Degree</option>
                <option ="3">Doctorate</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <p>Salary Range</p> 
              <select class="nice-select wide border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="" name="salary_range">
                <option> 10,000   and   below</option>
                <option> 10,000   -     25,000</option>
                <option> 25,000   -     50,000</option>
                <option> 50,000   -     100,000</option>
                <option>100,000   -     200,000</option>
                <option>200,000   -     350,000</option>
                <option>350,000   -     500,000</option>
                <option>500,000   and   above</option>
                <option>undisclosed</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <p for="company-website-tw">Number of available positions.</p>
              <input type="text" class="form-control" id="company-website-tw" placeholder="e.g. 3" name="no_of_positions">
            </div>


          </div>

            

            <h3 class="text-black my-5 border-bottom pb-4">Company Details</h3>
            <div class="form-group pb-4">
              <select class="nice-select" id="company_id" name="company_id">
                <option>Choose company</option>
                
                @foreach($user_companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
                
                @endforeach
              </select>
            </div><br>

            <div class="form-group">
              <input disabled type="hidden" class="form-control" id="company_name" placeholder="" name="company_name">
            </div>

           

            {{-- <div class="form-group">
              <p for="company-tagline">Tagline</p>
              <input type="text" class="form-control" id="company-tagline" placeholder=" ">
            </div> --}}

            <div class="form-group">
              {{-- <p for="company_description">Company Description</p> --}}
              <div class="editor" id="editor-2" name="">
                <p>Company Description</p>
              </div>
              <textarea class="form-control" name="company_description" id="company_description"></textarea>
              {{-- <input type="text" name="company_decription" id="company_description"> --}}
            </div>
            <div class="row">

            <div class="form-group col-md-6">
              <p>Email</p>
              <input disabled type="text" class="form-control input-group" name="company_email" id="company_email" placeholder="you@yourdomain.com" disabled>
            </div>
            
            <div class="form-group col-md-6">
              <p for="company_website">Website</p>
              <input disabled type="text" class="form-control" id="company_website" placeholder="https://" name="company_website">
            </div>

            <div class="form-group col-md-6">
              <p for="company_biz_stream">Business stream</p>
              <input disabled type="text" class="form-control" id="company_biz_stream" placeholder="" name="company_biz_stream">
            </div>

            <div class="form-group col-md-6">
              <p for="company_twitter">  Twitter Username</p>
              <input disabled type="text" class="form-control" id="company_twitter" placeholder="@companyname" name="company_twitter">
            </div>

          </div>
            <input type="hidden" name="company_business_stream_id" id="company_business_stream_id">
           


            

          <h3 class="text-black my-5 border-bottom pb-2">Application Method</h3>

          {{-- <div class="row">
            <div class="col-12">
                <select class="nice-select"name="mode_of_application" id="">
                  <option value="email">email</option>
                  <option value="worx">Worx</option>
                  <option value="website">Your site / dedicated link</option>
                </select>
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
                              <p class="text-muted mb-3 overflow-hidden d-block">Your companies website / dedicated link</p>
                          </div>

                          <div class="job-details-desc-item">
                              <div class="float-left mr-3">
                                  <p class="text-muted mb-0">2 )</p>
                              </div>
                              <p class="text-muted mb-3 overflow-hidden d-block">E mail submission</p>
                          </div>

                          <div class="job-details-desc-item">
                              <div class="float-left mr-3">
                                  <p class="text-muted mb-0">3 )</p>
                              </div>
                              <p class="text-muted mb-0 overflow-hidden d-block">Through our job application ### platform</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div > --}}
<div class="form-group" >
  <nav class="mb-4">
    <div class="nav nav-tabs" style="justify-content: space-around;" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" onclick="pickEmail();" id="applyViaEmail-tab" data-toggle="tab" href="#applyViaEmail" role="tab" aria-controls="applyViaEmail" aria-selected="true">  <input type="radio" value="1" id="viaEmail" name="applicationMethod" checked id="">Email</a>
      <a class="nav-item nav-link"onclick="pickWebsite();" id="applyViaOwnWebsite-tab" data-toggle="tab" href="#applyViaOwnWebsite" role="tab" aria-controls="applyViaOwnWebsite" aria-selected="false"> <input type="radio" value="2" id="viaWebsite" name="applicationMethod"  id="">Your Website</a>
      <a class="nav-item nav-link"onclick="pickWorx();" id="applyViaWorx-tab" data-toggle="tab" href="#applyViaWorx" role="tab" aria-controls="applyViaWorx" aria-selected="false"> <input type="radio" value="3" id="viaWorx" name="applicationMethod"  id="">Our Platform</a>
    </div>
  </nav>
</div>
<div class="form-group">
  <div class="">
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="applyViaEmail" role="tabpanel" aria-labelledby="applyViaEmail-tab">
        
        <small id="passwordHelpBlock" class="form-text text-muted">
           Enter an email below through which applicants should submit their applications. 
        </small>
        <input type="text" id="applicationEmail" name="applicationEmail" class="form-control" placeholder="application email" aria-describedby="passwordHelpBlock">
    </div>

    
    <div class="tab-pane fade" id="applyViaOwnWebsite" role="tabpanel" aria-labelledby="applyViaOwnWebsite-tab">
      <small id="passwordHelpBlock" class="form-text text-muted">
        Enter the website address or link below through which applicants should submit their applications  
      </small>   
        <input type="text" id="applicationWebsite" name="applicationWebsite" class="form-control" aria-describedby="passwordHelpBlock">
    </div>
    <div class="tab-pane fade" id="applyViaWorx" role="tabpanel" aria-labelledby="applyViaWorx-tab">
      <small id="passwordHelpBlock" class="form-text text-muted">
        Choose this to enable applicant submit their applications through our platform, you will receive email 
        notifications for every application and you have a choice of viewing and downloading the applicants 
        profiles and also accepting or rejecting applications. 
      </small>   
      
        <input type="hidden" id="applicationWorx" value="true" name="applicationWorx" class="form-control" aria-describedby="passwordHelpBlock">
    </div>
    <label class="mt-4 form-text text-muted" for="inputPassword5"> <small> Enter additional application instructions below</small></label>

    <div>
      <textarea name="applicationInstructions" id="applicationInstructions" cols="30" rows="10"></textarea>
    </div>
    <div class="mt-4">        <input type="checkbox" name="termsAndConditions" id="" value="1" onclick="terms_changed(this)" > accept our <a href=""> terms and conditions</a>
    </div>
  </div>
  </div>
</div>

              <button type="submit " disabled  id="submit" class="btn btn-primary mt-4">check</button>
          </form>
          <script>
            function pickEmail(){
              radio = document.getElementById("viaEmail");        radio.checked = true;
            }
            function pickWebsite(){
              radio = document.getElementById("viaWebsite");        radio.checked = true;
            }
            function pickWorx(){
              radio = document.getElementById("viaWorx");        radio.checked = true;
            }


	
            //JavaScript function that enables or disables a submit button depending
            //on whether a checkbox has been ticked or not.
            function terms_changed(termsCheckBox){
                //If the checkbox has been checked
                // if(termsCheckBox.checked){
                    //Set the disabled property to FALSE and enable the button.
                    document.getElementById("submit").disabled = !termsCheckBox.checked;
                // } else{
                //     //Otherwise, disable the submit button.
                //     document.getElementById("submit").disabled = true;
                // }
            }

          </script>
        </div>

       
      </div>
      <div class="row align-items-center mb-5">
        
        <div class="col-lg-4 ml-auto">
          <div class="row">
            <div class="col-6">
              <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-open_in_new mr-2"></span>Preview</a>
            </div>
            <div class="col-6">
              <a href="#" class="btn btn-block btn-info btn-md">Save Job</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

@endsection