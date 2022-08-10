@extends('layouts.app')

@section('pageTitle', 'Members')

@section('content')
<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
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

<div class="row">
    <div class="col-12">       
        @if ($members->count())
            @if (request()->query('search'))
                <a href="{{ route('members') }}" class="d-block mb-4"><i class="fa-solid fa-chevron-left me-2" aria-hidden="true"></i>Back to all members</a>
            @endif

            <form class="input-group mb-3" action="{{ route('members') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Search" value="{{ request()->query('search') }}">
                <button class="btn btn-dark" type="submit"><i class="fas fa-search" aria-hidden="true"></i> Search</button>
            </form>
            
            <table class="table table-striped mb-4">
                <thead>
                    <tr>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Belt</th>
                        <th scope="col" class="d-none d-md-block">Membership</th>
                        <th scope="col"><span class="visually-hidden">Actions<span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                    @if ($member->ownedBy(auth()->user()))
                    <tr>
                        <td class="align-middle">{{ $member->name }}</td>
                        <td class="align-middle">{{ $member->surname }}</td>
                        <td class="align-middle">{{ $member->belt }}</td>
                        <td class="align-middle d-none d-md-table-cell">{{ $member->membership }}</td>
                        <td class="align-middle"><a href="{{ route('members') }}/profile/{{ $member->id}}" class="btn btn-link" role="button">View</a></td>
                    </tr>
                    @endif
                    @endforeach                        
                </tbody>
            </table>
        @else
            @if (request()->query('search'))
                <a href="{{ route('members') }}" class="d-block mb-4"><i class="fa-solid fa-chevron-left me-2" aria-hidden="true"></i>Back to all members</a>
         
                <form class="input-group mb-3" action="{{ route('members') }}" method="GET">
                    <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Search" value="{{ request()->query('search') }}">
                    <button class="btn btn-dark" type="submit"><i class="fas fa-search" aria-hidden="true"></i> Search</button>
                </form> 
                <p class="bold fs-3">No results found.</p>
                <p>We can't find any members with that term at the moment, try searching for something else.</p> 
            @else
                <p>No members found.</p>
            @endif
        @endif

        <div class="d-flex justify-content-center">
            {{ $members->appends(['search' => request()->query('search')])->links() }}
        </div>
    </div>
</div>
@endsection