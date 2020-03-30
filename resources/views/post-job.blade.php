@extends('layouts.app')

@section('navbar')
@include('partials.navbar')
@endsection

@section('content')
<!-- HOME -->
  <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Post A Job</h1>
          <div class="custom-breadcrumbs">
            <a href="#">Home</a> <span class="mx-2 slash">/</span>
            <a href="#">Job</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Post a Job</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <section class="site-section">
    <div class="container">

      <div class="row align-items-center mb-5">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <div class="d-flex align-items-center">
            <div>
              <h2>Post A Job</h2>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="row">
            <div class="col-6">
              <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-open_in_new mr-2"></span>Preview</a>
            </div>
            <div class="col-6">
              <a href="#" class="btn btn-block btn-primary btn-md">Save Job</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="/post" method="post">
            @csrf
            <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>
            
            <div class="form-group">
              <label for="company-website-tw d-block">Upload Featured Image</label> <br>
              <label class="btn btn-primary btn-md btn-file">
                Browse File<input type="file" hidden>
              </label>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="you@yourdomain.com">
            </div>
            <div class="form-group">
              <label for="title">Job Title</label>
              <input type="text" class="form-control" name="title" id="job-title" placeholder="Product Designer">
            </div>
            <div class="form-group">
              <label for="town">Town / City</label>
              <input type="text" class="form-control" name="town" id="job-location" placeholder="e.g. Nakuru">
            </div>

            <div class="form-group">
              <label for="county">County</label>
              <select class="selectpicker border rounded" name="county" id="county" data-style="btn-black" data-width="100%" data-live-search="true" title="Select County">
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

            <div class="form-group">
              <label for="job-type">Job Type</label>
              <select class="selectpicker border rounded" id="type_id" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type" name="type_id">
                <option value="1">Part Time</option>
                <option value="2">Full Time</option>
                <option value="3">Remote</option>
              </select>
            </div>


            <div class="form-group">
              <label for="description">Job Description</label>
              <div class="editor" id="editor-1" name="">
                <p>Write Job Description!</p>
                
              </div>
              <textarea name="description"></textarea>
            </div>

            <div class="form-group">
              <label for="job-description">Job Requirements</label>
              <div class="editor" id="editor-3" name="requirements">
                <p name = "requirements">Write Job Description!</p>
                
              </div>
              <textarea name="requirements"></textarea>
            </div>

            <div class="form-group">
              <label for="job-description">Job Responsibilities</label>
              <div class="editor" id="editor-4" name="responsibilities">
                <p>Write Job Description!</p>
              </div>
              <textarea name="responsibilities"></textarea>
            </div>

            <div class="form-group">
              <label for="job-type">Education level</label>
              <select class="selectpicker border rounded" id="type_id" data-style="btn-black" data-width="100%" data-live-search="true" title="Pick One" name="education">
                <option ="1">High School</option>
                <option ="2">Certificate</option>
                <option ="3">Diploma</option>
                <option ="1">Degree</option>
                <option ="2">Post-graduate Degree</option>
                <option ="3">Doctorate</option>
              </select>
            </div>

            <div class="form-group">
              <label for="company-website-tw">Number of available positions.</label>
              <input type="text" class="form-control" id="company-website-tw" placeholder="e.g. 3" name="no_of_positions">
            </div>

            <div class="form-group">
              <label for="company-tagline">Salary Range</label> 
              <select class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="" name="salary_range">
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


            <h3 class="text-black my-5 border-bottom pb-2">Company Details</h3>
            <div class="form-group">
              <label for="company-name">Company Name</label>
              <input type="text" class="form-control" id="company-name" placeholder="" name="company_name">
            </div>

            {{-- <div class="form-group">
              <label for="company-tagline">Tagline (Optional)</label>
              <input type="text" class="form-control" id="company-tagline" placeholder=" ">
            </div> --}}

            <div class="form-group">
              <label for="job-description">Company Description (Optional)</label>
              <div class="editor" id="editor-2" name="">
                <p>Description</p>
              </div>
              <textarea name="company_description"></textarea>
            </div>
            
            <div class="form-group">
              <label for="company-website">Website (Optional)</label>
              <input type="text" class="form-control" id="company-website" placeholder="https://" name="company_website">
            </div>

            <div class="form-group">
              <label for="company-website-fb">Facebook Username (Optional)</label>
              <input type="text" class="form-control" id="company-website-fb" placeholder="" name="company_fb">
            </div>

            <div class="form-group">
              <label for="company-website-tw">Twitter Username (Optional)</label>
              <input type="text" class="form-control" id="company-website-tw" placeholder="@companyname" name="company_twitter">
            </div>
            {{-- <div class="form-group">
              <label for="company-website-tw">Linkedin Username (Optional)</label>
              <input type="text" class="form-control" id="company-website-tw" placeholder="companyname">
            </div> --}}

            <div class="form-group">
              <label for="company-website-tw d-block">Upload Logo</label> <br>
              <label class="btn btn-primary btn-md btn-file">
                Browse File<input type="file" hidden>
              </label>
            </div>
              <button type="submit" class="btn btn-primary">check</button>
          </form>
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