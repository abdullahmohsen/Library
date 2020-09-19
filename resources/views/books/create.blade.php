@extends('layouts/app')

@section('title')
    Create Book
@endsection


@section('content')
    @include('inc/errors')
    
    <form method="POST" action="{{ route('Books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="8" name="desc" placeholder="Description">{{ old('desc') }}</textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
        </div>
        <select class="custom-select" name="author_id">
            <option selected disabled>Select author</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">
                    {{ $author->name }}
                </option> 
            @endforeach
        </select>

        <div class="form-group">
            <input type="file" class="form-control-file mt-3" name="img">
        </div>

        <h6 class="mb-0">Select Categories:</h6>
        @foreach ($categories as $category)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $category->id }}" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    {{ $category->name }}
                </label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Add Book</button>
    </form>
@endsection