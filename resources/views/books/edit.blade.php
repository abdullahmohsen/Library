@extends('layouts/app')

@section('title')
    Edit Book - {{ $book->name }}
@endsection


@section('content')
    @include('inc/errors')

    <form method="POST" action="{{ route('Books.update', $book->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="name" value="{{ old('name') ?? $book->name }}">
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="8" name="desc" placeholder="description">{{ old('desc') ?? $book->desc }}</textarea>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="price" placeholder="price" value="{{ old('price') ?? $book->price }}">
        </div>
        <select class="form-control" name="author_id">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" @if($author->id == $book->author_id) selected @endif >{{ $author->name }}</option> 
            @endforeach
        </select>
        @if ($book->img !== null)
            <img src='{{ asset("uploads/$book->img") }}' class="img-fluid mt-3">
        @endif
        <div class="form-group mt-3">
            <input type="file" class="form-control-file" name="img">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="{{ route('allBooks') }}" class="btn btn-primary mt-5">Back</a>
@endsection
