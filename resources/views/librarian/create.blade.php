@extends('librarian.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Book</h2>
        </div>
        <div class="pull-right">
            <a class="btn bg-maincolor text-white" href="{{ route('librarian.index') }}"> Back</a>
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
   
<form action="{{ route('librarian.store') }}" method="POST" enctype='multipart/form-data' >
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 p-2">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 p-2">
            <div class="form-group">
                <strong>Genre:</strong>
                <input type="text" name="genre" class="form-control" placeholder="Genre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 p-2">
            <div class="form-group">
            <strong>Year Published:</strong><br>
            <input type="year" id="year_published" name="year_published" placeholder="YYYY"  maxlength="4">            
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 p-2">
            <div class="form-group">
                <strong>Author:</strong>
                <input type="text" name="author" class="form-control" placeholder="Author">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 p-2">
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 p-2">
            <div class="form-group">
                <strong>Synopsis:</strong>
                <textarea class="form-control" style="height:150px" name="synopsis" placeholder="Synopsis"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center p-2">
                <button type="submit" class="btn bg-maincolor text-white">Submit</button>
        </div>
    </div>
   
</form>
@endsection