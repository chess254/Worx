<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Worx') }}</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content="60fOUR"/>

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/materialdesignicons.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.css') }}"/>

    <!-- selectize css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/selectize.css') }}"/>

    <!--Slider-->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}"/>

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>



</head>

<body>
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<!-- Loader -->

<main>
           
    @yield('navbar')
        
    
    @yield('content')
    
</main>





<!-- footer start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 mb-0 pb-0 pb-md-2">
                <a href="javascript:void(0)"><img src="{{asset('images/logo-light.png')}}" height="70" alt=""></a>
                <p class="mt-4">At vero eos et accusamus et iusto odio dignissim os ducimus qui blanditiis
                    praesentium</p>
                <ul class="social-icon social list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-google"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <p class="text-white mb-4 footer-list-title">Useful Links</p>
                <ul class="list-unstyled footer-list">
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> About Us</a></li>
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Blog</a></li>
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Pricing</a></li>
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> CEOs </a></li>
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Agencies</a></li>
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Our Apps</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <p class="text-white mb-4 footer-list-title">Useful Links</p>
                <ul class="list-unstyled footer-list">
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Support</a></li>
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Privacy Policy</a></li>
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Terms</a></li>
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Accounting </a></li>
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Billing</a></li>
                    <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> F.A.Q.</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <p class="text-white mb-4 footer-list-title f-17">Business Hours</p>
                <ul class="list-unstyled text-foot mt-4 mb-0">
                    <li>Monday - Friday : 9:00 to 17:00</li>
                    <li class="mt-2">Saturday : 10:00 to 15:00</li>
                    <li class="mt-2">Sunday : Day Off (Holiday)</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->
<hr>
<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="">
                    <p class="mb-0 text-white">©Worx 2020.</p>
                    <small>With <i class="mdi mdi-heart text-warning"></i> from
                        60fOUR</small>  
                    </p>
                </div>
            </div>
        </div>
    </div><!--end container-->
</footer><!--end footer-->
<!-- Footer End -->

<!-- Back to top -->
<a href="#" class="back-to-top rounded text-center" id="back-to-top">
    <i class="mdi mdi-chevron-up d-block"> </i>
</a>
<!-- Back to top -->

<!-- javascript -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>

<!-- selectize js -->
<script src="{{ asset('js/selectize.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>

<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/counter.int.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>



</body>
</html>