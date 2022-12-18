<!-- Clear view showing lists books -->

@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Welcome to the Library</h2>
            </div>
            <div class="pull-right">
                <a class="btn bg-maincolor text-white" href="{{ route('librarian.create') }}"> Create New Product</a>
            </div>
            <br>
            <div class="pull-left">
                <a class="btn bg-maincolor text-white" href="{{ route('librarian.sortbooks') }}">Sort</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))ß
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
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </thead>
        @foreach ($books as $book)
            <tr>
                <td scope="row">{{ $book->id }}</td>
                <td>{{ $book->name }}</td>
                <td>
                    <div class='d-inline'>
                        <p>
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
                                    Error, Try Again
                            @endswitch
                        </p>
                    </div>
                </td>
                <td>{{ $book->genre }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year_published }}</td>
                <td>
                    <!--Having some trouble with image, despite following tutorial and it already saved in public-->
                    @if (isset($book->image))
                        <div style="max-height: 400px; overflow:hidden;">
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" class="img-fluid">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/random/250x350?book" class="card-img-top"
                            alt="{{ $book->name }}">
                    @endif
                </td>
                <td>
                    <form action="{{ route('librarian.destroy', $book->id) }}" method="POST">
                        <!--Show book details-->
                        <a class="btn btn-secondary" href="{{ route('librarian.show', $book->id) }}"><i
                                class="bi bi-info-circle"></i>
                        </a>
                        <!--Edit book information-->
                        <a class="btn btn-primary" href="{{ route('librarian.edit', $book->id) }}"><i
                                class="bi bi-pencil"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <!--Delete book-->
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
