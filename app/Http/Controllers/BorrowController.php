<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $book = Book::find($id);
        $book = Book::updateOrCreate([
            'id' => $book->id,
            'name' => $book->name, 
        ],
            [
            'status' => '1',
            'user_id' => $request->user_id, 
            'borrow_date'=>Carbon::now()->format('Y-m-d'), 
            'due_date'=>Carbon::now()->addDays(7)->format('Y-m-d')]
        );

        return redirect()->route('librarian.index')
                        ->with('success','Product updated successfully');
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
        $book = Book::updateOrCreate([
            'id' => $book->id,
            'name' => $book->name, 
        ],
            [
            'status' => '0',
            'user_id' => '', 
            'borrow_date'=>'', 
            'due_date'=>'',
            ]
        );

        return redirect()->route('librarian.index')
                        ->with('success','Product updated successfully');
    }
}
