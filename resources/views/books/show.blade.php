@extends('layouts/app')

@section('title')
    Show book {{ $book->id }}
@endsection

@section('content')
    <h1>Show book - {{ $book->id }}</h1>
    <hr>

    @if ($book->img !== null)
    <img src='{{ asset("uploads/$book->img") }}' class="img-fluid">
    @endif
    
    <h3>{{ $book->name }}</h3>
    <p>{{ $book->desc }}</p>
    <p>${{ $book->price }}</p>
    
    <p>By:
        <a href="{{ route('showAuthor', $book->author->id) }}">
            {{ $book->author->name }}
        </a>
    </p>
    <p>Brif description about author: {{ $book->author->bio }}</p>

    <hr>

    <a href="{{ route('allBooks') }}">Back to all books</a>


@endsection
