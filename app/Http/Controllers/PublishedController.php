<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePusblishedRequest;
use App\Http\Requests\UpdatePusblishedRequest;
use App\Models\Pusblished;

class PusblishedController extends Controller
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
     * @param  \App\Http\Requests\StorePusblishedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePusblishedRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pusblished  $pusblished
     * @return \Illuminate\Http\Response
     */
    public function show(Pusblished $pusblished)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pusblished  $pusblished
     * @return \Illuminate\Http\Response
     */
    public function edit(Pusblished $pusblished)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePusblishedRequest  $request
     * @param  \App\Models\Pusblished  $pusblished
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePusblishedRequest $request, Pusblished $pusblished)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pusblished  $pusblished
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pusblished $pusblished)
    {
        //
    }
}
