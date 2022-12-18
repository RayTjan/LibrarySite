<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Performs static data change
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        return redirect()->route('librarian.borrowlist')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book = Book::updateOrCreate(
            [
                'id' => $book->id,
                'name' => $book->name,
            ],
            [
                'status' => '0',
                'user_id' => '',
                'borrow_date' => '',
                'due_date' => '',
            ]
        );
        return redirect()->route('librarian.index')
            ->with('success', 'Product updated successfully');
    }
}