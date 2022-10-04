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
        <div class="clearfix mb-4">
            <h1 class="mb-0 lh-1 float-start">Competitions</h1>
            <a href="{{ route('add-competition') }}" class="btn btn-dark float-end" role="button">Add a competition</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <p class="nav-link active" aria-current="page">Upcoming competitions</p>
            </li>
            <li class="nav-item">
                <a class="nav-link link-dark" href="{{ route('past-competitions') }}">Past competitions</a>
            </li>
        </ul>

        <div class="competitions-body shadow-sm">
            @if ($competitions->count())      
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>                            
                            <th scope="col"><span class="visually-hidden">Actions<span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competitions as $competition)
                        @if ($competition->ownedBy(auth()->user()) && $competition->date >= $dateNow)
                        <tr>
                            <td class="align-middle">{{ $competition->title }}</td>
                            <td class="align-middle">{{ \Carbon\Carbon::parse($competition->date)->format('jS F Y') }}</td>
                            <td class="align-middle"><a href="{{ route('competitions') }}/event/{{ $competition->id}}" class="btn btn-link" role="button">View</a></td>
                        </tr>
                        @endif
                        @endforeach                        
                    </tbody>
                </table>
            @else
                <p>No competitions found.</p>
            @endif
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $competitions->links() }}
        </div>
    </div>
</div>
@endsection