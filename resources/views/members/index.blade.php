@extends('layouts.app')

@section('pageTitle', 'Members')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadrcumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-dark"><i class="fa-solid fa-house"></i> <span class="visually-hidden">Dashboard</span></a></li>
                <li class="breadcrumb-item" aria-current="page">Members</li>
            </ol>
        </nav>
        <div class="clearfix mb-2">
            <h1 class="mb-0 lh-1 float-start">Members</h1>
            <a href="{{ route('add-new-member') }}" class="btn btn-dark float-end" role="button">Add a member</a>
        </div>
    </div>
</div>

<hr class="mb-4">

@if ($members->count())
<div class="row">
    <div class="col-12">
        @if (request()->query('search'))
            <a href="{{ route('members') }}" class="d-block mb-4"><i class="fa-solid fa-chevron-left me-1" aria-hidden="true"></i>Back to all members</a>
        @endif

        <form class="input-group mb-4" action="{{ route('members') }}" method="GET">
            <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Search" value="{{ request()->query('search') }}">
            <button class="btn btn-dark" type="submit"><i class="fas fa-search" aria-hidden="true"></i> Search</button>
        </form>
    </div>
</div>
@endif

<div class="row">
    @if ($members->count())
        @foreach ($members as $member)
            @if ($member->ownedBy(auth()->user()))
                <div class="col-12 col-md-6 col-xl-4 mb-4">
                    <div class="member-card bg-white shadow-sm h-100">                   
                        <div class="member-card-image">
                            <img src="{{ $member->avatar ? asset('images/member-avatars/' . $member->avatar) : 'https://via.placeholder.com/90?text=' . Str::substr($member->name, 0, 1) . Str::substr($member->surname, 0, 1); }}" class="rounded-circle img-thumbnail d-inline-block" alt="{{ $member->name }} {{ $member->surname }}">
                        </div>
                        <div class="member-card-details">
                            <h2 class="fs-5">{{ $member->name }} {{ $member->surname }}</h2>
                            <p class="mb-0">{{ $member->belt }} belt</p>
                            <p class="mb-0">{{ $member->membership }} membership</p>

                            <a href="{{ route('members') }}/profile/{{ $member->id}}" class="stretched-link"><span class="visually-hidden">View member</span></a>
                        </div>    
                    </div>
                </div>
            @endif
        @endforeach          
    @else
        <div class="col-12">
            <div class="content-panel bg-white shadow-sm mb-4"> 
                @if (request()->query('search'))
                    <a href="{{ route('members') }}" class="d-block mb-4"><i class="fa-solid fa-chevron-left me-1" aria-hidden="true"></i>Back to all members</a>
            
                    <form class="input-group mb-3" action="{{ route('members') }}" method="GET">
                        <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Search" value="{{ request()->query('search') }}">
                        <button class="btn btn-dark" type="submit"><i class="fas fa-search" aria-hidden="true"></i> Search</button>
                    </form> 
                    <p class="bold fs-3">No results found.</p>
                    <p class="mb-0">We can't find any members with that term at the moment, try searching for something else.</p>
                @else
                    <p class="mb-0">No members found.</p>
                @endif
            </div>
        </div>
    @endif
</div>

<div class="d-flex justify-content-center">
    {{ $members->appends(['search' => request()->query('search')])->links() }}
</div>
    
</div>
@endsection
<script>
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>