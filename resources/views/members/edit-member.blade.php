@extends('layouts.app')

@section('pageTitle', 'Edit member')

@section('content')
<div class="row">
    <div class="col-12">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-dark"><i class="fa-solid fa-house"></i> <span class="visually-hidden">Dashboard</span></a></li>
                <li class="breadcrumb-item"><a href="{{ route('members') }}" class="link-dark text-decoration-none">Members</a></li>
                <li class="breadcrumb-item"><a href="{{ route('members') }}/profile/{{ $member->id }}" class="link-dark text-decoration-none">{{ $member->name }} {{ $member->surname }}</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit</li>
            </ol>
        </nav>

        <h1 class="mb-4 fs-3">Edit member</h1>
    </div>
</div>

<hr>
    
<form action="" method="post" autocomplete="off">
    @csrf
    <div class="row">
        <div class="col-12 col-lg-4">
            <h2 class="fs-5">Personal information</h2>
            <p>This is basic information about the member.</p>
        </div>

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <label for="name" class="form-label" autocomplete="off">First name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $member->name }}">

                @error('name')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="surname" class="form-label">Last name</label>
                <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ $member->surname }}">

                @error('surname')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">  
                <label for="dob" class="form-label">Date of birth</label>
                <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ $member->dob }}">

                @error('dob')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <fieldset class="mb-4">  
                <legend class="form-label fs-6">
                    Gender
                </legend>
                
                <div class="form-check">
                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderMale" value="Male" @if ($member->gender === 'Male') checked @endif>
                    <label class="form-check-label" for="genderMale">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input  @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderFemale" value="Female" @if ($member->gender === 'Female') checked @endif>
                    <label class="form-check-label" for="genderFemale">
                        Female
                    </label>
                </div>
                
                @error('gender')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </fieldset>
        </div>
        
        <hr> <!-- End of personal information -->

                <div class="col-12 col-lg-4">
            <h2 class="fs-5">Membership information</h2>
            <p>This is basic information about the member.</p>
        </div>

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <p id="belt-label" class="form-label">Current belt</p>
                <select name="belt" id="belt" class="form-select  @error('belt') is-invalid @enderror" aria-labelledby="belt-label">
                    
                    <option value="White" @if ($member->belt === 'White') selected @endif>White</option>
                    <option value="Blue" @if ($member->belt === 'Blue') selected @endif>Blue</option>
                    <option value="Purple" @if ($member->belt === 'Purple') selected @endif>Purple</option>
                    <option value="Brown" @if ($member->belt === 'Brown') selected @endif>Brown</option>
                    <option value="Black" @if ($member->belt === 'Black') selected @endif>Black</option>
                    </select>
                @error('belt')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <fieldset class="mb-4">  
                <legend class="form-label fs-6">
                    Membership level
                </legend>
                
                <div class="form-check">
                    <input class="form-check-input  @error('membership') is-invalid @enderror" type="radio" name="membership" id="membershipBasic" value="Basic" @if ($member->membership === 'Basic') checked @endif>
                    <label class="form-check-label" for="membershipBasic">
                        Basic
                    </label>
                    <div id="basic-membership-help" class="form-text radio-help">£60 for 12 classes per month.</div>
                    <hr>
                </div>

                <div class="form-check">
                    <input class="form-check-input  @error('membership') is-invalid @enderror" type="radio" name="membership" id="membershipUnlimited" value="Unlimited" @if ($member->membership === 'Unlimited') checked @endif>
                    <label class="form-check-label" for="membershipUnlimited">
                        Unlimited
                    </label>
                    <div id="unlimited-membership-help" class="form-text radio-help">£75 for unlimited classes per month.</div>
                    <hr>
                </div>
                <div class="form-check">
                    <input class="form-check-input  @error('membership') is-invalid @enderror" type="radio" name="membership" id="membershipInactive" value="Inactive" @if ($member->membership === 'Inactive') checked @endif>
                    <label class="form-check-label" for="membershipInactive">
                        Inactive
                    </label>
                    <div id="basic-membership-help" class="form-text radio-help">Member currently has no active membership.</div>
                </div>
                
                @error('membership')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </fieldset>

            <div class="mb-4">
                <label for="memberSince" class="form-label">Member since</label>
                <input type="date" name="memberSince" id="memberSince" class="form-control @error('memberSince') is-invalid @enderror" value="{{ $member->memberSince }}">

                @error('memberSince')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <hr> <!-- End of membership information -->

        <div class="col-12 col-lg-4">
            <h2 class="fs-5">Additional information</h2>
            <p>This is basic information about the member.</p>
        </div>

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <label for="emergencyContact" class="form-label">Emergency contact name</label>
                <input type="text" name="emergencyContact" id="emergencyContact" class="form-control @error('emergencyContact') is-invalid @enderror" value="{{ $member->emergencyContact }}">

                @error('emergencyContact')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="emergencyNumber" class="form-label">Emergency contact number</label>
                <input type="tel" name="emergencyNumber" id="emergencyNumber" class="form-control @error('emergencyNumber') is-invalid @enderror" value="{{ $member->emergencyNumber }}">

                @error('emergencyNumber')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="medicalInformation" class="form-label">Medical conditions</label>
                <textarea rows="3" name="medicalInformation" id="medicalInformation" class="form-control">{{ $member->medicalInformation }}</textarea>
                <div id="medical-info-help" class="form-text">This field is optional, only add details if necessary.</div>
            </div>
        </div>

        <div class="col-12 offset-lg-4 col-lg-8">
            <button type="submit" class="btn btn-dark">Update member</button>
        </div>
    </div>
</form>
@endsection