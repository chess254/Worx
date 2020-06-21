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
    return $user->with('seekerProfile')->first();
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

Route::get('/search', 'Api\SearchController@search');

Route::post('jobs/{job}/apply', 'Api\JobController@apply');
Route::get('applications', 'Api\JobController@applications');  

Route::post('/toggle-fav-job/{id}', 'Api\JobController@favouriteJob');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//   return $request->user();
// });

Route::post('/avatar', 'Api\ProfileController@avatar');

Route::post('/register', 'RegisterController@register');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');
