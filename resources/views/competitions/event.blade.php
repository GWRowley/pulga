@extends('layouts.app')

@section('pageTitle', $competition->title)

@section('content')
<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-dark"><i class="fa-solid fa-house"></i> <span class="visually-hidden">Dashboard</span></a></li>
                <li class="breadcrumb-item"><a href="{{ route('competitions') }}" class="link-dark text-decoration-none">Competitions</a></li>
                <li class="breadcrumb-item" aria-current="page">{{ $competition->title }}</li>
            </ol>
        </nav>

        <div class="member-profile-header my-4 clearfix w-100">
            <div class="member-profile-name">
                <h1>
                    {{ $competition->title }}
                </h1>
                <p>
                    {{ \Carbon\Carbon::parse($competition->date)->format('jS F Y') }}
                </p>
            </div>

            <div class="ms-auto">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="member-profile-actions" data-bs-toggle="dropdown" aria-expanded="false">
                        Edit
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="member-profile-actions">
                        <li><a class="dropdown-item" href="{{ route('competitions') }}/edit-competition/{{ $competition->id }}">Edit competition</a></li>  
                        <li><span class="dropdown-item m-0" data-bs-toggle="modal" data-bs-target="#delete-modal" role="button">Delete competition</span></li>     
                    </ul>
                </div>
            </div>      
        </div>
    </div>
</div>
@endsection