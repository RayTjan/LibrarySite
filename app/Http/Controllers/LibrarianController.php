<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;


class LibrarianController extends Controller
{    /**
    * Shows list of all books in a more compact way for admin actions
    */
    public function index()
    {
        $books = Book::all();
        $quantity = count($books);
        // return $quantity;
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
            'genre' => 'required',
            'author' => 'required',
            'image' => '|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'synopsis' => 'required',
            'year_published' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $request['image'] = $request->file('image')->store('gallery');

        }

        Book::create($request->all());

        return redirect()->route('librarian.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
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

        if ($request->hasFile('image')) {
            $request['image'] = $request->file('image')->store('gallery');
        }
        
        $res = Book::find($id)->update($request->all());
        $book = Book::find($id);
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
        return redirect()->route('librarian.index')
            ->with('success', 'Product updated successfully');
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
        return redirect()->route('librarian.index')
            ->with('success', 'Product updated successfully');
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

        return redirect()->route('librarian.index')
            ->with('success', 'Product updated successfully');
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
        return redirect()->route('librarian.index')->with('success', 'Product updated successfully');

    }


}