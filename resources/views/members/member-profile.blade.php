@extends('layouts.app')

@section('pageTitle', 'Member profile')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>
            {{ $member->name }} {{ $member->surname }}
        </h1>
    </div>
</div>
@endsection