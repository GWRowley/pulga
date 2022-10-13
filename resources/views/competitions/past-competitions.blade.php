@extends('layouts.app')

@section('pageTitle', 'Past competitions')

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
    <div class="dropdown mb-4">
        <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Past competitions
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('competitions') }}">Upcoming competitions</a></li>
        </ul>
    </div>

    @if ($competitions->count())
        @foreach ($competitions as $competition)
            @include('partials.competition-card')
        @endforeach       
    @else 
        <div class="col-12">
            <div class="content-panel bg-white shadow-sm"> 
                <p class="mb-0">No past competitions found.</p>
            </div>
        </div>
    @endif  
</div>          

<div class="d-flex justify-content-center mt-4">
    {{ $competitions->links() }}
</div>

@endsection