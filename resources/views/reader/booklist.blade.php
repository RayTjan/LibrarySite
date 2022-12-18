<!-- Show list of books borrowed by user -->

@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Borrowed Books</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Genre</th>
            <th scope="col">Author</th>
            <th scope="col">Year Published</th>
            <th scope="col">Borrow Date</th>
            <th scope="col">Due Date</th>
            <th scope="col">Action</th>
        </thead>
        @foreach ($books as $book)
            <tr>
                <td scope="row">{{ $book->id }}</td>
                <td>{{ $book->name }}</td>
                <td>
                    @switch($book->status)
                        @case(0)
                            AVAILABLE
                        @break

                        @case(1)
                            BORROWED
                        @break

                        @case(2)
                            DUE
                        @break

                        @case(3)
                            BOOKED
                        @break

                        @default
                            <br>Error, Try Again
                    @endswitch
                </td>
                <td>{{ $book->genre }}</td>
                <td>{{ $book->publishers->first()->author }}</td>
                <td>{{ $book->publishers->first()->year_published }}</td>
                <td>{{ $book->borrow_date }} </td>
                <td>{{ $book->due_date }} </td>
                <td>
                    <a class="btn btn-secondary" href="{{ route('reader.show', $book->id) }}">Check</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
