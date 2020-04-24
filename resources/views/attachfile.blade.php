@extends('layouts.app')

@section('navbar')
    @include('partials.navbar')
@endsection

@section('content')

<div class="row mt-4" id="rowEXP">
    <div class="col-lg-12 mt-4 pt-2">
        
    <div style="display: flex; justify-content: space-between;">
    <h4 class="text-dark">Experience :</h4>
    
        <button class="btn btn-sm btn-info " data-toggle="modal" data-target="#addExpModal">Add entry</button>
    
</div>
    </div>
</div>

 {{--  modal --}}
 <div class="modal fade" id="addExpModal" tabindex="-1" role="dialog" aria-labelledby="addExpModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">Add Experience Entry</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="add-expirience-entry-success-msg" class="hide">
            <div class="alert alert-info alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <strong>Success!</strong> Check your mail for login confirmation!!
            </div>
        </div>

        <form  action=""method="post" id="addExperienceEntryForm">
            @csrf
          <div class="modal-body">
            <div class="form-group has-feedback"> 
                <label for="add_company">Company</label>
                <input value="" type="text" class="form-control"  name="add_company_name" id="add_company_name" required="true" >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                        <strong id="name-error"></strong>
                    </span>
            </div>
           <div class="form-group has-feedback">   
                <label for="add_job_title">Job Title</label>
                <input value="" type="text" class="form-control" required="true"  name="add_job_title" id="add_job_title" >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                        <strong id="name-error"></strong>
                    </span>
                </div>
            <div class="form-group has-feedback">
                <label for="add_job_city">Website</label>
                <input value="" type="text" class="form-control" required="true"  name="add_website" id="add_website" >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                        <strong id="name-error"></strong>
                    </span>
                </div>
            <div class="form-group has-feedback">
                <label for="add_job_city">City</label>
                <input value="{{old('add_job_city')}}" type="text" class="form-control" required="true"  name="add_job_city" id="add_job_city" >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                        <strong id="name-error"></strong>
                    </span>
                </div>
            <div class="form-group has-feedback">
                <label for="add_job_county">County</label>
                <input value="{{old('add_job_county')}}" type="text" class="form-control" required="true"  name="add_job_county" id="add_job_county" >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                        <strong id="name-error"></strong>
                    </span>
                </div>
            <div class="form-group has-feedback">
                <label for="add_job_country">Country</label>
                <input value="{{old('add_job_country')}}" type="text" class="form-control" required="true"  name="add_job_country"= id="add_job_country" >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                        <strong id="name-error"></strong>
                    </span>
                </div>
            <div class="form-group has-feedback">
                <label for="add_start_date">Start Date</label>
                <input value="{{old('add_start_date')}}" type="date" class="form-control" required="true" name="add_start_date" id="add_start_date" >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                        <strong id="name-error"></strong>
                    </span>
                </div>
            <div class="form-group has-feedback"> 
                <label for="add_end_date">End Date</label>
                <input value="{{old('add_end_date')}}" type="date" class="form-control" required="true" name="add_end_date" id="add_end_date" >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                        <strong id="name-error"></strong>
                    </span>
                </div>
          <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Add</button>

            {{-- <button type="button" id="submitAddExperienceEntry" class="btn btn-success">Add</button> --}}
          </div>
          </div>
        </form>
      </div>
    </div>
</div>


@endsection