@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')

    @include('inc.errors')

    <form method="POST" action="{{ route('auth.handleLogin') }}">
        @csrf

        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    
@endsection