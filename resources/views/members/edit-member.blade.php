@extends('layouts.app')

@section('pageTitle', 'Edit member')

@section('content')

@if($errors->any())
    @include('partials.error-summary')
@endif

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
        
        <div class="mb-2 d-flex align-items-center">
            <h1 class="fs-2 mb-0 lh-1">Edit member</h1>
            <a href="{{ route('members') }}/profile/{{ $member->id}}" class="btn btn-dark ms-auto" role="button">Cancel</a>
        </div>
    </div>
</div>

<hr>
    
<form action="/members/update-member/{{ $member->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf
    @method('PUT')

    <input type="hidden" id="id" name="id" value="{{ $member->id }}">
   
    <div class="row">
        <div class="col-12 col-lg-4">
            <h2 class="fs-5">Personal information</h2>
            <p>This is basic information about the member.</p>
        </div>

        <div class="col-12 col-lg-8">
            <div class="mb-4">
                <label for="name" class="form-label" autocomplete="off">First name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ ucfirst($member->name) }}">

                @error('name')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="surname" class="form-label">Last name</label>
                <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ ucfirst($member->surname) }}">

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

            <div>
                <input type="hidden" name="avatar_id" id="avatarId" class="form-control @error('avatar_id') is-invalid @enderror" value="{{ $member->avatar_id }}">
            </div>

            <div class="mb-4">
                <label for="avatar" class="form-label d-block">Profile picture</label>

                <div class="d-flex flex-row align-items-center">
                    @if ($member->avatar )
                    <div class="member-profile-image mb-2">
                        <img src="{{ asset('images/member-avatars/' . $member->avatar) }}" class="rounded-circle img-thumbnail d-inline-block" alt="{{ $member->name }} {{ $member->surname }}">
                    </div>
                    @endif
                    <div class="float-start @if (! $member->avatar )w-100 @endif">
                        <input type="file" accept="image/*" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror" value="{{ $member->avatar }}">
                        <div id="avatar-help" class="form-text">Your file should be a .jpg, .jpeg or .png and less than 5MB in size.</div>
                    </div>                
                </div>

               
                @error('avatar')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>
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
                <input type="date" name="member_since" id="memberSince" class="form-control @error('member_since') is-invalid @enderror" value="{{ $member->member_since }}">

                @error('member_since')
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
                <input type="text" name="emergency_contact" id="emergencyContact" class="form-control @error('emergency_contact') is-invalid @enderror" value="{{ ucwords($member->emergency_contact) }}">

                @error('emergency_contact')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="emergencyNumber" class="form-label">Emergency contact number</label>
                <input type="tel" name="emergency_number" id="emergencyNumber" class="form-control @error('emergency_number') is-invalid @enderror" value="{{ $member->emergency_number }}">

                @error('emergency_number')
                    <p class="mt-1 invalid-feedback fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="medicalInformation" class="form-label">Medical conditions</label>
                <textarea rows="3" name="medical_information" id="medicalInformation" class="ckeditor form-control">{{ $member->medical_information }}</textarea>
                <div id="medical-info-help" class="form-text">This field is optional, only add details if necessary.</div>
            </div>
        </div>

        <div class="col-12 offset-lg-4 col-lg-8">
            <button type="submit" class="btn btn-dark">Save changes</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection