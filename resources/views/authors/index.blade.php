@extends('layouts/app')

@section('title')
    All authors
@endsection

@section('styles')
    <style>
        h1 {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <h1>All authors</h1>
        @auth
        <a href="{{ route('createAuthors') }}" class="btn btn-primary">Add new</a>
        @endauth
    </div>

    @foreach($authors as $author)
        <hr>
        @if ($author->img !== null)
            <img src='{{ asset("uploads/$author->img") }}' width="100" height="100">
        @endif
        <a href="{{ route('showAuthor', $author->id) }}">
            <h2>{{ $author->name }}</h2>
        </a>
        <p>{{ $author->bio }}</p>
        <a href="{{ route('showAuthor', $author->id) }}" class="btn btn-primary">Show</a>
        @auth
        <a href="{{ route('editAuthors', $author->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('deleteAuthors', $author->id) }}" class="btn btn-danger">Delete</a>
        @endauth
    @endforeach

    <div class="my-5">
        {!! $authors->render() !!} <!-- parser to HTML  -->
    </div>
@endsection 