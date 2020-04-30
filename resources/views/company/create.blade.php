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

                    
                <h1 class="display-3">Company create page form here</h1>

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


<!-- CREATE RESUME START -->
<section class="section pt-1 mt-100" id="educ">
    
        <div class="container mt-4"  >
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            
            <div class="col-12 mt-4">      
                <div class="custom-form p-4 border rounded" >  
                    {{-- <img src="images/employers/img-1.jpg"
                         class="img-fluid avatar avatar-medium d-block mx-auto rounded-pill" alt=""> --}}
                    <form id="company_form" novalidate action="/company" method="post" enctype="multipart/form-data" >
                        @csrf
                        <fieldset>
                            
                            <div class="col-lg-12 mt-4" id="top">
                                <h4 class="text-dark mb-60" style="text-align: center;">General Information</h4>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Name</p>
                                        <input id="name" type="text" name="name" class="form-control resume"
                                               placeholder="Company Name ">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Number of Employees</p>
                                        <input id="number_of_employees" name="number_of_employees" type="text" class="form-control resume"
                                               placeholder="Number of employees ">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    {{-- <div class="form-group app-label"> --}}
                                        <p class="text-dark">Business Stream</p>
                                    
                                    <div class="registration-form-box">
                                        <i class="fa fa-list-alt" style="color: var(--theme-color);"></i>
                                        <select id="select-category" class="demo-default" name="business_stream_id">
                                          <option value="">Business stream...</option>
                                          @foreach ($business_stream as $biz_stream)
                                              <option value="{{$biz_stream['id']}}">{{$biz_stream['name']}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
 
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Date Of Formation</p>
                                        <input id="date-of-formation" type="date" name="date_of_formation" class="form-control "
                                               placeholder="13-02-1999">
                                    </div>
                                </div>   

                                <div class="col-md-8">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Services</p>
                                        <input id="services" name="services" multiple type="text" class="form-control "
                                               placeholder="eg. Marketing, Finance, Transportation, ... ">
                                    </div>
                                </div>
                               
                                
                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Description</p>
                                        <textarea id="description" name="description" rows="4" class="form-control resume"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>



                        

<br><br>
                            <div class="col-12" style="padding-top: 10px;">
                                <h4 class="text-dark mb-60" style="text-align: center;">Contact Information</h4>
                            </div>
                            <div class="row mb-60">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">City</p>
                                        <input type="text" name="city" id="city" class="form-control resume">
                                    </div>
                                </div><div class="col-md-4">
                              
                                <div class="form-group app-label">
                                    <p class="text-dark">County</p>
                                    <div class="form-button app-label">
                                        
                                    <select class="nice-select rounded"  name="county_id" id="county"  data-live-search="true" title="Select County">
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
                                        <p class="text-dark">Country</p>
                                        <div class="form-button">
                                            <select class="nice-select rounded" id="country" name="country" data-live-search="">
                                                <option data-display="Country">Country</option>
                                                <option value="Kenya">Kenya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
    
                               
    
                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <p class="text-dark">E-mail</p>
                                        <input id="email" type="email" name="email" class="form-control resume"
                                               placeholder="Email ID ">
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Website</p>
                                        <input id="website" type="url" name="website" class="form-control resume"
                                               placeholder="www.example.com">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Cell Phone</p>
                                        <input id="mobile" name="mobile" type="tel" class="form-control resume"
                                               placeholder="Phone No. ">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Landline 1</p>
                                        <input id="landline" type="tel" name="landline" class="form-control resume"
                                               placeholder="0202063092">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">logo</p>
                                        <input id="logo" type="file" name="logo" class="form-control-file resume"
                                               placeholder=""> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <i class="fab fa-facebook-f" style="color: var(--theme-color); font-size: 20px;"></i>
                                    <input id="facebook" type="url" name="facebook" class="form-control resume"
                                    placeholder="facebook ">
                                    

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fab fa-linkedin" style="color: var(--theme-color); font-size: 20px;"></i>
                                        <input id="linkedin" type="url" name="linked_in" class="form-control resume"
                                        placeholder="linkedIn ">
                                        
                                       </div>
                                
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fab fa-twitter-square"style="color: var(--theme-color); font-size: 20px;"></i>
                                        <input id="twitter" type="url" name="twitter" class="form-control resume"
                                        placeholder="twitter">
                                        
                                                                            </div>
                                    
                                </div>
    
                                
    
                                
                            </div>
                            
                            
                           
                    
                            
                         
                            
                            {{-- <input type="button" name="previous" class="previous btn btn-default" value="preview" /> --}}
 <input type="submit" name="submit" class="submit btn btn-success  mb-40 float-right" value="Submit" />
                            <input type="reset" name="reset" class="submit btn btn-warning mr-2 mb-40 float-right" value="reset" />
                           
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
                <h4 class="mt-2 mb-0">Subscribe To Job Notification</h4>
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