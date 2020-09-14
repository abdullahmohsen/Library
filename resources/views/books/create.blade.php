@extends('layouts/app')

@section('title')
    Create Book
@endsection


@section('content')
    @include('inc/errors')
    
    <form method="POST" action="{{ route('Books.store') }}" enctype="multipart/form-data">
        @csrf //csrf token
        <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
        <textarea class="form-control" rows="8" name="desc" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="price" placeholder="Price">
        </div>
        <select class="form-control" name="author_id">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option> 
            @endforeach
        </select>
        <div class="form-group">
            <input type="file" class="form-control-file mt-3" name="img">
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
@endsection