<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="60fOUR" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}
{{-- 
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}" ></script>
    <script src="{{ asset('js/stickyfill.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}" ></script>

    <script src="{{ asset('js/jquery.waypoints.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}" ></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" ></script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}" ></script>

    <script src="{{ asset('js/custom.js') }}" ></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom-bs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/line-icons/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="top">
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="site-wrap">

<!-- NAVBAR -->

    <!-- HOME -->
        {{-- <section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="mb-5 text-center">
                            <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur perferendis.</p>
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

        </section> --}}











        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        {{-- <main class="py-4"> --}}
        <main>
            @yield('content')
        </main>

        {{-- <div class="py-4"></div> --}}
    <footer class="site-footer">

            <a href="#top" class="smoothscroll scroll-top">
              <span class="icon-keyboard_arrow_up"></span>
            </a>
      
            <div class="container">
              <div class="row mb-5">
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                  <h3>Search Trending</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Graphic Design</a></li>
                    <li><a href="#">Web Developers</a></li>
                    <li><a href="#">Python</a></li>
                    <li><a href="#">HTML5</a></li>
                    <li><a href="#">CSS3</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                  <h3>Company</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Resources</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                  <h3>Support</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                  <h3>Contact Us</h3>
                  <div class="footer-social">
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-instagram"></span></a>
                    <a href="#"><span class="icon-linkedin"></span></a>
                  </div>
                </div>
              </div>
      
              <div class="row text-center">
                <div class="col-12">
                  <p class="copyright"><small>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="#" target="_blank" >60fOUR</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>
                </div>
              </div>
            </div>
    </footer>

   
    </div>

    {{-- scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}" ></script>
    <script src="{{ asset('js/stickyfill.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}" ></script>

    <script src="{{ asset('js/jquery.waypoints.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}" ></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" ></script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}" ></script>

    <script src="{{ asset('js/custom.js') }}" ></script>
    

    
</body>
</html>
