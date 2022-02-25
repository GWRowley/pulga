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

        <h1 class="mb-4">Members</h1>
        <a href="{{ route('add-new-member') }}" class="btn btn-dark mb-4">Add new member</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Belt</th>
                    <th scope="col">Membership</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr>
                    <td class="align-middle">{{ $member->name }}</td>
                    <td class="align-middle">{{ $member->surname }}</td>
                    <td class="align-middle">{{ $member->belt }}</td>
                    <td class="align-middle">{{ $member->membership }}</td>
                    <td class="align-middle"><a href="{{ route('members') }}/profile/{{ $member->id}}" class="btn btn-dark">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection