@extends('layouts.app')

@section('pageTitle', $competition->title)

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadrcumb">
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

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="content-panel bg-white shadow-sm mb-4">
            <h2 class="lh-1 fs-4">Competition details</h2>
            <p>Information on the competition rules</p>
            <hr class="mb-4">
            @if ($competition->information)
                {!! $competition->information !!}
            @else 
                <p class="mb-0">
                    No information provided. To add information for this competition, use the edit functionality on this page.
                </p>
            @endif
        </div>

        <div class="content-panel bg-white shadow-sm mb-4">
            <h2 class="lh-1 fs-4">Competitors</h2>
            <p>Members of your gym who are competing at this event</p>
            <hr class="mb-4">
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="content-panel bg-white shadow-sm mb-4">
            <h2 class="lh-1 fs-4">Competition location</h2>       
            <p>Where the competition will be held</p>     
            <hr class="mb-4">

            <p class="mb-0">{{$competition->address_1}}</p>
            @if ($competition->address_2)
            <p class="mb-0">{{$competition->address_2}}</p>
            @endif
            <p class="mb-0">{{$competition->town_city}}</p>
            <p class="mb-0">{{$competition->postcode}}</p>
   
            </div>
        </div>
    </div>
</div>

<!-- Delete event modal -->
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