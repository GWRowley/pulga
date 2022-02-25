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

        <h1>
            {{ $member->name }} {{ $member->surname }}
        </h1>

        <p>
            {{ $member->belt }} belt
        </p>

        <p>
            {{ $member->membership }} membership
        </p>
    </div>
</div>
@endsection