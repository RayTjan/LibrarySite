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
    {{$books}}
    @if(isset($books) == true)
    <p>hi</p>
    {{-- <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->name }}</td>
            <td>{{ $book->synopsis }}</td>
        </tr>
        @endforeach
    </table> --}}
    @endif
        
@endsection