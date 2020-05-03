@extends('layouts.app')

{{-- @section('navbar')
  @include('partials.navbar')
@endsection --}}
@section('content')

<div class="back-to-home rounded d-none d-sm-block">
    <a href="{{route('home')}}" class="text-white rounded d-inline-block text-center"><i class="mdi mdi-home" style="color:white;"></i></a>
</div>

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
                                <h4 class="mb-4">{{ __('Register') }}</h4>
                            </div>
                    <form class="login-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                          <div class="col-lg-12">      
                            <div class="form-group position-relative">
                                <label for="name" class="text-dark">{{ __('Name') }}</label>

                                
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               
                            </div>
                          </div>


                          <div class="col-lg-12">      
                            <div class="form-group position-relative">
                                <label for="email" class="text-dark">{{ __('E-Mail Address') }}</label>

                                
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
                        </div>

                          <div class="col-lg-12">      
                            <div class="form-group position-relative">
                                <label for="password" class="text-dark">{{ __('Password') }}</label>

                                
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
                        </div>
                          

                            <div class="col-lg-12">
                                <div class="form-group position-relative">
                                    <label for="password-confirm" class="text-dark">{{ __('Confirm Password') }}</label>

                                    
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group position-relative">
                                    <label for="user_type" class="text-dark">{{ __('Register as') }}</label>
                                    
                                            <div class="form-button">
                                                <select style="color: orange;" class="nice-select rounded" name="user_type" required pl>
                                                    <option value="">Choose account type</option>
                                                    <option value="1">Job Seeker</option>
                                                    <option value="2">Employer</option>
                                                </select>
                                            </div>
                                    
                                </div>
                            </div>

                            <div class="col-lg-12 mb-0">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!---->
            </div> <!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</div>
</div>
</section>
@endsection
