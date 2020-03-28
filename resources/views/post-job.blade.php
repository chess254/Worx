@extends('layouts.app')

@include('partials.navbar')

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
              <label for="job-location">Town / City</label>
              <input type="text" class="form-control" name="job-location" id="job-location" placeholder="e.g. Nakuru">
            </div>

            <div class="form-group">
              <label for="job-region">County</label>
              <select class="selectpicker border rounded" name="county" id="county" data-style="btn-black" data-width="100%" data-live-search="true" title="Select County">
                <option name="1">MOMBASA</option>
                <option name="2">KWALE</option>
                <option name="3">KILIFI</option>
                <option name="4">TANA RIVER</option>
                <option name="5">LAMU</option>
                <option name="6">TAITA TAVETA</option>
                <option name="7">GARISSA</option>
                <option name="8">WAJIR</option>
                <option name="9">MANDERA</option>
                <option name="10">MARSABIT</option>
                <option name="11">ISIOLO</option>
                <option name="12">MERU</option>
                <option name="13">THARAKA-NITHI</option>
                <option name="14">EMBU</option>
                <option name="15">KITUI</option>
                <option name="16">MACHAKOS</option>
                <option name="17">MAKUENI</option>
                <option name="18">NYANDARUA</option>
                <option name="19">NYERI</option>
                <option name="20">KIRINYAGA</option>
                <option name="21">MURANG'A</option>
                <option name="22">KIAMBU</option>
                <option name="23">TURKANA</option>
                <option name="24">WEST POKOT</option>
                <option name="25">SAMBURU</option>
                <option name="26">TRANS NZOIA</option>
                <option name="27">UASIN GISHU</option>
                <option name="28">ELGEYO/MARAKWET</option>
                <option name="29">NANDI</option>
                <option name="30">BARINGO</option>
                <option name="31">LAIKIPIA</option>
                <option name="32">NAKURU</option>
                <option name="33">NAROK</option>
                <option name="34">KAJIADO</option>
                <option name="35">KERICHO</option>
                <option name="36">BOMET</option>
                <option name="37">KAKAMEGA</option>
                <option name="38">VIHIGA</option>
                <option name="39">BUNGOMA</option>
                <option name="40">BUSIA</option>
                <option name="41">SIAYA</option>
                <option name="42">KISUMU</option>
                <option name="43">HOMA BAY</option>
                <option name="44">MIGORI</option>
                <option name="45">KISII</option>
                <option name="46">NYAMIRA</option>
                <option name="47">NAIROBI</option>
              </select>
            </div>

            <div class="form-group">
              <label for="job-type">Job Type</label>
              <select class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                <option>Part Time</option>
                <option>Full Time</option>
                <option>Remote</option>
              </select>
            </div>


            <div class="form-group">
              <label for="job-description">Job Description</label>
              <div class="editor" id="editor-1">
                <p>Write Job Description!</p>
              </div>
            </div>

            <div class="form-group">
              <label for="company-website-tw">Number of available positions.</label>
              <input type="text" class="form-control" id="company-website-tw" placeholder="e.g. 3">
            </div>

            <div class="form-group">
              <label for="company-tagline">Salary Range</label> 
              <select class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="">
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
              <input type="text" class="form-control" id="company-name" placeholder="">
            </div>

            <div class="form-group">
              <label for="company-tagline">Tagline (Optional)</label>
              <input type="text" class="form-control" id="company-tagline" placeholder=" ">
            </div>

            <div class="form-group">
              <label for="job-description">Company Description (Optional)</label>
              <div class="editor" id="editor-2">
                <p>Description</p>
              </div>
            </div>
            
            <div class="form-group">
              <label for="company-website">Website (Optional)</label>
              <input type="text" class="form-control" id="company-website" placeholder="https://">
            </div>

            <div class="form-group">
              <label for="company-website-fb">Facebook Username (Optional)</label>
              <input type="text" class="form-control" id="company-website-fb" placeholder="companyname">
            </div>

            <div class="form-group">
              <label for="company-website-tw">Twitter Username (Optional)</label>
              <input type="text" class="form-control" id="company-website-tw" placeholder="@companyname">
            </div>
            <div class="form-group">
              <label for="company-website-tw">Linkedin Username (Optional)</label>
              <input type="text" class="form-control" id="company-website-tw" placeholder="companyname">
            </div>

            <div class="form-group">
              <label for="company-website-tw d-block">Upload Logo</label> <br>
              <label class="btn btn-primary btn-md btn-file">
                Browse File<input type="file" hidden>
              </label>
            </div>
              <button type="submit" class="btn bnt-primary">check</button>
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
              <a href="#" class="btn btn-block btn-primary btn-md">Save Job</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>