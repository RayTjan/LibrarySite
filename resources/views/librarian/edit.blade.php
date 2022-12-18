<!-- Change information of a book-->

@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn bg-maincolor text-white" href="{{ route('librarian.index') }}"> <i class="bi bi-caret-left"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('librarian.update', $book->id) }}" method="POST" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $book->name }}"
                        placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-select" aria-label="Default select example" id="status" name="status">
                        @switch($book->status)
                            @case(0)
                                <option selected="selected" value=0>Available</option>
                                <option value=1>Borrowed</option>
                                <option value=2>Due</option>
                                <option value=3>Booked</option>
                            @break

                            @case(1)
                                <option value=0>Available</option>
                                <option selected="selected" value=1>Borrowed</option>
                                <option value=2>Due</option>
                                <option value=3>Booked</option>
                            @break

                            @case(2)
                                <option value=0>Available</option>
                                <option value=1>Borrowed</option>
                                <option selected="selected" value=2>Due</option>
                                <option value=3>Booked</option>
                            @break

                            @case(3)
                                <option value=0>Available</option>
                                <option value=1>Borrowed</option>
                                <option value=2>Due</option>
                                <option selected="selected" value=3>Booked</option>
                            @break

                            @default
                                <option value="0">Available</option>
                                <option value="1">Borrowed</option>
                                <option value="2">Due</option>
                                <option value="3">Booked</option>
                        @endswitch

                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                <div class="form-group">
                    <strong><p>Reader : (Do not select a user if its the same)</p></strong>
                    <select class="form-select" aria-label="Default select example" id="user_id" name="user_id">
                        <option>Select Reader</option>
                        @foreach ($users as $user)
                            <option value={{ $user->id }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $book->name }}"
                        placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                <div class="form-group">
                    <strong>Genre:</strong>
                    <input type="text" name="genre" class="form-control" value="{{ $book->genre }}"
                        placeholder="Genre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                <div class="form-group">
                    <strong>Year Published:</strong><br>
                    <input type="year" id="year_published" name="year_published" value="{{ $book->year_published }}"
                        placeholder="YYYY" maxlength="4">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                <div class="form-group">
                    <strong>Author:</strong>
                    <input type="text" name="author" class="form-control"
                        value="{{ $book->author }}"placeholder="Author">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                <div class="form-group">
                    <strong>Synopsis:</strong>
                    <textarea class="form-control" style="height:150px" name="synopsis" placeholder="Synopsis">{{ $book->synopsis }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center p-2">
                <button type="submit" class="btn font-weight-bold bg-maincolor text-white ">Submit</button>
            </div>
        </div>

    </form>
@endsection
