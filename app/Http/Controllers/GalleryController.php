<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index(Gallery $gallery)
    {
        $gallerys = $gallery->with('images')->orderByDesc('created_at')->paginate(8);
        return view('gallery.index', compact('gallerys'));
    }


    public function create()
    {
        return view('gallery.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
           'gallery_name'=>'required',
        ]);
        Gallery::create($request->all());
        return redirect('/gallerys');
    }


    public function show(Gallery $gallery)
    {
        //
        $gallery->with('images');
        $images = $gallery->images;
        return view('gallery.show', compact('gallery', 'images'));
    }


    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.edit', compact('gallery'));
    }


    public function update(Request $request, $id)
    {
        //
        $gallery = Gallery::findOrFail($id);
        //validations
        $this->validate($request, []);
        $gallery->update($request->all());
        return redirect('/gallery');
    }


    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->images()->delete();
        $gallery->delete();
        return redirect('/gallerys');
    }
}
