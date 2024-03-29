<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\Support\MediaStream;
use App\Application;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Auth;

class DownloadController extends Controller
{

    public function downloadSingle( Media $media)
    {   //convert profile to pdf..  

        // dd($media);
        if(auth()->check() && auth()->user()->user_type_id == 2){
            // this also works, can be used to download a zip with multiple files
        //  return MediaStream::create('single.zip')->addmedia($media,$media);
        return $media;
        }
        return redirect()->route('home');
    }

    //download multiple files
    public function download(Application $application)
    {

         // Let's get some media.
         if(auth()->check() && auth()->user()->user_type_id == 2){
            $downloads = $application->getMedia('document');
    
            // Download the files associated with the media in a streamed way.
            // No prob if your files are very large.
            return MediaStream::create('my-files.zip')->addMedia($downloads);
         }

         return redirect()->back()->with('message', 'unauthorized');
    }
}
