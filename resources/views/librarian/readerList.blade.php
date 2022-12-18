<!-- Show list of users that has borrowed/due/booked a book -->


@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Borrowed Books</h2>
            </div>
        </div>
        <br>
            <div class="pull-left">
                <a class="btn bg-maincolor text-white" href="{{ route('book.sortduedates') }}">Sort by Date</a>
                <a class="btn bg-maincolor text-white" href="{{ route('book.borrowlist') }}">Revert Sort</a>
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
            <th scope="col">User Name</th>
            <th scope="col">Status</th>
            <th scope="col">Borrow Date</th>
            <th scope="col">Due Date</th>
            <th scope="col" colspan ='3'>Action</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td scope="row">{{$book->name}} </td>
            <td >{{$book->getrelationshipdata()->first()->name}} </td>
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
            <td >{{$book->borrow_date}} </td>
            <td>{{$book->due_date}} </td>
                @if ($book->status == 3)
                <td>
                <!--Makes book into borrowed and adds Borrow and due date-->
                <form action="{{ route('book.borrow',$book->id) }}" method="POST" enctype='multipart/form-data'>
                        @method('PUT')
                        @csrf
                        <input name="id" type="hidden" value={{$book->id}}>
                        <button type="submit" class="btn bg-maincolor text-white"><i class="bi bi-journal-arrow-up"></i>
                        </button>
                </form>
                </td>
                @endif
                <td>
                <!--Edit book information-->
                <a class="btn bg-maincolor text-white" href="{{ route('book.edit',array($book, $book->id)) }}"><i
                    class="bi bi-pencil"></i></a>
                </td>
                <td>
                    <!--erases any trace of user booking/borrow-->
                    <form action="{{ route('book.resolve',$book->id) }}" method="POST" enctype='multipart/form-data'>
                            @method('PUT')
                            @csrf
                            <input name="id" type="hidden" value={{$book->id}}>
                            <button type="submit" class="btn bg-maincolor text-white"><i class="bi bi-x-square"></i>
                            </button>
                    </form>
            </td>
        </tr>
        @endforeach
    </table>
        
@endsection