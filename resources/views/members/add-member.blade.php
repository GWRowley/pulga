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
                    <input class="form-check-input" type="radio" name="gender" id="gender-male">
                    <label class="form-check-label" for="gender-male">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender-female">
                    <label class="form-check-label" for="gender-female">
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
                <label for="emergency-contact" class="form-label">Emergency contact name</label>
                <input type="text" name="emergency-contact" id="emergency-contact" class="form-control @error('emergency-contacy') is-invalid @enderror" value="{{ old('emergency-contact') }}">

                @error('emergency-contact')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="emergency-number" class="form-label">Emergency contact number</label>
                <input type="tel" name="emergency-number" id="emergency-number" class="form-control @error('emergency-number') is-invalid @enderror" value="{{ old('emergency-number') }}">

                @error('emergency-number')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="medical-information" class="form-label">Medical conditions</label>
                <textarea rows="3" name="medical-information" id="medical-information" class="form-control" value="{{ old('name') }}"></textarea>
                <div id="password-help" class="form-text">This field is optional, only add details if necessary.</div>
            </div>
        </div>

        <hr> <!-- End of additional information -->

        <div class="col-12 col-lg-4">
            <h2 class="fs-4">Membership information</h2>
            <p>This is basic information about the member.</p>
        </div>

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <p id="belt-label" class="form-label">Belt</p>
                <select name="belt" id="belt" class="form-select" aria-labelledby="belt-label">
                    
                    <option value="white" selected>White</option>
                    <option value="blue">Blue</option>
                    <option value="purple">Purple</option>
                    <option value="brown">Brown</option>
                    <option value="black">Black</option>
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
                    <input class="form-check-input" type="radio" name="membership" id="membership-basic" checked>
                    <label class="form-check-label" for="membership-basic">
                        Basic
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="membership" id="membership-unlimited">
                    <label class="form-check-label" for="membership-unlimited">
                        Unlimited
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="membership" id="membership-inactive">
                    <label class="form-check-label" for="membership-inactive">
                        Inactive
                    </label>
                </div>
                
                @error('membership')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </fieldset>

            <div class="mb-4">
                <label for="member-since" class="form-label">Member since</label>
                <input type="date" name="member-since" id="member-since" class="form-control @error('member-since') is-invalid @enderror" value="{{ old('member-since') }}">
            </div>
        </div>

        <div class="col-12 offset-lg-4 col-lg-8">
            <button type="submit" class="btn btn-dark">Add member</button>
        </div>
    </div>
</form>
@endsection