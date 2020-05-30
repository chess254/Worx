<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\County;
use App\User;
use App\SeekerProfile;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\UserController;

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
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {  //adds '\Api' before each controller in group
    
    Route::apiResource('jobs', 'JobController');
    Route::apiResource('companies', 'CompanyController');
});

Route::middleware('auth:sanctum')->get('/init', 'HomeController@getJobFunctionsCertificateBizStreamLists');

Route::get('/counties', function(){
  return response()->json(County::all(), 200);
});

Route::get('users/{id}', 'Api\UserController@show');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//   return $request->user();
// });

Route::post('/register', 'RegisterController@register');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');
