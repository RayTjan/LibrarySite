<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\UpdateBookRequest;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
  
        return view('reader.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $book = Book::updateOrCreate([
            'id' => $book->id,
            'name' => $book->name, 
        ],
            [
            'status' => '1',
            'user_id' => Auth::user()->id, 
            'borrow_date'=>Carbon::now()->format('Y-m-d'), 
            'due_date'=>Carbon::now()->addDays(7)->format('Y-m-d')]
        );

        return redirect()->route('reader.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $books = Book::all();
  
        return view('reader.index',compact('books'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function borrowedBooks()
    {
        $user = Auth::user();
        $books = $user->books();
  
        return view('reader.borrow',compact('books'));
    }

    public function updateBook(Request $request, $id)
    {
        return $request;
        // $book = Book::updateOrCreate(
        //     ['user_id' => Auth::user()->id, 'borrow_date'=>Carbon\Carbon::now()->format('Y-m-d'), 'due_date'=>Carbon\Carbon::now()->addDays(7)->format('Y-m-d')]
        // );

        
        // return redirect()->route('reader.index')
        //                 ->with('success','Product updated successfully');
    }
}
