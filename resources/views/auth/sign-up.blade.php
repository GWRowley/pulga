
@extends('layouts.app')

@section('pageTitle', 'Sign up')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="fs-3 text-center mt-5">Sign up for an account</h1>
            <p class="text-center">Or if you already have an account, <a href="{{ route('sign-in') }}" class="link-dark">sign in</a></p>
        </div>
        <div class="offset-1 col-10 offset-md-2 col-md-8 offset-lg-3 col-lg-6"> 
            <div class="form-panel bg-white shadow-sm my-5">
                <form action="{{ route('sign-up') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label">First name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                        @error('name')
                            <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="surname" class="form-label">Last name</label>
                        <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') }}">

                        @error('surname')
                            <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

                        @error('email')
                            <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="">
                        
                        @error('password')
                            <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirm your password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="">

                        <div id="password-help" class="form-text">Your password must be at least 8 characters long, and contain at least one upper case letter, a number, and a symbol.</div>
                        
                        @error('password_confirmation')
                            <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-dark mt-3">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection