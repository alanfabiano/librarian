<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Books;
use App\Authors;
use App\Category;
use Image;
use Session;
use File;

class AdminBookController extends Controller
{
    
    public function index()
    {
        $books = Books::orderBy('id', 'desc')->paginate(16);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        
        $categories = Category::get_form_list();
        $authors = Authors::get_form_list();
        return view('admin.books.create', compact('authors','categories'));
    }

    public function store(BookRequest $request)
    {
        $photo = $request->file('book_cover');
        $image_name = '';
        if(count($request->files) > 0)
        {
            $img = Image::make($photo);
            $destinationPath = base_path() . '/public/uploads/images/';
            $img->save($destinationPath.$photo->getClientOriginalName());
            $img->fit(260, 330);
            $img->save($destinationPath.'thumb_'.$photo->getClientOriginalName());
            $image_name = $photo->getClientOriginalName();
        }

        $books = new Books;
        $books->title       = $request->title;
        $books->author_id   = $request->author_id;
        $books->category_id = $request->category_id;
        $books->resume      = $request->resume;
        $books->book_cover  = $image_name;
        $books->save();

        return redirect()->route('admin.books.index');

    }

    public function show($id)
    {
        return 'show';
    }

    public function edit($id)
    {
        $book = Books::find($id);
        $categories = Category::get_form_list();
        $authors = Authors::get_form_list();
        return view('admin.books.edit', compact('book','categories','authors'));
    }

    public function update(BookRequest $request, $id)
    {
        
        $books = Books::find($id);
        $image_name = $books->book_cover;

        if(count($request->files) > 0)
        {
            $photo = $request->file('book_cover');
            $img = Image::make($photo);
            $destinationPath = base_path() . '/public/uploads/images/';
            $img->save($destinationPath.$photo->getClientOriginalName());
            $img->fit(260, 330);
            $img->save($destinationPath.'thumb_'.$photo->getClientOriginalName());
            File::delete(base_path() .'/public/uploads/images/'.$image_name);
            File::delete(base_path() .'/public/uploads/images/thumb_'.$image_name);
            $image_name = $photo->getClientOriginalName();
            
        }
        $books->title       = $request->title;
        $books->author_id   = $request->author_id;
        $books->category_id = $request->category_id;
        $books->resume      = $request->resume;
        $books->book_cover  = $image_name;
        $books->update();

        return redirect()->route('admin.books.index');
    }

    public function update_status()
    {
        if($request->type == 'status')
        {
            $books = Books::find($id);
            $active = $books->active == true ? false : true;
            $books->update(['active' => $active]);
            
            return response()->json(['active' => $active]);
        }
    }

    public function destroy($id)
    {
        Books::find($id)->delete();
        return redirect()->route('admin.books.index');
    }

}
