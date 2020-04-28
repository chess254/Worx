<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('search', 'JobsController@index')->name('search');
Route::post('search', 'HomeController@search')->name('search');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController@index') ->name('about');

Route::get('/jobs', 'JobsController@index')->name('jobs');


Route::get('/job/{job}', 'JobsController@show');
Route::post('/job/{job}/apply', 'JobsController@apply');
Route::post('/job/attachfiles', 'JobsController@attachFiles')->name('job.attach');  

Route::get('/job','JobsController@create')->name('create-job')->middleware('auth');

Route::get('/sendemail', 'JobsController@enqueue');

Route::post('/job','JobsController@store');
Route::get('/my-jobs','JobsController@jobsPostedby')->name('myjobs');
Route::get('/applications/{user_id}','JobsController@applications');
Route::get('/applications-by-job/{job_id}','JobsController@applicationsByJob');

Route::get('/profiles', 'ProfileController@index');
Route::get('/profile', 'ProfileController@create');
Route::post('/profile', 'ProfileController@store');
Route::get('/profile/{user_id}', 'ProfileController@show')->name('profile.show');
Route::post('/profile/{user_id}', 'ProfileController@update');

Route::get('/download/{application}', 'DownloadController@download')->name('download');
Route::get('/download-one/{media}', 'DownloadController@downloadSingle')->name('downloadone');

Route::get('/company/{company}', 'CompanyController@show');
Route::get('/company', 'CompanyController@create')->name('company.create');
Route::post('/company', 'CompanyController@store');
Route::get('/company-profile/{company}', 'CompanyController@view');

Route::delete('exp/{id}', function ($id) {
    
});

Route::get('/attach', function(){
    return view('attachfile');
});

Route::post('/attach', function(Request $request){

    // $validation = $request->validate([
    //     // 'photo' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
    //     // for multiple file uploads
    //     // 'photo.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
    // ]);
    // cache the file
    $file = $request->file('photo');

    // generate a new filename. getClientOriginalExtension() for the file extension
    $filename = 'attachment-user' . time() . '.' . $file->getClientOriginalExtension();

    // save to storage/app/photos as the new $filename
    // $path = $file->storeAs('photos', $filename);
    $paths  = [];

    foreach ($photos as $photo) {
        $extension = $photo->getClientOriginalExtension();
        $filename  = 'profile-photo-' . time() . '.' . $extension;
        $paths[]   = $photo->storeAs('photos', $filename);
    }
    dd($path);
});

