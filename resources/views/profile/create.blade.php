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

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    {{-- <h4 class="text-uppercase title mb-4">Create Resume</h4> --}}
                    <ul class="page-next d-inline-block mb-0">
                        <li><a href="index.html" class="text-uppercase font-weight-bold">Home</a></li>
                        <li><a href="#" class="text-uppercase font-weight-bold">Pages</a></li>
                        <li><a href="#" class="text-uppercase font-weight-bold">Candidates</a></li>
                        <li>
                            <span class="text-uppercase text-white font-weight-bold">Creat Resume</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
</section>
<!-- end home -->

<!-- CREATE RESUME START -->
<section class="section pt-1 mt-100" id="educ">
    
        


        <div class="container mt-4"  >
            {{-- <div class="progress mt-4">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div> --}}
            {{-- <div class="alert alert-success hide"></div>    --}}
            
            <div class="col-12 mt-4">
                
                <div class="custom-form p-4 border rounded" >
                    <div class="progress mt-4">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    {{-- <img src="images/employers/img-1.jpg"
                         class="img-fluid avatar avatar-medium d-block mx-auto rounded-pill" alt=""> --}}
                    <form id="user_form" novalidate action="/profile" method="post" >
                        @csrf
                        <fieldset>
                            
                            <div class="col-lg-12" id="top">
                                <h5 class="text-dark">General Information :</h5>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">First Name<span class="text-danger">*</span> :</label>
                                        <input id="first_name" type="text" name="name" class="form-control resume"
                                               placeholder="First Name :">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Middle Name<span class="text-danger">*</span> :</label>
                                        <input id="middle_name" name="middle_name" type="text" class="form-control resume"
                                               placeholder="Middle Name :">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Surname<span class="text-danger">*</span> :</label>
                                        <input id="surname-name" name="second_name" type="text" class="form-control resume"
                                               placeholder="Surname :">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Date Of Birth<span class="text-danger">*</span> :</label>
                                        <input id="date-of-birth" type="date" name="date_of_birth" class="form-control resume"
                                               placeholder="13-02-1999">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Gender<span class="text-danger">*</span> :</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded" name="gender">
                                                <option value="">Choose</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="O">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Marital Status</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded" name="marital_status">
                                                <option value="1">Unmarried</option>
                                                <option value="2">Married</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <h5 class="text-dark">Contact Information :</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">City</label><br>
                                        <input type="text" name="city" id="city" class="form-control resume">
                                    </div>
                                </div><div class="col-md-4">
                              
                                <div class="form-group app-label">
                                    <label for="county" class="text-muted">County</label>
                                    <div class="form-button app-label">
                                        
                                    <select class="nice-select rounded"  name="county" id="county"  data-live-search="true" title="Select County">
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


                                    </select></div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Country</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded" id="country" name="country" data-live-search="">
                                                <option data-display="Country">Country</option>
                                                <option value="Kenya">Kenya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Phone</label>
                                        <input id="phone" name="phone" type="tel" class="form-control resume"
                                               placeholder="Phone No. :">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">E-mail</label>
                                        <input id="email" type="email" name="email" class="form-control resume"
                                               placeholder="Email ID :">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Website</label>
                                        <input id="website" type="url" name="website" class="form-control resume"
                                               placeholder="www.example.com">
                                    </div>
                                </div>
    
                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label>Address :</label>
                                        <textarea id="address" name="address" rows="4" class="form-control resume"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="button" class="next btn btn-info" value="Next" />
                        </fieldset>
                        <fieldset>
                            
                            
                            <div class="col-lg-12" >
                                    <h5 class="text-dark mt-5">Education Details : <small> <small>Fill in details for one institution, you will have a chance to update more later</small> </small></h5>
                            </div>
                    
                            <div class="col-12 mt-3" >
                                        <div class="row" >
                                            <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Course</label>
                                                        <input name="educ[1][course]" id="course" type="text" class="form-control resume" placeholder="">
                                                    </div>
                                                </div>
                    
                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Institute</label>
                                                        <input name="educ[1][institute]" id="institute" type="text" class="form-control resume"
                                                               placeholder="">
                                                    </div>
                                                </div>
                    
                                                <div class="col-lg-6">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Certificate</label>
                                                        <input name="educ[1][certificate]" id="certificate" type="text" class="form-control resume"
                                                               placeholder="">
                                                    </div>
                                                </div>
                    
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group app-label">
                                                                <label class="text-muted">Date From</label>
                                                                <input name="educ[1][starting_date]" id="starting-date" type="date" class="form-control resume"
                                                                       placeholder="01-Jan-2018">
                                                            </div>
                                                        </div>
                    
                                                        <div class="col-md-6">
                                                            <div class="form-group app-label">
                                                                <label class="text-muted">Date To</label>
                                                                <input name="educ[1][completion_date]" id="completion-date" type="date" class="form-control resume"
                                                                       placeholder="31-March-2019">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                                
                                        </div>
                                        
                                            <div class="form-group app-label">
                                                    <label>Additional Information :</label>
                                                    <textarea name="educ[1][description]" id="description" rows="4" class="form-control resume"
                                                                  placeholder=""></textarea>
                                            </div>
                                        
                            </div>
                            {{-- <input type="button" class="Bnt btn btn-warning" id="add-education-details" value="Add More"> --}}
                            <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                            <input type="button" name="next" class="next btn btn-info" value="Next" />
                        </fieldset>
                
                        <fieldset>
                            
                                <div class="col-12 mt-5">
                                    <h5 class="text-dark">Work Experience : <small> <small >Fill in details for one institution, you will have a chance to update more later</small> </small></h5>
                                </div>
                    
                                <div class="col-12 mt-3">
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Company Name</label>
                                                        <input id="company-name" name="exp[1][company_name]" type="text" class="form-control resume" placeholder="">
                                                    </div>
                                                </div>
                    
                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Job Position</label>
                                                        <input id="job-position" name="exp[1][job_title]" type="text" class="form-control resume" placeholder="">
                                                    </div>
                                                </div>
                    
                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Company website</label>
                                                        <input type="text" name="exp[1][website]" id="company-website" class="form-control resume">
                                                    </div>
                                                </div>
                    
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group app-label">
                                                                <label class="text-muted">Date From</label>
                                                                <input id="date-from" type="date" name="exp[1][start_date]" class="form-control resume"
                                                                       placeholder="01-Jan-2018">
                                                            </div>
                                                        </div>
                    
                                                        <div class="col-md-6">
                                                            <div class="form-group app-label">
                                                                <label class="text-muted">Date To</label>
                                                                <input id="date-to" type="date" name="exp[1][end_date]" class="form-control resume"
                                                                       placeholder="31-March-2019">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                    <div class="col-md-4">
                                                        <div class="form-group app-label">
                                                            <label class="text-muted">City</label><br>
                                                            <input type="text" name="exp[1][job_location_city]" id="city" class="form-control resume">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                  
                                                        <div class="form-group app-label">
                                                            <label for="county" class="text-muted">County</label>
                                                            <div class="form-button app-label">
                                                                
                                                                <select class="nice-select rounded"  name="exp[1][job_location_county]" id="county"  data-live-search="true" title="Select County">
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
                                                        </div>
                                                    </div>
                        
                                                    <div class="col-md-4">
                                                        <div class="form-group app-label">
                                                            <label class="text-muted">Country</label>
                                                            <div class="form-button">
                                                                <select class="nice-select rounded" id="country" name="exp[1][job_location_country]">
                                                                    <option data-display="Country">Country</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                    
                                                <div class="col-lg-12 pb-5">
                                                    <div class="form-group app-label">
                                                        <label>Additional Information :</label>
                                                        <textarea id="addition-information-1" rows="4" name="exp[1][description]" class="form-control resume"
                                                                  placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group app-label text-right">
                                                        <input type="button" class="submitBnt btn btn-primary" value="Add More">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                </div>
                           

                            <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                            <input type="button" name="next" class="next btn btn-info" value="Next" />
                        </fieldset>

                        <fieldset>
                           

                            <div class="col-12 mt-5">
                                <h5 class="text-dark">Skills :</h5>
                            </div>
                
                            <div class="col-12 mt-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Skills</label>
                                                    <input id="skills" multiple name="skills[]" type="text" class="form-control resume"
                                                           placeholder="HTML, CSS, PHP, javascript, ...">
                                                </div>
                                            </div>
                
                                            <div class="col-lg-12">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Skill proficiency</label>
                                                    <input id="skill_proficiency" type="text" class="form-control resume"
                                                           placeholder="75%">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group app-label text-right">
                                                    <input type="button" class="submitBnt btn btn-primary" value="Add More">
                                                </div>
                                            </div>
                                        </div>
                                 
                            </div>

                            <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                            <input type="button" name="next" class="next btn btn-info" value="Preview" />
                        </fieldset>

                        <fieldset>
                            <h2>Preview</h2>
                            <div class="form-group">
                              to display preview here
                            </div>
                            
                            <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                            <input type="submit" name="submit" class="submit btn btn-success" value="Submit" />
                        </fieldset>
                 
                    </form>
                </div>
            </div> 
            
        </div>

</section>
<!-- CREATE RESUME END -->

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
