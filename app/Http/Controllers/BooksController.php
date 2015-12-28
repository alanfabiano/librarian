<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Books;
use App\Category;

class BooksController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $books = Books::paginate(16);
        return view('books.index', compact('books','categories'));
    }

    public function show($slug)
    {
        $book = Books::findBySlug($slug);
        return view('books.details', compact('book'));
    }

    public function category($slug)
    {
        $Category   = Category::findBySlug($slug);
        $books      = Books::where('category_id','=',$Category->id)->paginate(12);
        $categories = Category::all();

        return view('books.category', compact('books','Category','categories'));
    }

    public function categories()
    {
        $Categories = Category::all();
        return view('books.categories', compact('Categories'));
    }
}
