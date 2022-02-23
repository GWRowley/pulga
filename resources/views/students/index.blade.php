@extends('layouts.app')

@section('pageTitle', 'Students')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Students</li>
            </ol>
        </nav>
        <h1 class="d-inline-block float-start mb-3">Students</h1>
        <a href="{{ route('add-new-student') }}" class="btn btn-dark d-inline-block float-end">Add new student</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id}}</th>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->surname}}</td>
                    <td>{{ $user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection