<?php

namespace App\Http\Controllers\Admin;

use App\Models\Published;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLiteratureRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
 /**
    * Shows list of all books in a more compact way for admin actions
    */
    public function index()
    {
        $books = Book::all();
        $quantity = count($books);
        // return $quantity;
        //dd($quantity)
        return view('librarian.index', compact('books'));
    }
    /**
    * Sorts list of all books in a more compact way for admin actions
    */
    public function sortbooks()
    {
        $books = Book::all();
        $books = $books->sortBy('name');
        // return $books;
        return view('librarian.index', compact('books'));
    }

    /**
     * Shows list of books borrowed by a user
     */
    public function borrowlist()
    {
        $books = Book::whereIn('status', [2, 3, 4])->get();
        return view('librarian.readerlist', compact('books'));
    }
    /**
     * Sorts the list of books borrowed by a user
     */
    public function sortduedates()
    {
        $books = Book::whereIn('status', [2, 3, 4])->get();
        $books = $books->sortBy('due_date');
        // return $books;
        return view('librarian.readerlist', compact('books'));
    }
    /**
     * Show the form for creating a new book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('librarian.create');
    }

    /**
     * Store a newly created book & published in storage.
     *
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'genre' => 'required',
            'author' => 'required',
            'image' => '|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'synopsis' => 'required',
            'year_published' => 'required',
        ]);

        // Failed, same code as tutorial, same save spot at public, but somehow saved as private/temp in database
        if ($request->hasFile('image')) {
            $request['image'] = $request->file('image')->store('gallery');
        }
        $filtered = $request->except(['author', 'year_published']);
        $book = Book::create($filtered);
        $published = new Published();
        $published->author = $request['author'];
        $published->year_published = $request['year_published'];
        $book->publishers()->save($published);	

        return redirect()->route('book.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified book.
     */
    public function show($id)
    {
        if(is_string($id) == true){
            $book = Book::find($id);
            return view('librarian.show', compact('book'));
        }
        else{
            $book = Book::find(1);
            return view('librarian.show', compact('book'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $users = User::whereIn('role',['1'])->get();
        // return $users;
        return view('librarian.edit', compact('book', 'users'));
    }

    /**
     * Update Book resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'genre' => 'required',
            'author' => 'required',
            'status' => 'required',
            'synopsis' => 'required',
            'image' => 'image|file|max:5000',
            'year_published' => 'required',
        ]);
        // Failed, same code as tutorial, same save spot at public, but somehow saved as private/temp in database

        if ($request->hasFile('image')) {
            $request['image'] = $request->file('image')->store('gallery');
        }

        if($request['user_id'] == 'Select Reader'){
            $filtered = $request->except(['author', 'year_published', 'user_id']);
        }
        else{
            $filtered = $request->except(['author', 'year_published']);
        }
        $res = Book::find($id)->update($filtered);
        $book = Book::find($id);

        foreach($book->publishers as $published){
            //Tried to edit individually, but failed because lack of time. could make a form with expandable input for published
            if($published->publishedable_id == $book->id){
                $published->author = $request['author'];
                $published->year_published = $request['year_published'];
                $published->save();
            }
        }
        if(isset($request['user_id']) && $request['status'] == '1'){
            $book = Book::updateOrCreate(
                [
                    'id' => $book->id,
                    'name' => $book->name,
                ],
                [
                    'borrow_date' => Carbon::now()->format('Y-m-d'),
                    'due_date' => Carbon::now()->addDays(7)->format('Y-m-d')
                ]
            );
        }
        if(isset($request['user_id']) && $request['status'] == '3'){
            $book = Book::updateOrCreate(
                [
                    'id' => $book->id,
                    'name' => $book->name,
                ],
                [
                    'borrow_date' => null,
                    'due_date' => null,
                ]
            );
        }
        return redirect()->route('book.index')
            ->with('success', 'Book updated successfully');
    }
    /**
     * Erases a book booking/borrowing/due, return to avaialble state
     */
    public function resolve(Request $request, $id)
    {
        $book = Book::find($id);
        $book = Book::updateOrCreate(
            [
                'id' => $book->id,
                'name' => $book->name,
            ],
            [
                'status' => '0',
                'user_id' => null,
                'borrow_date' => null,
                'due_date' => null,
            ]
        );
        // return $book;
        return redirect()->route('book.borrowlist')
            ->with('success', 'Book updated successfully');
    }
    /**
     * Moves Booking state to borrow state
     */
    public function startborrow($id){
        $book = Book::find($id);
        $book = Book::updateOrCreate(
            [
                'id' => $book->id,
                'name' => $book->name,
            ],
            [
                'status' => '1',
                'borrow_date' => Carbon::now()->format('Y-m-d'),
                'due_date' => Carbon::now()->addDays(7)->format('Y-m-d')
            ]
        );

        return redirect()->route('book.borrowlist')
            ->with('success', 'Book updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Book::find($id)->delete();
        return redirect()->route('book.index')->with('success', 'Book updated successfully');

    }
}
