<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::select('id', 'name')->with(['categories'])->latest()->paginate(15);
        $categories = Category::select('id', 'name')->get();
        return view('book.book', ['categories' => $categories, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $newName = '';
        if ($request->file('picture')) {
            // memberi nama spesifik kepada gambar , method store as
            $extension = $request->file('picture')->getClientOriginalExtension();
            // $newName = $request->name . '.' . $extension;
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('picture')->storeAs('books', $newName);
        }

        $request['image'] = $newName;

        $book = Book::create($request->only(['name', 'author', 'publisher', 'release', 'description', 'image']));
        $book->categories()->attach($request->categories_id);

        return redirect('/books');
    }

    public function show($id)
    {
        $book = Book::with(['categories'])->findOrFail($id);
        return view('book.book-detail', ['book' => $book]);
    }

    public function edit($id)
    {
        $book = Book::with(['categories'])->findOrFail($id);
        $categories = Category::select('id', 'name')->get();
        return view('book.book-edit', ['categories' => $categories, 'book' => $book]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $newName = '';
        if ($request->file('photo')) {

            $extension = $request->file('photo')->getClientOriginalExtension();

            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photos', $newName);


            if (Storage::exists('photos/' . $book->image)) {
                Storage::delete('photos/' . $book->image);
                /*
                Delete Multiple File like this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */
            }
        } else {
            $newName = $book->image;
        }
        $request['image'] = $newName;
        $book->update($request->only(['name', 'author', 'publisher', 'release', 'description', 'image']));
        $book->categories()->sync($request->categories_id);
        // $student->update($request->all());

        return redirect('/books');
    }
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if (Storage::exists('books/' . $book->image)) {
            Storage::delete('books/' . $book->image);
            /*
                Delete Multiple File like this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */
        }

        $book->delete();
        return redirect('/books');
    }
}
