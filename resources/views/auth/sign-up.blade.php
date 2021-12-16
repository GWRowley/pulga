
@extends('layouts.app')

@section('pageTitle', 'Sign up')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="mb-3">Sign up</h1>

            <form action="{{ route('sign-up') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Rickson" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                    @error('name')
                        <p class="mt-1 invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                 <div class="mb-3">
                    <label for="surname" class="form-label">Surname:</label>
                    <input type="text" name="surname" id="surname" placeholder="Gracie" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') }}">

                    @error('name')
                        <p class="mt-1 invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">

                    @error('username')
                        <p class="mt-1 invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

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

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm your password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="">

                    @error('password_confirmation')
                        <p class="mt-1 invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn btn-dark">Sign up</button>
                </div>
            </form>
        </div>
    </div>
@endsection