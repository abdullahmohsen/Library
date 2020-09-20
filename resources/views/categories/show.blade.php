@extends('layouts/app')

@section('title')
    Show Category {{ $category->id }}
@endsection

@section('content')
    <h1>Category ID: {{ $category->id }}</h1>
    <hr>
    
    <h3>{{ $category->name }}</h3>

    <p class="mb-0">Books:</p>
    <ul>
        @foreach ($category->books as $book)
            <li>
                <a href="{{ route('showBooks', $book->id) }}">
                    {{ $book->name }}
                </a>
            </li>
        @endforeach
    </ul>
    
    <hr>

    <a href="{{ route('categories.index') }}">Show all categories</a>


@endsection
