@extends('layouts.app')

@section('pageTitle', 'Create academy')

@section('content')
@if($errors->any())
    @include('partials.error-summary')
@endif

<div class="row">
    <div class="col-12">
        <nav aria-label="breadrcumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-dark"><i class="fa-solid fa-house"></i> <span class="visually-hidden">Dashboard</span></a></li>
                <li class="breadcrumb-item" aria-current="page">Create academy</li>
            </ol>
        </nav>

        <h1 class="mb-2 fs-2">Create academy</h1>
    </div>
</div>

<hr>
    
<form action="{{ route('create-academy') }}" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="row">
        <div class="col-12 col-lg-4">
            <h2 class="fs-5">Academy information</h2>
            <p>This is basic information about your academy.</p>
        </div>        

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <label for="name" class="form-label" autocomplete="off">Academy name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                @error('name')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="headCoach" class="form-label" autocomplete="off">Head coach</label>
                <input type="text" name="head_coach" id="headCoach" class="form-control @error('head_coach') is-invalid @enderror" value="{{ old('head_coach') }}">

                @error('head_coach')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <input type="hidden" name="avatar_id" id="avatarId" class="form-control @error('avatar_id') is-invalid @enderror" value="{{ time() }}">
            </div>

            <div class="mb-4">
                <label for="avatar" class="form-label">Academy logo</label>
                <input type="file" accept="image/*" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror" value="{{ old('avatar') }}">
                <div id="avatar-help" class="form-text">Your file should be a .jpg, .jpeg or .png and less than 5MB in size.</div>

                @error('avatar')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <hr> <!-- End of academy information -->

        <div class="col-12 col-lg-4">
            <h2 class="fs-5">Membership information</h2>
            <p>Pricing information for your academy.</p>
        </div>

        <div class="col-12 offset-lg-4 col-lg-8">
            <button type="submit" class="btn btn-dark">Create academy</button>
        </div>
    </div>
</form>
@endsection