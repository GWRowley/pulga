@extends('layouts.app')

@section('pageTitle', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">Dashboard</h1>
    </div>

    <div class="col-12 col-lg-4">
        <div class="content-panel bg-white shadow-sm">
            <h2 class="mb-4 fs-4">
                Timetable
            </h2>

            <a href="{{ route('timetable') }}" class="btn btn-dark" role="button">View timetable</a>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="content-panel bg-white shadow-sm">
            <h2 class="mb-4 fs-4">
                Members
            </h2>

            <a href="{{ route('members') }}" class="btn btn-dark" role="button">View members</a>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="content-panel bg-white shadow-sm">
            <h2 class="mb-4 fs-4">
                Comeptitions
            </h2>

            <a href="{{ route('competitions') }}" class="btn btn-dark" role="button">View competitions</a>
        </div>
    </div>

</div>
@endsection