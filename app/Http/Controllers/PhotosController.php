<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;


class PhotosController extends Controller
{
    public function create($album_id)
    {
        return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
             'title' => 'required',
             'photo' => 'image|max:2048',
        ]);
        
        $file = $request->file('photo');
        
        // Get filename with extension.
        $fileNameWithExt = $file->getClientOriginalName();
        
        // Get just the filename.
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // Get the file extension.
        $extension = $file->getClientOriginalExtension();
        
        // Create new filename.
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        // upload image
        $path = $file->storeAs('public/photos/'.$request->input('album_id'), $fileNameToStore);

        // Create album
        $photo = new Photo;
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $fileNameToStore;
        $photo->save();
        return redirect('/albums/'.$request->input('album_id'))->with('success','Photo Uploaded');

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

    public function show($id)
    {
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        if (Storage::delete('public/photos/'. $photo->album_id.'/'.$photo->photo)) {
            $photo->delete();
            return redirect('/')->with('success', 'Photo Deleted');
        }
    }


}
