@extends('layouts.app')



@section('navbar')
  @include('partials.navbar')
@endsection

@section('content')

<!-- HOME -->
<section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                  @if (session()->has('message'))
                  <div class="alert alert-info">
                      {{ session('message') }}
                  </div>
              @endif
                    <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                    <p>Find work quickly, efficiently & Reliably. for FREE!!!</p>
                </div>
                <form method="post" class="search-jobs-form">
                    <div class="row mb-5">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <input type="text" class="form-control form-control-lg" placeholder="Job title, Company...">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Region">
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Job Type">
                            <option>Part Time</option>
                            <option>Full Time</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 popular-keywords">
                            <h3>Trending Keywords:</h3>
                            <ul class="keywords list-unstyled m-0 p-0">
                                <li><a href="#" class="">UI Designer</a></li>
                                <li><a href="#" class="">Python</a></li>
                                <li><a href="#" class="">Developer</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <a href="#next" class="scroll-button smoothscroll">
    <span class=" icon-keyboard_arrow_down"></span>
    </a>

</section>

<section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="section-title mb-2 text-white">JobBoard Site Stats</h2>
          <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita unde officiis recusandae sequi excepturi corrupti.</p>
        </div>
      </div>
      <div class="row pb-0 block__19738 section-counter">

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="1930">0</strong>
          </div>
          <span class="caption">Candidates</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="54">0</strong>
          </div>
          <span class="caption">Jobs Posted</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="120">0</strong>
          </div>
          <span class="caption">Jobs Filled</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="550">0</strong>
          </div>
          <span class="caption">Companies</span>
        </div>

          
      </div>
    </div>
  </section>

  

  <section class="site-section">
    <div class="container">

      <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="section-title mb-2">43,167 Job Listed</h2>
        </div>
      </div>
      
      <ul class="job-listings mb-5">
        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Product Designer</h2>
              <strong>Adidas</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> New York, New York
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-danger">Part Time</span>
            </div>
          </div>
          
        </li>
        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Digital Marketing Director</h2>
              <strong>Sprint</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> Overland Park, Kansas 
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-success">Full Time</span>
            </div>
          </div>
        </li>

        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_3.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Back-end Engineer (Python)</h2>
              <strong>Amazon</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> Overland Park, Kansas 
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-success">Full Time</span>
            </div>
          </div>
        </li>

        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_4.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Senior Art Director</h2>
              <strong>Microsoft</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> Anywhere 
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-success">Full Time</span>
            </div>
          </div>
        </li>

        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_5.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Product Designer</h2>
              <strong>Puma</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> San Mateo, CA 
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-success">Full Time</span>
            </div>
          </div>
        </li>
        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Product Designer</h2>
              <strong>Adidas</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> New York, New York
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-danger">Part Time</span>
            </div>
          </div>
          
        </li>
        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Digital Marketing Director</h2>
              <strong>Sprint</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> Overland Park, Kansas 
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-success">Full Time</span>
            </div>
          </div>
        </li>

        

        
      </ul>

      <div class="row pagination-wrap">
        <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
          <span>Showing 1-7 Of 43,167 Jobs</span>
        </div>
        <div class="col-md-6 text-center text-md-right">
          <div class="custom-pagination ml-auto">
            <a href="#" class="prev">Prev</a>
            <div class="d-inline-block">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            </div>
            <a href="#" class="next">Next</a>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h2 class="text-white">Looking For A Job?</h2>
          <p class="mb-0 text-white lead">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
        </div>
        <div class="col-md-3 ml-auto">
          <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
        </div>
      </div>
    </div>
  </section>

  
  <section class="site-section py-4">
    <div class="container">

      <div class="row align-items-center">
        <div class="col-12 text-center mt-4 mb-5">
          <div class="row justify-content-center">
            <div class="col-md-7">
              <h2 class="section-title mb-2">Company We've Helped</h2>
              <p class="lead">Porro error reiciendis commodi beatae omnis similique voluptate rerum ipsam fugit mollitia ipsum facilis expedita tempora suscipit iste</p>
            </div>
          </div>
          
        </div>
        <div class="col-6 col-lg-3 col-md-6 text-center">
          <img src="images/logo_mailchimp.svg" alt="Image" class="img-fluid logo-1">
        </div>
        <div class="col-6 col-lg-3 col-md-6 text-center">
          <img src="images/logo_paypal.svg" alt="Image" class="img-fluid logo-2">
        </div>
        <div class="col-6 col-lg-3 col-md-6 text-center">
          <img src="images/logo_stripe.svg" alt="Image" class="img-fluid logo-3">
        </div>
        <div class="col-6 col-lg-3 col-md-6 text-center">
          <img src="images/logo_visa.svg" alt="Image" class="img-fluid logo-4">
        </div>

        <div class="col-6 col-lg-3 col-md-6 text-center">
          <img src="images/logo_apple.svg" alt="Image" class="img-fluid logo-5">
        </div>
        <div class="col-6 col-lg-3 col-md-6 text-center">
          <img src="images/logo_tinder.svg" alt="Image" class="img-fluid logo-6">
        </div>
        <div class="col-6 col-lg-3 col-md-6 text-center">
          <img src="images/logo_sony.svg" alt="Image" class="img-fluid logo-7">
        </div>
        <div class="col-6 col-lg-3 col-md-6 text-center">
          <img src="images/logo_airbnb.svg" alt="Image" class="img-fluid logo-8">
        </div>
      </div>
    </div>
  </section>


  <section class="bg-light pt-5 testimony-full">
      
      <div class="owl-carousel single-carousel">

      
        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                <p><cite> &mdash; Chris Peters, @Google</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="images/person_transparent.png" alt="Image" class="img-fluid mb-0">
            </div>
          </div>
        </div>

    </div>

  </section>

  <section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
          <h2 class="text-white">Get The Mobile Apps</h2>
          <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
          <p class="mb-0">
            <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
            <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play Store</a>
          </p>
        </div>
        <div class="col-md-6 ml-auto align-self-end">
          <img src="images/apps.png" alt="Free Website Template by Free-Template.co" class="img-fluid">
        </div>
      </div>
    </div>
  </section>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
