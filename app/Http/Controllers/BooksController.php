<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', [
            'books' => Book::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $input = $request->only(['title', 'author']);

        Book::create($input);

        return redirect()->route('books.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $input = $request->only(['title', 'author', 'read_at']);

        $book->update($input);

        return redirect()->route('books.index')->with('alert', "'{$input['title']}' has been saved.");;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteBookRequest $request, Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('alert', "'$book->title' has been deleted.");
    }

    /**
     * Mark a book as read or remove that mark.
     */
    public function toggleRead(Request $request)
    {
        $book = Book::findOrFail($request->input('id'));

        $book->read_at = $request->boolean('isRead') ? date('Y-m-d') : null;
        $book->save();

        return ['success' => "$book->title has been updated."];
    }    
}
