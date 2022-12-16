@extends('librarianview.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Welcome to the Library</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('librarian.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->name }}</td>
            <td>{{ $book->status }}</td>
            <td>
                <form action="{{ route('librarian.destroy',$book->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('librarian.show',$book) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('librarian.edit',$book->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
        
@endsection