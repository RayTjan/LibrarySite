@extends('reader.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Welcome to the LibrarySite</h2>
            </div>
            
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <table class="table table-striped">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Genre</th>
            <th scope="col">Author</th>
            <th scope="col">Year Published</th>
            <th scope="col">Image</th>
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
                            Available
                        @break

                        @case(1)
                            Borrowed
                        @break

                        @case(2)
                            Due
                        @break

                        @case(3)
                            Booked
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
                @if(isset($book->image))
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" class="img-fluid">
                </div>
                @else
                    <img src="https://source.unsplash.com/random/500x400?book"
                        class="card-img-top" alt="{{ $book->name }}">
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
@endsection