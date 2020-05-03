@extends('layouts.app')
<!-- Loader -->
@section('content')
<div class="back-to-home rounded d-none d-sm-block">
    <a href="{{route('home')}}" class="text-white rounded d-inline-block text-center"><i class="mdi mdi-home" style="color:white;"></i></a>
</div>

<!-- Hero Start -->
<section class="vh-100" style="background: url('images/cta-bg.jpg') center center;">

    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        @if (session()->has('message'))
                            <div class="alert alert-warning">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="login-page bg-white shadow rounded p-4">
                            <div class="text-center">
                                <h4 class="mb-4">{{ __('Login') }}</h4>
                            </div>
                            <form class="login-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group position-relative">
                                            <label class="text-dark" for="email">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email"value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group position-relative">
                                            <label class="text-dark" for="password">{{ __('Password') }} </label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        @if (Route::has('password.request'))
                                            <p class="float-right forgot-pass">
                                                <a href="{{ route('password.request') }}" class="text-dark font-weight-bold">{{ __('Forgot Your Password?') }}</a></p>
                                        @endif
                                        <div class="form-group">
                                            <div class="custom-control m-0 custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="remember"><small>{{ __('Remember Me') }}</small></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-0">
                                        <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                                    </div>
                                    <div class="col-lg-12 mt-4 text-center">
                                        <h6>Or Login With</h6>
                                        <ul class="list-unstyled social-icon mb-0 mt-3">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                    class="mdi mdi-facebook" title="Facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                    class="mdi mdi-google-plus" title="Google"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                    class="mdi mdi-github-circle" title="Github"></i></a></li>
                                        </ul><!--end icon-->
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="mb-0 mt-3">
                                            <small class="text-dark mr-2">Don't have an account ?</small>
                                            <a href="{{route('register')}}" class="text-dark font-weight-bold">Sign Up</a></p>
                                    </div>
                                </div>
                            </form>
                        </div><!---->
                    </div> <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </div>
    </div>
</section><!--end section-->
<!-- Hero End -->
@endsection
<!-- javascript -->
{{-- <script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/plugins.js"></script>

<!-- selectize js -->
<script src="js/selectize.min.js"></script>

<script src="js/jquery.nice-select.min.js"></script>

<script src="js/app.js"></script>
</body>
</html> --}}