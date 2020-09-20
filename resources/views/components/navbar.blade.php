<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand text-white">Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('allBooks') }}">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('allAuthors') }}">Authors</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('categories.index') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($categories as $category)
                        <a class="dropdown-item" href="{{ route('categories.show', $category->id) }}">{{$category->name}}</a>
                    @endforeach
                </div>
            </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('notes.index') }}">My Notes</a>
                </li>
            @endauth
        </ul>
    </div>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                </li>
            @endguest

            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active">{{ Auth::user()->role }}: {{ Auth::user()->name }}</a>
                </li>
            @endauth

        </ul>
    </div>
</nav>