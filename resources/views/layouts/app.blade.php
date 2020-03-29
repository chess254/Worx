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
    {{-- <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script> --}}
    <!-- Fonts -->

    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom-bs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/line-icons/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/quill.snow.css"> 
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 

   

</head>
<body id="top">
    {{-- <div id="top"> --}}
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="site-wrap">



    

        {{-- <main class="py-4"> --}}
    <main>
           
        @yield('navbar')
            
        
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
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}" ></script>
    <script src="{{ asset('js/stickyfill.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}" ></script>

    <script src="{{ asset('js/jquery.waypoints.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}" ></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" ></script>
    <script src="{{ asset('js/quill.min.js') }}" ></script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}" ></script>
    <script src="{{ asset('js/custom.js') }}" ></script>



    {{-- <script>

        // var form = document.querySelector('form');
        // form.onsubmit = function() {
        //   // Populate hidden form on submit
        //   console.log("submitting form");
        //   var desc = document.querySelector('input[name=description]');
        //   desc.value = JSON.stringify(description.getContents());
          
        //   console.log("Submitted", $(form).serialize(), $(form).serializeArray());
          
        //   // No back end to actually submit to!
        //   alert('Open the console to see the submit data!')
        //   return false;
        // };

        function testing(){
           
        alert("what the f is happening");
        
        }
        
            </script> --}}

    
    

    
</body>
</html>
