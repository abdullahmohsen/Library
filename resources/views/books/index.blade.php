@extends('layouts/app')

@section('title')
    All Books
@endsection

@section('styles')
    <style>
        h1 {
            color: red;
        }
    </style>
@endsection

@section('content')

    <div class="w-50 m-auto pb-5">
        <input type="text" id="keyword" placeholder="Search for book.." class="form-control">
    </div>
    {{-- <div>
        <input type="text" id="keyword">
    </div> --}}

    <div id="allBooks">
        <div class="d-flex justify-content-between align-items-center">
            <h1>All Books</h1>
            @auth
                <a href="{{ route('Books.create') }}" class="btn btn-primary">Create new book</a>
            @endauth
        </div>
        
        @foreach($books as $book)
            <hr>
            @if ($book->img !== null)
                <img src='{{ asset("uploads/$book->img") }}' width="100" height="100">
            @endif
            <a href="{{ route('showBooks', $book->id) }}">
                <h2>{{ $book->name }}</h2>
            </a>
            <p>{{ $book->desc }}</p>
            <p class="text-muted">Price: {{ $book->price }} EGP</p>
            <a href="{{ route('showBooks', $book->id) }}" class="btn btn-primary">Show</a>

            @auth
                <a href="{{ route('Books.edit', $book->id) }}" class="btn btn-info">Edit</a>
                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('Books.delete', $book->id) }}" class="btn btn-danger">Delete</a>
                @endif
            @endauth
        @endforeach
    </div>

    {{-- <div class="my-5">
        {!! $books->render() !!} <!-- parser to HTML  -->
    </div> --}}
@endsection 


@section('script')
    <script>
        $('#keyword').keyup(function() {
            let keyword = $(this).val() //read th value
            //console.log(keyword);

            let url = "{{ route('books.search') }}" + "?keyword=" + keyword //url for get search with concatenate 
            //console.log(url);
            
            //AJAX request snippet (eb3t AJAX request bel data ely rg3alk)
            $.ajax({
                type: "GET",
                url: url,
                contentType: false,
                processData: false,
                success: function (data)
                {
                    //console.log(data);

                    $('#allBooks').empty() //empty 3shan yms7ly ely bra el search
                    
                    for (book of data) {
                        //console.log(book.name);
                        $('#allBooks').append(`
                            <a href="{{ route('showBooks', $book->id) }}">
                                <h2>${book.name}</h2>
                            </a>
                            <p>${book.desc}</p>
                        `)
                    }
                    //if (data.length == 0){ }
                }
            })
        })
        
    </script>
@endsection