@extends('layouts.app')

@section('pageTitle', $member->name . ' ' . $member->surname)

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadrcumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-dark"><i class="fa-solid fa-house"></i> <span class="visually-hidden">Dashboard</span></a></li>
                <li class="breadcrumb-item"><a href="{{ route('members') }}" class="link-dark text-decoration-none">Members</a></li>
                <li class="breadcrumb-item" aria-current="page">{{ $member->name }} {{ $member->surname }}</li>
            </ol>
        </nav>

        <div class="member-profile-header my-4 clearfix w-100">     
            <div class="member-profile-image">
                <img src="{{ $member->avatar ? asset('images/member-avatars/' . $member->avatar) : 'https://via.placeholder.com/90?text=' . Str::substr($member->name, 0, 1) . Str::substr($member->surname, 0, 1); }}" class="rounded-circle img-thumbnail d-inline-block" alt="{{ $member->name }} {{ $member->surname }}">
            </div>   
            <div class="member-profile-name">
                <h1>
                    {{ ucfirst($member->name) }} {{ ucfirst($member->surname) }}
                </h1>
                <p>
                    Member since {{ \Carbon\Carbon::parse($member->member_since)->format('jS F Y') }}
                </p>
            </div>

            <div class="ms-auto">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="member-profile-actions" data-bs-toggle="dropdown" aria-expanded="false">
                        Edit
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="member-profile-actions">
                        <li><a class="dropdown-item" href="{{ route('members') }}/edit-member/{{ $member->id }}">Edit member</a></li>  
                        <li><span class="dropdown-item m-0" data-bs-toggle="modal" data-bs-target="#delete-modal" role="button">Delete member</span></li>     
                    </ul>
                </div>
            </div>      
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="content-panel bg-white shadow-sm mb-4">
            <h2 class="lh-1 fs-4">Member details</h2>
            <p>Personal and membership information</p>
            <hr class="mb-4">

            <div class="row">      
                <div class="col-12 col-lg-6">
                    <p class="fw-bold mb-0">Age</p>
                    <p>{{ $age }}</p>
                </div>

                <div class="col-12 col-lg-6">
                    <p class="fw-bold mb-0">Gender</p>
                    <p>{{ $member->gender }}</p>
                </div>

                <div class="col-12 col-lg-6">
                    <p class="fw-bold mb-0">Current belt</p>
                    <p class="mb-0">{{ $member->belt }}</p>
                </div>

                <div class="col-12 col-lg-6">
                    <p class="fw-bold mb-0">Membership level</p>
                    <p class="mb-0">{{ $member->membership }}</p>
                </div>
            </div>
        </div>

        <div class="content-panel bg-white shadow-sm mb-4">
            <h2 class="lh-1 fs-4">Additional details</h2>
            <p>Emergency contact details and medical information</p>
            <hr class="mb-4">

            <div class="row">      
                <div class="col-12 col-lg-6">
                    <p class="fw-bold mb-0">Emergency contact</p>
                    <p>{{ ucwords($member->emergency_contact) }}</p>
                </div>

                <div class="col-12 col-lg-6">
                    <p class="fw-bold mb-0">Emergency contact number</p>
                    <p>{{ $member->emergency_number }}</p>
                </div>
                
                <div class="col-12 medical-conditions">
                    <p class="fw-bold mb-0">Medical conditions</p>
                    @if ($member->medical_information)
                        {!! $member->medical_information !!}
                    @else 
                        <p class="mb-0">
                            N/A
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="content-panel bg-white shadow-sm mb-4">
            <h2 class="lh-1 fs-4">Promotion history</h2>
            <p>Timeline of belt progression</p>
            <hr class="mb-4">

            <div class="timeline belt-timeline">               
                <div class="timeline-item belt-achieved">
                    <p class="@if($member->belt === 'White')fw-bold @endif fs-6 mt-3 mb-0">White</p>
                    <p class="mb-0">Achieved {{ \Carbon\Carbon::parse($member->member_since)->format('F Y') }}</p>
                </div>

                <div class="timeline-item @if($member->belt === 'Blue') belt-achieved @endif">
                    <p class="@if($member->belt === 'Blue')fw-bold @endif fs-6 mt-3 mb-0">Blue</p>
                    @if($member->belt === 'Blue')
                    <p class="mb-0">Achieved {{ \Carbon\Carbon::parse($member->member_since)->format('F Y') }}</p>
                    @endif
                </div>

                <div class="timeline-item">
                     <p class="@if($member->belt === 'Purple')fw-bold @endif fs-6 mt-3 mb-0">Purple</p>
                </div>

                <div class="timeline-item">
                     <p class="@if($member->belt === 'Brown')fw-bold @endif fs-6 mt-3 mb-0">Brown</p>
                </div>

                <div class="timeline-item">
                     <p class="@if($member->belt === 'Black')fw-bold @endif fs-6 mt-3 mb-0">Black</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete member modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="delete-modal-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="d-flex justify-content-start align-items-center mb-4">
                    <div class="modal-icon d-flex justify-content-center align-items-center me-3 bg-opacity-25 bg-danger rounded-circle float-start">
                        <i class="fa-solid fa-triangle-exclamation text-danger" aria-hidden="true"></i>
                    </div>

                    <h3 class="fs-4 mb-0 d-inline-block" id="delete-modal-title">Delete member</h3>
                </div>
            
                <p>Are you sure you want to delete this member? All of the data associated with this member will be permanently removed. This action cannot be undone.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                <a href="{{ route('members') }}/delete-member/{{ $member->id }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection