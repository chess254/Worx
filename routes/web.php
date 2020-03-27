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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController@index') ->name('about');

Route::get('/jobs', 'JobsController@index')->name('jobs');


Route::get('/job/{job}', 'JobsController@show');

Route::get('/post','JobsController@create')->name('create-job')->middleware('auth');;
