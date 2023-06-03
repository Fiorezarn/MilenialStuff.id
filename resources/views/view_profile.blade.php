@extends('layouts/edit_profile')
@section('css', '/css/view_profile.css')
@section('title', 'Profile')

@section('content')
<div class="box">
    <div class="box-content">
        <div class="form">
            <div class="form-item">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" disabled>
            </div>
            <div class="form-item">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" disabled>
            </div>
            <div class="form-item">
                <label for="phonenumber">Phone</label>
                <input type="text" name="phonenumber" id="phonenumber" value="{{ $user->phonenumber }}" disabled>
            </div>
            <a href="{{ route('edit_profile') }}">Edit Profile</a>
        </div>

    </div>
</div>
@endsection
