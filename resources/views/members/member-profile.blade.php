@extends('layouts.app')

@section('pageTitle', 'Member profile')

@section('content')
<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-dark"><i class="fa-solid fa-house"></i> <span class="visually-hidden">Dashboard</span></a></li>
                <li class="breadcrumb-item"><a href="{{ route('members') }}" class="link-dark text-decoration-none">Members</a></li>
                <li class="breadcrumb-item" aria-current="page">{{ $member->name }} {{ $member->surname }}</li>
            </ol>
        </nav>

        <div class="member-profile-header my-4 clearfix">     
            <div class="member-profile-image">
                <img src="https://via.placeholder.com/90" class="rounded-circle img-thumbnail d-inline-block" alt="{{ $member->name }} {{ $member->surname }}">
            </div>   
            <div class="member-profile-name">
                <h1>
                    {{ $member->name }} {{ $member->surname }}
                </h1>
                <p>
                    Member since {{ \Carbon\Carbon::parse($member->memberSince)->format('jS F Y') }}
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="content-panel bg-white shadow-sm">
            <h2 class="lh-1 fs-4">Member details</h2>
            <p>Personal and membership information.</p>
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
                    <p class="mb-0">{{ $member->belt }} belt</p>
                </div>

                <div class="col-12 col-lg-6">
                    <p class="fw-bold mb-0">Membership level</p>
                    <p class="mb-0">{{ $member->membership }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection