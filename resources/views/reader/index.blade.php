@extends('reader.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Welcome to the Library</h2>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   @if(isset($books) == true)
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
                <a class="btn btn-info" href="{{ route('reader.show', $book->id) }}">Show</a>
            </td>
            <td>
                <a class="btn btn-primary" href="{{ route('reader.update',$book) }}" >Borrow</a>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
        
@endsection