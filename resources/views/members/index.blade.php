@extends('layouts.app')

@section('pageTitle', 'Members')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Members</li>
            </ol>
        </nav>
        <h1 class="d-inline-block float-start mb-3">Members</h1>
        <a href="{{ route('add-new-member') }}" class="btn btn-dark d-inline-block float-end">Add new member</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr>
                    <th scope="row">{{ $member->id}}</th>
                    <td>{{ $member->name}}</td>
                    <td>{{ $member->surname}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection