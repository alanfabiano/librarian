<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Books;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::paginate(16);
        return view('books.index', compact('books'));
    }

    public function show($slug)
    { 
        $book = Books::findBySlug($slug);
        return view('books.details', compact('book'));
    }
}
