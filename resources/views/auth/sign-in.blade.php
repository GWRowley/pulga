@extends('layouts.app')

@section('pageTitle', 'Sign in')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Welcome back!</h1>

        @if (session('status'))
            <div class="alert alert-danger" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('sign-in') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address:</label>
                <input type="text" name="email" id="email" placeholder="hello@email.com" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

                @error('email')
                    <p class="mt-1 invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="">

                @error('password')
                    <p class="mt-1 invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="remember">
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

            <div>
                <button type="submit" class="btn btn-dark">Sign in</button>
            </div>
        </form>
    </div>
</div>
@endsection