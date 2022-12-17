@extends('reader.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn bg-maincolor text-white" href="{{ route('reader.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="">
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
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Name: {{ $book->name }}</strong>
                {{ $book->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Genre:</p>
                <p>
                {{ $book->genre }}
                </p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Year Published:</p>
                {{ $book->year_published }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Author:</p>
                {{ $book->author }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Synopsis:</p>
                {{ $book->synopsis }}
            </div>
        </div>
        <div class="w-25 p-3">
            @if(isset($book->user_id) == false)
            <a href="{{ route('reader.edit', $book->id)  }}" class="btn bg-maincolor text-white">Borrow</a>
            @endif
        </div>    
    </div>
@endsection