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
          <form class="p-4 p-md-5 border rounded" method="post">
            <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>
            
            <div class="form-group">
              <label for="company-website-tw d-block">Upload Featured Image</label> <br>
              <label class="btn btn-primary btn-md btn-file">
                Browse File<input type="file" hidden>
              </label>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" placeholder="you@yourdomain.com">
            </div>
            <div class="form-group">
              <label for="job-title">Job Title</label>
              <input type="text" class="form-control" id="job-title" placeholder="Product Designer">
            </div>
            <div class="form-group">
              <label for="job-location">Location</label>
              <input type="text" class="form-control" id="job-location" placeholder="e.g. New York">
            </div>

            <div class="form-group">
              <label for="job-region">Job Region</label>
              <select class="selectpicker border rounded" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                    <option>Anywhere</option>
                    <option>San Francisco</option>
                    <option>Palo Alto</option>
                    <option>New York</option>
                    <option>Manhattan</option>
                    <option>Ontario</option>
                    <option>Toronto</option>
                    <option>Kansas</option>
                    <option>Mountain View</option>
                  </select>
            </div>

            <div class="form-group">
              <label for="job-type">Job Type</label>
              <select class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                <option>Part Time</option>
                <option>Full Time</option>
              </select>
            </div>


            <div class="form-group">
              <label for="job-description">Job Description</label>
              <div class="editor" id="editor-1">
                <p>Write Job Description!</p>
              </div>
            </div>


            <h3 class="text-black my-5 border-bottom pb-2">Company Details</h3>
            <div class="form-group">
              <label for="company-name">Company Name</label>
              <input type="text" class="form-control" id="company-name" placeholder="e.g. New York">
            </div>

            <div class="form-group">
              <label for="company-tagline">Tagline (Optional)</label>
              <input type="text" class="form-control" id="company-tagline" placeholder="e.g. New York">
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