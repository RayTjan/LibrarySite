<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

class LibrarianController extends Controller
{
    public function index()
    {
        $books = Book::all();
  
        return view('librarianview.index',compact('books'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('librarianview.create');
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
            'genre' => 'required',
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
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('librarianview.show', [
            'book' => $book
        ]);
        // return view('librarianview.show',compact('book'));

    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('librarianview.edit',compact('book'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'genre' => 'required',
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
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Book::find($id)->delete();

        return redirect()->route('librarian.index')->with('success','Product updated successfully');
        
    }
}
