<!-- NAVBAR -->
<header class="site-navbar mt-3">
    <div class="container-fluid">
    <div class="row align-items-center">
        <div class="site-logo col-6"><a href="#">{{ config('app.name', 'Worx') }}</a></div>

        <nav class="mx-auto site-navigation">
        <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
            <li><a href="{{ route('home') }}" class="nav-link active">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li class="has-children">
            <a href="{{ route('jobs') }}">Job Listings</a>
            <ul class="dropdown">
                {{-- <li><a href="{{ route('job') }}">Job Single</a></li> --}}
                <li><a href="{{ route('create-job') }}">Post a Job</a></li>
            </ul>
            </li>
            <li class="has-children">
            <a href="services.html">Pages</a>
            <ul class="dropdown">
                <li><a href="services.html">Services</a></li>
                <li><a href="service-single.html">Service Single</a></li>
                <li><a href="blog-single.html">Blog Single</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="portfolio-single.html">Portfolio Single</a></li>
                <li><a href="testimonials.html">Testimonials</a></li>
                <li><a href="faq.html">Frequently Ask Questions</a></li>
                <li><a href="gallery.html">Gallery</a></li>
            </ul>
            </li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a></li>
            <li class="d-lg-none"><a href="login.html">Log In</a></li>
        </ul>
        </nav>
        
        <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
        <div class="ml-auto">
            {{-- <a href="post-job.html" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a> --}}
            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Register</a>
                @endif
            @else
                <a href="#" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-check"></span> Welcome {{ Auth::user()->name }}!! </a>

                <a href="{{ route('logout') }}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><span class="mr-2 icon-lock_outline"></span>{{ __('Logout') }} </a>

        

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            
            @endguest

        </div>
        <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>

        
       

        

        </div>

    </div>
    </div>
</header>