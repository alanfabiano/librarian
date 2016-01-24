<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Books;

class AdminBookController extends Controller
{
    
    public function index()
    {
        $books = Books::orderBy('id', 'desc')->paginate(16);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        return 'store';
    }

    public function show($id)
    {
        return 'show';
    }

    public function edit($id)
    {
        return 'formulário de edição';
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
