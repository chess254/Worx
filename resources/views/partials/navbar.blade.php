<!-- Navigation Bar-->
<header id="topnav" class="defaultscroll scroll-active">
    <!-- Menu Start -->
    <div class="container">
        <!-- Logo container-->
        <div>
            <a href="{{route('home')}}" class="logo">
                <img src="{{ asset('images/logo-light.png') }}" alt="" class="logo-light" height="30"/>
                <img src="{{ asset('images/logo-dark.png') }}" alt="" class="logo-dark" height="30"/>
            </a>
        </div>

        @guest
            <div class="buy-button">
                <a href="{{ route('login') }}" class="btn btn-warning-outline btn-sm"><i class="mdi mdi-account-key"></i>
                    <span>Login</span></a>
            </div><!--end job seeker button-->

            @if (Route::has('register'))
            <div class="buy-button">
                <a href="{{ route('register') }}" class="btn btn-warning-outline btn-sm"><i class="mdi mdi-account-key"></i>
                    <span>Register</span></a>
            </div><!--end job seeker button-->
            @endif
            @else
            <div class="buy-button">
                <a href="#" class="btn btn-warning btn-sm"><i class="mdi mdi-account-key"></i>
                    <span>Hi, {{ Auth::user()->name }} </span></a>
            </div>
            <div class="buy-button">
                <a href="{{ route('logout') }}" class="btn btn-light-outline btn-sm" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="mdi mdi-account-key"></i><span class="mr-2 icon-lock_outline"></span>{{ __('Logout') }} </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest

        @if(Auth::user() && Auth::user()->user_type_id == 1)
            <div class="buy-button">
                <a href="{{route('create-job')}}" class="btn btn-warning-outline btn-sm"><i class="mdi mdi-briefcase-upload"></i>
                    <span>Employer</span></a>
            </div><!--end employer button-->
        @elseif(Auth::user() && Auth::user()->user_type_id == 2)
            <div class="buy-button">
                <a href="{{route('create-job')}}" class="btn btn-warning-outline btn-sm"><i class="mdi mdi-briefcase-upload"></i>
                    <span>Post Job</span></a>
            </div>
        @endif
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="has-submenu">
                    <a href="javascript:void(0)">Jobs</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{route('jobs')}}">Job List</a></li>
                        {{-- <li><a href="job-grid.html">Job Grid</a></li> --}}
                        {{-- <li><a href="{{route('/job')}}">Job Details</a></li> --}}
                        {{-- <li><a href="job-details-2.html">Job Details-2</a></li> --}}
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="about.html">About us</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="faq.html">Faqs</a></li>
                        <li><a href="pricing.html">Pricing plans</a></li>
                        <li class="has-submenu"><a href="javascript:void(0)"> Candidates</a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="candidates-listing.html">Candidates Listing</a></li>
                                <li><a href="candidates-profile.html">Candidates Profile</a></li>
                                <li><a href="create-resume.html">Create Resume</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu"><a href="javascript:void(0)"> Blog</a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="blog-grid.html">Blogs</a></li>
                                <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu"><a href="javascript:void(0)"> Employers</a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="employers-list.html">Employers List</a></li>
                                <li><a href="company-detail.html">Company Detail</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu"><a href="javascript:void(0)"> User Pages</a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="login.html">Login</a></li>
                                <li><a href="signup.html">Signup</a></li>
                                <li><a href="recovery_passward.html">Forgot Password</a></li>
                            </ul>
                        </li>
                        <li><a href="components.html"> Components</a></li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">contact</a>
                </li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
    <!--end end-->
</header><!--end header-->
<!-- Navbar End -->