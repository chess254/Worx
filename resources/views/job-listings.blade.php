@extends('layouts.app')


@section('navbar')
  @include('partials.navbar')
@endsection
@section('content')

    <section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">

        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
              <div class="mb-5 text-center">
                <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, quas fugit ex!</p>
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
  

      <section class="site-section" id="next">
        <div class="container">
  
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="section-title mb-2">{{$totalJobs}} Jobs Listed</h2>
            </div>
          </div>
          
          <ul class="job-listings mb-5">
              @foreach ($joblist as $job)
                

                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                <a href="/job/{{$job->id}}"></a>
                    <div class="job-listing-logo">
                        <img src="images/job_logo_1.jpg" alt="Image" class="img-fluid">
                    </div>
    
                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2>{{$job->title}}</h2><br>
                            <strong>{{$job->company['name']}}</strong>
                        </div>
                        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                          <span class="icon-room"></span> {{$job->town}}, <br>{{$job->county['county_name']}}, {{$job->location['country']}} 
                        </div>
                        <div class="job-listing-meta">
                          @if ( $job->type['job_type'] == "Part Time" )
                            <span class="badge badge-secondary">Part Time</span>
                          @elseif( $job->type['job_type'] == "Full Time" )
                            <span class="badge badge-success">Full Time</span>
                          @else
                            <span class="badge badge-info">Remote</span>
                          @endif
                          <br>
                          <small >{{ $job->created_date }}</small>
                        </div>
                    </div>
                
                </li> 
              @endforeach

 
            
          </ul>
          {{ $joblist->links() }}
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
@endsection