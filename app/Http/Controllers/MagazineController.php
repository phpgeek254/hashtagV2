<?php

namespace App\Http\Controllers;
use App\Magazine;
use Illuminate\Http\Request;

class MagazineController extends Controller
{

    public function index(Magazine $magazine)
    {
        $magazines = $magazine->with('pages')->orderByDesc('id')->get();
        return view('magazine.index', compact('magazines'));
    }


    public function create()
    {
        return view('magazine.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'magazine_name'=>'required'
        ));
        $magazine = new Magazine();

        $magazine->create($request->all());
        return redirect('/magazine');
    }


    public function show($id)
    {
        $magazine = Magazine::findOrFail($id);
        return view('magazine.show', compact('magazine'));
    }


    public function edit($id)
    {
        $magazine = Magazine::findOrFail($id);
        return view('magazine.edit', compact('magazine'));

    }


    public function update(Request $request, $id)
    {
        $magazine = Magazine::findOrFail($id);
        $magazine->update($request->all());
        return redirect()->back();
    }


    public function destroy($id)
    {
        $magazine = Magazine::findOrFail($id);
        $magazine->delete();
        return redirect()->back();
    }
}
