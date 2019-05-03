<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AlbumsController extends Controller
{
    public function index()
    {
        return view('albums.index');
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
             'name' => 'required',
             'cover_image' => 'image|max:2048',
        ]);
        
        $file = $request->file('cover_image');
        
        // Get filename with extension.
        $fileNameWithExt = $file->getClientOriginalName();
        
        // Get just the filename.
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // Get the file extension.
        $extension = $file->getClientOriginalExtension();
        
        // Create new filename.
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        // upload image
        $path = $file->storeAs('public/album_covers', $fileNameToStore);

        return $path;

        /*
            //Display File Name
            echo 'File Names: '.$file->getClientOriginalName();
            echo '<br>';
            //Display File Extension
            echo 'File Extension: '.$file->getClientOriginalExtension();
            echo '<br>';
            //Display File Real Path
            echo 'File Real Path: '.$file->getRealPath();
            echo '<br>';
            //Display File Size
            echo 'File Size: '.$file->getSize();
            echo '<br>';
            //Display File Mime Type
            echo 'File Mime Type: '.$file->getMimeType();

            //Move Uploaded File This will also work
            // $destinationPath = 'uploads';
            // $file->move($destinationPath,$file->getClientOriginalName());

        */

        
        
    }
}
