<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\Support\MediaStream;
use App\Application;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DownloadController extends Controller
{

    public function downloadSingle(Media $media)
    {
        //refactor this
        // $mediaItem = $application->getmedia('document');
       return Application::find($media)->getMedia('document');
    }

    // public function show(Media $mediaItem)
    // {
    //     return response()->download($mediaItem->getPath(), $mediaItem->file_name);
    // }

    //download multiple files
    public function download(Application $application)
    {
         // Let's get some media.
         $downloads = $application->getMedia('document');
 
         // Download the files associated with the media in a streamed way.
         // No prob if your files are very large.
         return MediaStream::create('my-files.zip')->addMedia($downloads);
    }
}
