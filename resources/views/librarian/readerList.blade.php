@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Borrowed Books</h2>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Borrower Name</th>
            <th scope="col">Borrow Date</th>
            <th scope="col">Due Date</th>
            <th scope="col">Action</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td scope="row">{{$book->name}} </td>
            <td >{{$book->borrower()->first()->name}} </td>
            <td >{{$book->borrow_date}} </td>
            <td>{{$book->due_date}} </td>
            <td>
                <a class="btn bg-maincolor text-white" href="{{ route('borrow.edit',$book) }}" >Resolve</a>
                <a class="btn btn-primary" href="{{ route('librarian.edit',array($book, $book->id)) }}"><i
                    class="bi bi-pencil"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
        
@endsection