@extends('layouts.app')

@section('pageTitle', 'Timetable')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadrcumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-dark"><i class="fa-solid fa-house"></i> <span class="visually-hidden">Dashboard</span></a></li>
                <li class="breadcrumb-item" aria-current="page">Timetable</li>
            </ol>
        </nav>
        <div class="clearfix mb-4">
            <h1 class="mb-0 lh-1 float-start">Timetable</h1>
            <a href="#" class="btn btn-dark float-end" role="button">Add a class</a>
        </div>
    </div>
</div>

<hr class="mb-4">

<div class="row">
    <div class="col-12">  
        <div class="content-panel bg-white shadow-sm">
            <h2 class="h5">
                Monday
            </h2>

            <hr class="mb-4">

            <h2 class="h5">
                Tuesday
            </h2>

            <hr class="mb-4">

            <h2 class="h5">
                Wednesday
            </h2>

            <hr class="mb-4">

            <h2 class="h5">
                Thursday
            </h2>

            <hr class="mb-4">
    
            <h2 class="h5">
                Friday
            </h2>

            <hr class="mb-4">
    
            <h2 class="h5">
                Saturday
            </h2>

            <hr class="mb-4">

            <h2 class="h5">
                Sunday
            </h2>
        </div>
    </div>
</div>

@endsection