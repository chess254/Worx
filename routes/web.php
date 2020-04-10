<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('search', 'JobsController@index')->name('search');
Route::post('search', 'HomeController@search')->name('search');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController@index') ->name('about');

Route::get('/jobs', 'JobsController@index')->name('jobs');


Route::get('/job/{job}', 'JobsController@show');

Route::get('/post','JobsController@create')->name('create-job')->middleware('auth');

Route::post('/post','JobsController@store');

Route::get('/profile', 'ProfileController@index');
Route::get('/profile/{user_id}', 'ProfileController@show');
Route::post('/profile/{user_id}', 'ProfileController@update');

Route::get('/company/{company}', 'CompanyController@show');
Route::get('/company-profile/{company}', 'CompanyController@view');

