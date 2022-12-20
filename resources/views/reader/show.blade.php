<!-- Show book detail -->
@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn bg-maincolor text-white" href="{{ route('reader.index') }}"> <i class="bi bi-caret-left"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="">
        <div class="w-25 p-3">
            <!--Having some trouble with image, despite following tutorial and it already saved in public-->
            @if (isset($book->image))
                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" class="img-fluid">
            @else
                <img src="https://source.unsplash.com/random/250x350?book" class="card-img-top" alt="{{ $book->name }}">
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
                <strong>Name: {{ $book->name }}</strong>
        </div>
        <br>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <p>Genre: {{ $book->genre }}</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <p>Year Published:  {{ $book->publishers->first()->year_published }}</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <p>Author: {{ $book->publishers->first()->author }}</p>
                
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <p>Synopsis:</p>
                {{ $book->synopsis }}
        </div>
        <br>
        <br>
        <div class="w-25 p-3">
            @if (isset($book->user_id) == false)
                <a href="{{ route('reader.book', $book->id) }}" class="btn bg-maincolor text-white"><i
                        class="bi bi-journal-arrow-down"></i></a>
            @endif
        </div>
    </div>
@endsection
