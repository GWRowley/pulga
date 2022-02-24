@extends('layouts.app')

@section('pageTitle', 'Members')

@section('content')
<div class="row">
    <div class="col-12">

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