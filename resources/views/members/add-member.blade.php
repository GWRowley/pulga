@extends('layouts.app')

@section('pageTitle', 'Add new member')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="mb-4 fs-3">Add new member</h1>
    </div>
</div>

<hr>
    
<form action="{{ route('add-new-member') }}" method="post" autocomplete="off">
    @csrf
    <div class="row">
        <div class="col-12 col-lg-4">
            <h2 class="fs-4">Personal information</h2>
            <p>This is basic information about the member.</p>
        </div>

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <label for="name" class="form-label" autocomplete="off">First name</label>
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
                <label for="dob" class="form-label">Date of birth</label>
                <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}">

                @error('dob')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <fieldset class="mb-4">  
                <legend class="form-label fs-6">
                    Gender
                </legend>
                
                <div class="form-check">
                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderMale" value="Male" checked>
                    <label class="form-check-label" for="genderMale">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input  @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderFemale" value="Female">
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
            <h2 class="fs-4">Additional information</h2>
            <p>This is basic information about the member.</p>
        </div>

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <label for="emergencyContact" class="form-label">Emergency contact name</label>
                <input type="text" name="emergencyContact" id="emergencyContact" class="form-control @error('emergencyContact') is-invalid @enderror" value="{{ old('emergencyContact') }}">

                @error('emergencyContact')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="emergencyNumber" class="form-label">Emergency contact number</label>
                <input type="tel" name="emergencyNumber" id="emergencyNumber" class="form-control @error('emergencyNumber') is-invalid @enderror" value="{{ old('emergencyNumber') }}">

                @error('emergencyNumber')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="medicalInformation" class="form-label">Medical conditions</label>
                <textarea rows="3" name="medicalInformation" id="medicalInformation" class="form-control" value="{{ old('medicalInformation') }}"></textarea>
                <div id="medical-info-help" class="form-text">This field is optional, only add details if necessary.</div>
            </div>
        </div>

        <hr> <!-- End of additional information -->

        <div class="col-12 col-lg-4">
            <h2 class="fs-4">Membership information</h2>
            <p>This is basic information about the member.</p>
        </div>

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <p id="belt-label" class="form-label">Current belt</p>
                <select name="belt" id="belt" class="form-select  @error('belt') is-invalid @enderror" aria-labelledby="belt-label">
                    
                    <option value="White" selected>White</option>
                    <option value="Blue">Blue</option>
                    <option value="Purple">Purple</option>
                    <option value="Brown">Brown</option>
                    <option value="Black">Black</option>
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
                    <input class="form-check-input  @error('membership') is-invalid @enderror" type="radio" name="membership" id="membershipBasic" value="Basic" checked>
                    <label class="form-check-label" for="membershipBasic">
                        Basic
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input  @error('membership') is-invalid @enderror" type="radio" name="membership" id="membershipUnlimited" value="Unlimited">
                    <label class="form-check-label" for="membershipUnlimited">
                        Unlimited
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input  @error('membership') is-invalid @enderror" type="radio" name="membership" id="membershipInactive" value="Inactive">
                    <label class="form-check-label" for="membershipInactive">
                        Inactive
                    </label>
                </div>
                
                @error('membership')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </fieldset>

            <div class="mb-4">
                <label for="memberSince" class="form-label">Member since</label>
                <input type="date" name="memberSince" id="memberSince" class="form-control @error('memberSince') is-invalid @enderror" value="{{ old('memberSince') }}">

                @error('memberSince')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="col-12 offset-lg-4 col-lg-8">
            <button type="submit" class="btn btn-dark">Add member</button>
        </div>
    </div>
</form>
@endsection