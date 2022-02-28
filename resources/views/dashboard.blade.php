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
                Members
            </h2>

            <a href="{{ route('members') }}" class="btn btn-dark">View members</a>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="content-panel bg-white shadow-sm">
            <h2 class="mb-4 fs-4">
                Classes
            </h2>

            <a href="#" class="btn btn-dark">View classes</a>
        </div>
    </div>

        <div class="col-12 col-lg-4">
        <div class="content-panel bg-white shadow-sm">
            <h2 class="mb-4 fs-4">
                Reports
            </h2>

            <a href="#" class="btn btn-dark">View reports</a>
        </div>
    </div>
</div>
@endsection