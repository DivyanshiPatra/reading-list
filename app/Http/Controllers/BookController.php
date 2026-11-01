<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display books with optional status filter
    public function index(Request $request)
    {
        $query = Book::query();

        if (in_array($request->status, ['to-read', 'reading', 'finished'])) {
            $query->where('status', $request->status);
        }

        $books = $query->latest()->get();

        return view('books.index', compact('books'));
    }

    // Show the Add Book form
    public function create()
    {
        return view('books.create');
    }

    // Save a new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'status' => 'required|in:to-read,reading,finished',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully!');
    }

    // Show the Edit Book form
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Update an existing book
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'status' => 'required|in:to-read,reading,finished',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully!');
    }

    // Delete a book
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully!');
    }
}