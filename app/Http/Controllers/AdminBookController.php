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
use Image;

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

        $all_categories = Category::get(['id','name'])->all();
        array_map(function($category){
            $this->categories[$category->id] = $category->name;
        },$all_categories);

        $authors = $this->options;
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

        
        

        // dump( $request->title );
        // dump( $request->author );
        // dump( $request->category );
        // dump( $request->resume );
        // dump( $photo->getClientOriginalName() );

        // //dd( $request->all() );
        // $books = new Books();
        // $books->create([
        //     'title' => $request->title,
        //     'author_id' => $request->author,
        //     'category_id' => $request->category,
        //     'resume' => $request->resume,
        //     'book_cover' => $photo->getClientOriginalName()


        // ]);

        return redirect()->back();
        
        
        




        // $photo = $request->file('book_cover');
        // $destinationPath = base_path() . '/public/uploads/images/';
        
        // $photo->move($destinationPath, $photo->getClientOriginalName());
        // ORIGINAL EXTENSION = $photo->getClientOriginalExtension()

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
