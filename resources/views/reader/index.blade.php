@extends('reader.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Welcome to the LibrarySite</h2>
                <br>
                <br>
            </div>
            
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4 mb-3">
                    <div class="card">

                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" class="img-fluid">
                        @else
                            <img src="https://source.unsplash.com/random/500x400?book"
                                class="card-img-top" alt="{{ $book->name }}">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $book->name }}</h5>
                            <p>{{ $book->author }}

                                <small class="text-muted">
                                    {{-- <br>Availability: {{ $post->status }}</a> --}}
                                    @switch($book->status)
                                        @case(0)
                                            <br>AVAILABLE
                                        @break

                                        @case(1)
                                            <br>BORROWED
                                        @break

                                        @case(2)
                                            <br>DUE
                                        @break

                                        @case(3)
                                            <br>BOOKED
                                        @break

                                        @default
                                            <br>Error, Try Again
                                    @endswitch

                                </small>



                            </p>
                            <a href="{{ route('reader.show', $book->id)  }}" class="btn bg-maincolor text-white">Read more</a>
                            @if(isset($book->user_id) == false)
                            <a href="{{ route('reader.edit', $book->id)  }}" class="btn bg-maincolor text-white">Borrow</a>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection