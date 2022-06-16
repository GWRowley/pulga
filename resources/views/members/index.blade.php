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
        <div class="clearfix mb-4">
            <h1 class="mb-0 lh-1 float-start">Members</h1>
            <a href="{{ route('add-new-member') }}" class="btn btn-dark float-end" role="button">Add new member</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">        
        @if ($members->count())
            <table class="table table-striped mb-4">
                <thead>
                    <tr>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Belt</th>
                        <th scope="col">Membership</th>
                        <th scope="col"><span class="visually-hidden">Actions<span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                    @if ($member->ownedBy(auth()->user()))
                    <tr>
                        <td class="align-middle">{{ ucfirst($member->name) }}</td>
                        <td class="align-middle">{{ ucfirst($member->surname) }}</td>
                        <td class="align-middle">{{ $member->belt }}</td>
                        <td class="align-middle">{{ $member->membership }}</td>
                        <td class="align-middle"><a href="{{ route('members') }}/profile/{{ $member->id}}" class="btn btn-dark" role="button">View</a></td>
                    </tr>
                    @endif
                    @endforeach                        
                </tbody>
            </table>
        @else
            <p>No members found.</p>
        @endif

        <div class="d-flex justify-content-center">
            {{ $members->links() }}
        </div>
    </div>
</div>
@endsection