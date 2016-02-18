<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Books;
use App\Authors;
use App\Category;
use Session;
use File;
use Antennaio\Clyde\Facades\ClydeUpload;


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
        $books = new Books;

        if ($request->hasFile('book_cover')) {
            $books->book_cover = ClydeUpload::upload($request->file('book_cover'), $request->file('book_cover')->getClientOriginalName());
        }
        $books->title       = $request->title;
        $books->author_id   = $request->author_id;
        $books->category_id = $request->category_id;
        $books->resume      = $request->resume;
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
        
        if ($request->hasFile('book_cover')) {
            $books->book_cover = ClydeUpload::upload($request->file('book_cover'), $request->file('book_cover')->getClientOriginalName());
            ClydeUpload::exists($image_name) == true ? ClydeUpload::delete($image_name) : false;
        }

        $books->title       = $request->title;
        $books->author_id   = $request->author_id;
        $books->category_id = $request->category_id;
        $books->resume      = $request->resume;
        $books->update();

        return redirect()->route('admin.books.index');
    }

    public function status($id)
    {
        $books = Books::find($id);
        $active = $books->active == true ? false : true;
        $books->update(['active' => $active]);
        return response()->json(['active' => $active]);
    }

    public function destroy($id)
    {
        $book = Books::find($id);
        ClydeUpload::exists($book->book_cover) == true ? ClydeUpload::delete($book->book_cover) : false;
        $book->delete();
        return redirect()->route('admin.books.index');
    }

}
