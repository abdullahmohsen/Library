@extends('layouts/app')

@section('title')
    Show author {{ $author->id }}
@endsection

@section('content')
    @if ($author->img !== null)
    <img src='{{ asset("uploads/$author->img") }}' class="img-fluid">
    @endif
    <h1>Show author {{ $author->id }}</h1>
    <hr>
    <h3>{{ $author->name }}</h3>
    <p>{{ $author->bio }}</p>
    <hr>

    <h3>Books</h3>
    @foreach ($author->books as $item)
        <a href="{{ route('showBooks', $item->id) }}">
            <p>{{ $item->name }}</p>
        </a>
    @endforeach
    {{--  {{ $author->books }}  --}}

    <hr>

    <a href="{{ route('allAuthors') }}">Back to all authors</a>


@endsection
