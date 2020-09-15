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
    <p class="mb-0">Categories:</p>
    <ul>
        @foreach ($book->categories as $category)
            <li>
                <a href="{{ route('categories.show', $category->id) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
    
    <p>{{ $book->desc }}</p>
    <p>Price: {{ $book->price }} EGP</p>
    
    <p>By:
        <a href="{{ route('showAuthor', $book->author->id) }}">
            {{ $book->author->name }}
        </a>
    </p>
    <p>Brif description about author: {{ $book->author->bio }}</p>

    <hr>

    <a href="{{ route('allBooks') }}">Back to all books</a>


@endsection
