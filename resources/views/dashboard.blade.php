@extends('layouts.app')

@section('pageTitle', 'Home')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Dashboard</h1>

        <a href="{{ route('members') }}" class="btn btn-dark">View members</a>
    </div>
</div>
@endsection