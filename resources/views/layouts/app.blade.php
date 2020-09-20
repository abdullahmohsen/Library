<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    @yield('styles')
    
</head>

<body>
    <x-navbar></x-navbar>

    <div class="container my-3 py-5">
        @yield('content')
    </div>
    
    
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @yield('script') 

</body>
</html>