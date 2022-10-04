@extends('layouts.app')

@section('pageTitle', 'Competitions')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadrcumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-dark"><i class="fa-solid fa-house"></i> <span class="visually-hidden">Dashboard</span></a></li>
                <li class="breadcrumb-item" aria-current="page">Competitions</li>
            </ol>
        </nav>
        <div class="clearfix mb-2 d-flex flex-row">
            <div>
                <h1 class="mb-0 lh-1">Competitions</h1>
            </div>
            
            <div class="ms-auto">
                <a href="{{ route('add-competition') }}" class="btn btn-dark" role="button">Add a competition</a>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="row">
    @if ($competitions->count())

    <div class="dropdown mb-4">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Past competitions
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('competitions') }}">Upcoming competitions</a></li>
        </ul>
    </div>

    @foreach ($competitions as $competition)
        @if ($competition->ownedBy(auth()->user()) && $competition->date < $dateNow)
            <div class="col-12 col-md-6 col-xl-4 mb-4">
                <div class="member-card bg-white shadow-sm h-100">                  
                    <div class="member-card-details">
                        <h2 class="fs-5">{{ $competition->title }}</h2>
                        <p class="mb-0">{{ \Carbon\Carbon::parse($competition->date)->format('jS F Y') }}</p>

                        <a href="{{ route('competitions') }}/event/{{ $competition->id}}" class="stretched-link"><span class="visually-hidden">View competition</span></a>
                    </div>    
                </div>
            </div>
        @endif      
    @endforeach                        
        
    @else
        <p>No competitions found.</p>
    @endif
</div>          

<div class="d-flex justify-content-center mt-4">
    {{ $competitions->links() }}
</div>

@endsection