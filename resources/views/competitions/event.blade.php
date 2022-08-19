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
                        <li><a class="dropdown-item" href="{{ route('competitions') }}/edit-event/{{ $competition->id }}">Edit competition</a></li>  
                        <li><span class="dropdown-item m-0" data-bs-toggle="modal" data-bs-target="#delete-modal" role="button">Delete competition</span></li>     
                    </ul>
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

                    <h3 class="fs-4 mb-0 d-inline-block" id="delete-modal-title">Delete competition</h3>
                </div>
            
                <p>Are you sure you want to delete this competition? All of the data associated with this competition will be permanently removed. This action cannot be undone.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                <a href="{{ route('competitions') }}/delete-event/{{ $competition->id }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endsection