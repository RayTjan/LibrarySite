<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

class LibrarianController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(5);
  
        return view('librarian.index',compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('librarian.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'genre' => 'genre',
            'author' => 'required',
            'synopsis' => 'required',
            'year_published' => 'required',
        ]);
  
        Book::create($request->all());
   
        return redirect()->route('librarian.index')
                        ->with('success','Book created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('librarian.show',compact('book'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('librarian.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'genre' => 'genre',
            'author' => 'required',
            'synopsis' => 'required',
            'year_published' => 'required',
        ]);
  
        $book->update($request->all());
  
        return redirect()->route('librarian.index')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
  
        return redirect()->route('librarian.index')
                        ->with('success','Product deleted successfully');
    }
}
