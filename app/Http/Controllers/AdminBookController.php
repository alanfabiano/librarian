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



class AdminBookController extends Controller
{
    
    public function index()
    {
        $books = Books::orderBy('id', 'desc')->paginate(16);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $all_authors = Authors::get(['name','id'])->all();
        array_map(function($author){
            $this->options[$author->id] = $author->name;
        },$all_authors);
        $authors = $this->options;

        $all_categories = Category::get(['name','id'])->all();
        array_map(function($category){
            $this->categories[$category->id] = $category->name;
        },$all_categories);
        $categories = $this->categories;
        return view('admin.books.create', compact('authors','categories'));
    }

    public function store(BookRequest $request)
    {
        $photo = $request->file('book_cover');
        $img = Image::make($photo);
        $destinationPath = base_path() . '/public/uploads/images/';
        $img->save($destinationPath.$photo->getClientOriginalName());
        $img->fit(260, 330);
        $img->save($destinationPath.'thumb_'.$photo->getClientOriginalName());

        $books = new Books;
        $books->title       = $request->title;
        $books->author_id   = $request->author;
        $books->category_id = $request->category;
        $books->resume      = $request->resume;
        $books->book_cover  = $photo->getClientOriginalName();

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
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, $id)
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
