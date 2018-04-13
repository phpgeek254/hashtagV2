<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\images;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //

        $gallery = Gallery::findOrFail($request->gallery_id);
        $image_path = null;
        $files = $request->file('file');
        $files_count = count($request->file('file'));

        if( $files_count > 0) {
            for ( $i=0; $i<$files_count; $i++) {
                $file = $files[$i];
                $destination = 'gallery/';
                $file_name = uniqid().$file->getClientOriginalName();
                $image_path = $destination.$file_name;
                $file->move($destination,$file_name);

                $image = new images();
                $image->image_path = $image_path;
                $gallery->images()->save($image);
                return redirect()->back();
            }
        } else {
            return response('Problem');
        }

    }

    public function compress($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }

    public function destroy($id)
    {
        //
        $image = Images::findOrFail($id);
        $image->delete();
        return redirect()->back();
    }
}
