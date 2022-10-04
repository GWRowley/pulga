@extends('layouts.app')

@section('pageTitle', 'Edit competition')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadrcumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-dark"><i class="fa-solid fa-house"></i> <span class="visually-hidden">Dashboard</span></a></li>
                <li class="breadcrumb-item"><a href="{{ route('competitions') }}" class="link-dark text-decoration-none">Competitions</a></li>
                <li class="breadcrumb-item"><a href="{{ route('competitions') }}/event/{{ $competition->id }}" class="link-dark text-decoration-none">{{ $competition->title }}</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit competition</li>
            </ol>
        </nav>
        <div class="mb-4 d-flex align-items-center">
            <h1 class="fs-2 mb-0 lh-1">Edit competition</h1>
            <a href="{{ route('competitions') }}/event/{{ $competition->id}}" class="btn btn-dark ms-auto" role="button">Cancel</a>
        </div>
    </div>
</div>

<hr>
    
<form action="/competitions/update-event/{{ $competition->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12 col-lg-4">
            <h2 class="fs-5">Competition information</h2>
            <p>This is basic information about the competition.</p>
        </div>        

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <label for="title" class="form-label" autocomplete="off">Competition title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $competition->title }}">

                @error('title')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">  
                <label for="date" class="form-label">Competition date</label>
                <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ $competition->date }}">

                @error('date')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <hr> <!-- End of competition information -->

        <div class="col-12 col-lg-4">
            <h2 class="fs-5">Location information</h2>
            <p>Information on where the competition will be held.</p>
        </div>

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <label for="address1" class="form-label" autocomplete="off">Address line 1</label>
                <input type="text" name="address_1" id="address1" class="form-control @error('address_1') is-invalid @enderror" value="{{ $competition->address_1 }}">

                @error('address_1')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address2" class="form-label" autocomplete="off">Address line 2</label>
                <input type="text" name="address_2" id="address2" class="form-control @error('address_2') is-invalid @enderror" value="{{ $competition->address_2 }}">

                @error('address_2')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="townCity" class="form-label" autocomplete="off">Town/City</label>
                <input type="text" name="town_city" id="townCity" class="form-control @error('town_city') is-invalid @enderror" value="{{ $competition->town_city }}">

                @error('town_city')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="postcode" class="form-label" autocomplete="off">Postcode</label>
                <input type="text" name="postcode" id="postcode" class="form-control @error('postcode') is-invalid @enderror" value="{{ $competition->postcode }}">

                @error('postcode')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <hr> <!-- End of location information -->

        <div class="col-12 col-lg-4">
            <h2 class="fs-5">Additional information</h2>
            <p>Any notes or further information about the competition.</p>
        </div>

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <label for="notes" class="form-label">Notes</label>
                <textarea rows="3" name="notes" id="notes" class="form-control">{{ $competition->notes }}</textarea>
            </div>
        </div>

        <div class="col-12 offset-lg-4 col-lg-8">
            <button type="submit" class="btn btn-dark">Save changes</button>
        </div>
    </div>
</form>
@endsection