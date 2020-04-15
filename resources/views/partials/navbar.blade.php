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
                document.getElementById('logout-form').submit();"><i class="mdi mdi-door-open"></i><span class="mr-2 icon-lock_outline">{{ __('Logout') }}</span> </a>
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
                @auth
                <li class="has-submenu">
                    <a href="javascript:void(0)">My Account</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        @if(Auth::user() && (Auth::user()->user_type_id == 1))
                            <li><a href="/profile/{{auth()->user()->id}}">profile</a></li>
                        @else
                            @foreach(auth()->user()->companies as $company)

                                <li class="pb-1"><a href="/company/{{$company->id}}">{{$company->name}}</a></li>
                            
                            @endforeach
                            <li class="pb-1"><a href="/company">Add Company <i class="mdi mdi-add">+</i></a></li>

                        @endif
                        {{-- <li><a href="job-grid.html">Job Grid</a></li> --}}
                        {{-- <li><a href="{{route('/job')}}">Job Details</a></li> --}}
                        {{-- <li><a href="job-details-2.html">Job Details-2</a></li> --}}
                    </ul>
                </li>
                @endauth
                <li>
                </li>
               
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
    <!--end end-->
</header><!--end header-->
<!-- Navbar End -->