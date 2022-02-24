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
    @foreach ($members as $member)
    <div class="col-12 col-sm-6 col-xl-3 mb-4">
        <div class="member-card shadow-sm h-100">
            <div class="member-image">
                <img src="https://via.placeholder.com/200x150" alt="{{ $member->name}} {{ $member->surname}}">
            </div>
            
            <div class="member-content">
                <div class="member-name mb-4">
                    <h2 class="fs-5">
                        {{ $member->name}} {{ $member->surname}}
                    </h2>
                </div>
                
                <div class="d-block">     
                    <div class="member-details">
                        <h3>Belt</h3>
                        <p>Purple</p>
                    </div>

                    <div class="member-details">
                        <h3>Membership</h3>
                        <p>Unlimited</p>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    @endforeach
</div>
@endsection