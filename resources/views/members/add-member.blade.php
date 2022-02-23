@extends('layouts.app')

@section('pageTitle', 'Add new member')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('members') }}">Members</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add new member</li>
            </ol>
        </nav>

        <h1 class="mb-3">Add new member</h1>
    
        <form action="{{ route('add-new-member') }}" method="post">
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

                @error('surname')
                    <p class="mt-1 invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-dark">Add member</button>
            </div>
        </form>
    </div>
</div>
@endsection