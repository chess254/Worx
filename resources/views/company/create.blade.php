@extends('layouts.app')
@section('navbar')
  @include('partials.navbar')
@endsection

@section('content')


<!-- Start home -->
<section class="bg-half page-next-level">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center text-white">

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <h1 class="display-3">Company create page form here</h1>

                    {{-- <h4 class="text-uppercase title mb-4">Create Resume</h4> --}}
                    <ul class="page-next d-inline-block mb-0">
                        <li><a href="index.html" class="text-uppercase font-weight-bold">Home</a></li>
                        <li><a href="#" class="text-uppercase font-weight-bold">Pages</a></li>
                        <li><a href="#" class="text-uppercase font-weight-bold">Candidates</a></li>
                        <li>
                            <span class="text-uppercase text-white font-weight-bold">Creat Resume</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
</section>
@endsection