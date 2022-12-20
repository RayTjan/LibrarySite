<!-- Show list of books allowing user to view deeper or book -->

@extends('layout')
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
                    <!--Having some trouble with image, despite following tutorial and it already saved in public, its saved as private and tmp (yes I did the storage link in terminal)-->
                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" class="img-fluid">
                        @else
                            <img src="https://source.unsplash.com/random/500x400?book" class="card-img-top"
                                alt="{{ $book->name }}">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $book->name }}</strong></h5>
                            <p>{{$book->publishers->first()->year_published}}</p>
                            <p>By {{ $book->publishers->first()->author }}

                                <small class="text-muted">
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
                            <table>
                                <tr>
                                    <td>
                                        <a href="{{ route('reader.show', $book->id) }}" class="btn bg-maincolor text-white">
                                            Read more
                                        </a>
                                    </td>
                                    {{-- Recently added a condition so admin can;t book a book --}}
                                    @if (isset($book->user_id) == false && Auth::user()->role == '1') 
                                        <td>
                                            <form action="{{ route('reader.book', $book->id) }}" method="POST"
                                                enctype='multipart/form-data'>
                                                @method('PUT')
                                                @csrf
                                                <input name="id" type="hidden" value={{ $book->id }}>
                                                <button type="submit" class="btn bg-maincolor text-white"><i
                                                        class="bi bi-journal-arrow-down"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif

                                </tr>
                            </table>



                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
