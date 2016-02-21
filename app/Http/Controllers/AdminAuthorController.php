<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Http\Controllers\Controller;
use App\Authors;
use Antennaio\Clyde\Facades\ClydeUpload;

class AdminAuthorController extends Controller
{
    
	public function index()
    {
        $authors = Authors::orderBy('id', 'desc')->paginate(16);
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(AuthorRequest $request)
    {
        $authors = new Authors;

        if ($request->hasFile('photo')) {
            $authors->photo = ClydeUpload::upload($request->file('photo'), $request->file('photo')->getClientOriginalName());
        }
        $authors->name      = $request->name;
        $authors->biography = $request->biography;
        $authors->save();
        return redirect()->route('admin.authors.index');
    }

    public function show($id)
    {
        return 'show';
    }

    public function edit($id)
    {
        $author = Authors::find($id);
        return view('admin.authors.edit', compact('author'));
    }

    public function update(AuthorRequest $request, $id)
    {
        $authors = Authors::find($id);
        $image_name = $authors->photo;
        
        if ($request->hasFile('photo')) {
            $authors->photo = ClydeUpload::upload($request->file('photo'), $request->file('photo')->getClientOriginalName());
            ClydeUpload::exists($image_name) == true ? ClydeUpload::delete($image_name) : false;
        }

        $authors->name     = $request->name;
        $authors->biography = $request->biography;
        $authors->update();
        return redirect()->route('admin.authors.index');
    }

    public function status($id)
    {
        $author = Authors::find($id);
        $active = $author->active == true ? false : true;
        $author->update(['active' => $active]);
        return response()->json(['active' => $active]);
    }

    public function destroy($id)
    {
        $author = Authors::find($id);
        ClydeUpload::exists($author->photo) == true ? ClydeUpload::delete($author->photo) : false;
        $author->delete();
        return back();
    }

}
