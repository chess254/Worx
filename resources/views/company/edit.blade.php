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

                    
                <h1 class="display-3">Edit Company</h1>

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
                <img src="{{$company->getLogo()}}"
                         class="img-fluid avatar avatar-large d-block mx-auto rounded-pill" alt="">
                <form id="company_form"  action="/company/{{$company->id}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PATCH')
                        <fieldset>
                            
                            <div class="col-lg-12 mt-4" id="top">
                                <h4 class="text-dark mb-60" style="text-align: center;">General Information</h4>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Name</p>
                                        <input id="name" type="text" value="{{old('') ?? $company->name}}" name="name" class="form-control resume"
                                               placeholder="Company Name ">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Number of Employees</p>
                                        <input id="number_of_employees" value="{{old('') ?? $company->number_of_employees}}" name="number_of_employees" type="text" class="form-control resume"
                                               placeholder="Number of employees ">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    {{-- <div class="form-group app-label"> --}}
                                        <p class="text-dark">Business Stream</p>
                                    
                                    <div class="registration-form-box">
                                        {{-- <i class="fa fa-list-alt" style="color: var(--theme-color);"></i> --}}
                                        <select id="select-category" class="demo-default" name="business_stream_id">
                                          <option value="">Business stream...</option>
                                          @foreach ($business_stream as $biz_stream)
                                              <option value="{{$biz_stream['id']}}"  {{$company->business_stream_id == $biz_stream['id'] ? 'selected' : ""}} >{{$biz_stream['name']}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
 
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Date Of Formation</p>
                                        <input id="date-of-formation" type="date" value="{{old('') ?? $company->date_of_formation}}" name="date_of_formation" class="form-control "
                                               placeholder="13-02-1999">
                                    </div>
                                </div>   

                                <div class="col-md-8">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Services</p>
                                        <input id="services" value="{{old('') ?? implode (", ", $company->services)}}" name="services" multiple type="text" class="form-control "
                                               placeholder="eg. Marketing, Finance, Transportation, ... ">
                                    </div>
                                </div>
                               
                                
                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Description</p>
                                        <textarea id="description" name="description" rows="10" class="form-control resume"
                                        placeholder="">{{old('') ?? $company->description}}</textarea>
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
                                        <input type="text" value="{{old('') ?? $company->city}}" name="city" id="city" class="form-control resume">
                                    </div>
                                </div><div class="col-md-4">
                              
                                <div class="form-group app-label">
                                    <p class="text-dark">County</p>
                                    <div class="registration-form-box ">
                                        
                                    <select class="demo-default"  name="county_id" id="select-country"  data-live-search="true" title="Select County">
                                        
                                        <option value="1" {{ $company->county_id == 1  ? 'selected' : ""}}>MOMBASA</option>
                                        <option value="2" {{ $company->county_id == 2  ? 'selected' : ""}}>KWALE</option>
                                        <option value="3" {{ $company->county_id == 3  ? 'selected' : ""}}>KILIFI</option>
                                        <option value="4" {{ $company->county_id == 4  ? 'selected' : ""}}>TANA RIVER</option>
                                        <option value="5" {{ $company->county_id == 5  ? 'selected' : ""}}>LAMU</option>
                                        <option value="6" {{ $company->county_id == 6  ? 'selected' : ""}}>TAITA TAVETA</option>
                                        <option value="7" {{ $company->county_id == 7  ? 'selected' : ""}}>GARISSA</option>
                                        <option value="8" {{ $company->county_id == 8  ? 'selected' : ""}}>WAJIR</option>
                                        <option value="9" {{ $company->county_id == 9  ? 'selected' : ""}}>MANDERA</option>
                                        <option value="10" {{ $company->county_id == 10 ? 'selected' : "" }}>MARSABIT</option>
                                        <option value="11" {{ $company->county_id == 11 ? 'selected' : "" }}>ISIOLO</option>
                                        <option value="12" {{ $company->county_id == 12 ? 'selected' : "" }}>MERU</option>
                                        <option value="13" {{ $company->county_id == 13 ? 'selected' : "" }}>THARAKA-NITHI</option>
                                        <option value="14" {{ $company->county_id == 14 ? 'selected' : "" }}>EMBU</option>
                                        <option value="15" {{ $company->county_id == 15 ? 'selected' : "" }}>KITUI</option>
                                        <option value="16" {{ $company->county_id == 16 ? 'selected' : "" }}>MACHAKOS</option>
                                        <option value="17" {{ $company->county_id == 17 ? 'selected' : "" }}>MAKUENI</option>
                                        <option value="18" {{ $company->county_id == 18 ? 'selected' : "" }}>NYANDARUA</option>
                                        <option value="19" {{ $company->county_id == 19 ? 'selected' : "" }}>NYERI</option>
                                        <option value="20" {{ $company->county_id == 20 ? 'selected' : "" }}>KIRINYAGA</option>
                                        <option value="21" {{ $company->county_id == 21 ? 'selected' : "" }}>MURANG'A</option>
                                        <option value="22" {{ $company->county_id == 22 ? 'selected' : "" }}>KIAMBU</option>
                                        <option value="23" {{ $company->county_id == 23 ? 'selected' : "" }}>TURKANA</option>
                                        <option value="24" {{ $company->county_id == 24 ? 'selected' : "" }}>WEST POKOT</option>
                                        <option value="25" {{ $company->county_id == 25 ? 'selected' : "" }}>SAMBURU</option>
                                        <option value="26" {{ $company->county_id == 26 ? 'selected' : "" }}>TRANS NZOIA</option>
                                        <option value="27" {{ $company->county_id == 27 ? 'selected' : "" }}>UASIN GISHU</option>
                                        <option value="28" {{ $company->county_id == 28 ? 'selected' : "" }}>ELGEYO/MARAKWET</option>
                                        <option value="29" {{ $company->county_id == 29 ? 'selected' : "" }}>NANDI</option>
                                        <option value="30" {{ $company->county_id == 30 ? 'selected' : "" }}>BARINGO</option>
                                        <option value="31" {{ $company->county_id == 31 ? 'selected' : "" }}>LAIKIPIA</option>
                                        <option value="32" {{ $company->county_id == 32 ? 'selected' : "" }}>NAKURU</option>
                                        <option value="33" {{ $company->county_id == 33 ? 'selected' : "" }}>NAROK</option>
                                        <option value="34" {{ $company->county_id == 34 ? 'selected' : "" }}>KAJIADO</option>
                                        <option value="35" {{ $company->county_id == 35 ? 'selected' : "" }}>KERICHO</option>
                                        <option value="36" {{ $company->county_id == 36 ? 'selected' : "" }}>BOMET</option>
                                        <option value="37" {{ $company->county_id == 37 ? 'selected' : "" }}>KAKAMEGA</option>
                                        <option value="38" {{ $company->county_id == 38 ? 'selected' : "" }}>VIHIGA</option>
                                        <option value="39" {{ $company->county_id == 39 ? 'selected' : "" }}>BUNGOMA</option>
                                        <option value="40" {{ $company->county_id == 40 ? 'selected' : "" }}>BUSIA</option>
                                        <option value="41" {{ $company->county_id == 41 ? 'selected' : "" }}>SIAYA</option>
                                        <option value="42" {{ $company->county_id == 42 ? 'selected' : "" }}>KISUMU</option>
                                        <option value="43" {{ $company->county_id == 43 ? 'selected' : "" }}>HOMA BAY</option>
                                        <option value="44" {{ $company->county_id == 44 ? 'selected' : "" }}>MIGORI</option>
                                        <option value="45" {{ $company->county_id == 45 ? 'selected' : "" }}>KISII</option>
                                        <option value="46" {{ $company->county_id == 46 ? 'selected' : "" }}>NYAMIRA</option>
                                        <option value="47" {{ $company->county_id == 47 ? 'selected' : "" }}>NAIROBI</option>


                                    </select></div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Country</p>
                                        <div class="registration-form-box">
                                            <select class="demo-default rounded" id="select-country" name="country" data-live-search="">
                                                
                                                <option value="{{$company->country}}" selected>KENYA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
    
                               
    
                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <p class="text-dark">E-mail</p>
                                        <input id="email" type="email" value="{{old('') ?? $company->email}}" name="email" class="form-control resume"
                                               placeholder="Email ID ">
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Website</p>
                                        <input id="website" type="url" value="{{old('') ?? $company->website}}" name="website" class="form-control resume"
                                               placeholder="www.example.com">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Cell Phone</p>
                                        <input id="mobile" value="{{old('') ?? $company->mobile}}" name="mobile" type="tel" class="form-control resume"
                                               placeholder="Phone No. ">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">Landline 1</p>
                                        <input id="landline" type="tel" value="{{old('') ?? $company->landline}}" name="landline" class="form-control resume"
                                               placeholder="0202063092">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <p class="text-dark">logo</p>
                                        <input id="logo" type="file" value="{{old('') ?? $company->logo}}" name="logo" class="form-control-file resume"
                                               placeholder=""> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <i class="fab fa-facebook-f" style="color: var(--theme-color); font-size: 20px;"></i>
                                    <input id="facebook" type="url" value="{{old('') ?? $company->facebook}}" name="facebook" class="form-control resume"
                                    placeholder="facebook ">
                                    

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fab fa-linkedin" style="color: var(--theme-color); font-size: 20px;"></i>
                                        <input id="linkedin" type="url" value="{{old('') ?? $company->linked_in}}" name="linked_in" class="form-control resume"
                                        placeholder="linkedIn ">
                                        
                                       </div>
                                
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fab fa-twitter-square"style="color: var(--theme-color); font-size: 20px;"></i>
                                        <input id="twitter" type="url" value="{{old('') ?? $company->twitter}}" name="twitter" class="form-control resume"
                                        placeholder="twitter">
                                        
                                                                            </div>
                                    
                                </div>
    
                                
    
                                
                            </div>
                            
                            
                           
                    
                            
                         
                            
                            {{-- <input type="button" name="previous" class="previous btn btn-default" value="preview" /> --}}
 <input type="submit" name="submit" class="submit btn btn-success  mb-40 float-right" value="Submit" />
                           
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