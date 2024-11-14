<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'published_year' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'genre' => 'required|string|max:255',
        ]);

        $book = Book::create($request->all());
        return redirect()->route('book.list')->with('success', 'Книга успешно добавлена!');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'string|max:255',
            'author' => 'string|max:255',
            'published_year' => 'integer',
            'genre' => 'string|max:255',
        ]);

        $book->update($request->all());
        return response()->json($book);
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

//        return response()->json(null, 204);
        return redirect()->route('book.list');
    }

    public function list()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }
}
