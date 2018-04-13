<?php

namespace App\Http\Controllers;

use App\Magazine;
use App\MagazinePage;
use Illuminate\Http\Request;

class MagazinePageController extends Controller
{
    public function store(Request $request)
    {

//        $this->validate($request,
//            ['file'=>'required|image|mimes:jpg,jpeg,png,gif']
//
//        );


        $magazine = Magazine::findOrFail($request->magazine_id);
        $image_path = null;
        $files = $request->file('file');
        $files_count = count($request->file('file'));

        if( $files_count > 0) {
            for ( $i=0; $i<$files_count; $i++) {
                $file = $files[$i];
                $file_name = uniqid().$file->getClientOriginalName();
                $destination = 'magazine_images/';
                $image_path = $destination.$file_name;
                $file->move($destination,$file_name);
                $image = new MagazinePage();
                $image->page_path = $image_path;
                $magazine->pages()->save($image);
                return redirect()->back();
            }
        } else {
            return response('Problem uploading file');
        }


        return redirect()->back();
    }

    public function destroy($id)
    {
        $magazine = MagazinePage::findOrFail($id);
        $magazine->delete();
        return redirect()->back();
    }
}
