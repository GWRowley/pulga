@extends('layouts.app')

@section('pageTitle', 'Sign in')

@section('content')

@if (session('status'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-12 mt-5">
        <h1 class="fs-3 text-center">Sign in to your account</h1>
        <p class="text-center">Or <a href="{{ route('sign-up') }}" class="link-dark">sign up today</a></p>
    </div>
    <div class="offset-1 col-10 offset-md-2 col-md-8 offset-lg-3 col-lg-6"> 
        <div class="content-panel bg-white shadow-sm my-5">
            
            <form action="{{ route('sign-in') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

                    @error('email')
                        <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="">

                    @error('password')
                        <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="d-block clearfix mb-3">
                    <div class="form-check mb-3 float-start">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>

                    <div class="float-end">
                        <a href="{{ route('forgot-password') }}" class="forgot-password link-dark">Forgot your password?</a>
                    </div>
         
                </div>
       
                <div class="d-block clearfix">
                    <button type="submit" class="btn btn-dark">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection