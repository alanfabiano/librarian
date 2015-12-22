<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Authors;

class AuthorsController extends Controller
{
    
    public function index($page = null)
    {
        $authors = Authors::paginate(20);
        return view('authors.index', compact('authors'));
    }

    public function profile($slug)
    {
        $authors = Authors::findBySlug($slug);
        return view('authors.profile', compact('authors'));
    }
}
