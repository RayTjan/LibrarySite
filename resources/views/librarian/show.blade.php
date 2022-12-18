<!-- Show deeper detail of book -->

@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn bg-maincolor text-white" href="{{ route('librarian.index') }}"> <i class="bi bi-caret-left"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="w-25 p-3">
            @if(isset($book->image))
                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" class="img-fluid">
            @else
                <img src="https://source.unsplash.com/random/250x350?book"
                    class="card-img-top" alt="{{ $book->name }}">
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name: {{ $book->name }}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Genre: {{ $book->genre }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Year Published:  {{ $book->year_published }}</p>
               
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Author: {{ $book->author }}</p>
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Synopsis: {{ $book->synopsis }}</p>
                
            </div>
        </div>
    </div>
@endsection