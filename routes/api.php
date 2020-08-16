<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\County;
use App\User;
use App\SeekerProfile;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\JobController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  $user =User::where('id',auth()->user()->id);
  // $userRole = $user->user_type_id->get();
  // dd($user);
  // $user->user_type_id = $user->user_type_id == 1 ? 'candidate' : $user->user_type_id == 2 ? 'employer' : 'guest';
  // $user->userRole = $userRole;
    return $user->with('seekerProfile')->first();
    // return response()->json($user->user_type_id);
    // $seekerProfile = $user->seekerProfile();

    

    
    // return $seekerProfile->with('experienceDetails', 'educationDetails')->first();

  });

Route::group(['namespace' => 'Api'], function () {  //adds '\Api' before each controller in group
    
    Route::apiResource('jobs', 'JobController');
    Route::apiResource('companies', 'CompanyController');
    Route::apiResource('profiles', 'ProfileController');
});

Route::middleware('auth:sanctum')->get('/init', 'HomeController@getJobFunctionsCertificateBizStreamLists');

Route::get('/counties', function(){
  return response()->json(County::all(), 200);
});

Route::get('users/{id}', 'Api\UserController@show');

Route::get('/profile', 'Api\ProfileController@profile');

Route::post('edit-experience/{id}', 'Api\ExperienceDetailsController@update');
Route::post('edit-education/{id}', 'Api\EducationDetailsController@update');
Route::delete('education/{id}', 'Api\EducationDetailsController@destroy');
Route::delete('experience/{id}', 'Api\ExperienceDetailsController@destroy');

Route::get('/search', 'Api\SearchController@search');

Route::post('jobs/{job}/apply', 'Api\JobController@apply');
Route::get('applications', 'Api\JobController@applications');  //{job?} an optional parameter
Route::get('applications/{id}', 'Api\JobController@applicationsByJob');
Route::post('shortlist/{id}', 'Api\ApplicationController@shortlist');
Route::post('application/{id}/status', 'Api\ApplicationController@status');
Route::get('groupemail/{job}', 'Api\ApplicationController@sendShortlistEmail');

Route::post('/toggle-fav-job/{id}', 'Api\JobController@favouriteJob');
Route::get('/favourite-jobs', 'Api\JobController@favouriteJobs');
Route::get('/my-jobposts', 'Api\JobController@myJobPosts');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//   return $request->user();
// });

Route::post('/avatar', 'Api\ProfileController@avatar');
Route::post('/logo/{company_id}', 'Api\CompanyController@avatar');

Route::post('/register', 'RegisterController@register');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');
