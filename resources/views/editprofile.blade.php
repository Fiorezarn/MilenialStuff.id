@extends('layouts/edit_profile')

@section('title', 'Edit Profile')

@section('container')
<div class="box">
    <div class="box-content">
        <form action="{{ route('update_profile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-item">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="form-item">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}">
            </div>
            <div class="form-item">
                <label for="phonenumber">Phone</label>
                <input type="number" name="phonenumber" id="phonenumber" value="{{ $user->phonenumber }}">
            </div>
            <div class="form-item">
                <label for="password">New Password(Can be left empty)</label>
                <input type="password" name="password" id="password" placeholder="New Password">
            </div>
            <div class="form-item">
                <label for="current">Current Password</label>
                <input type="password" name="current" id="current" placeholder="Old Password">
            </div>
            <button class="edit_profile" type="submit">Update Profile</button>
        </form>
        <a href="/">Cancel</a>
        @if($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach($errors->all() as $error_data)
                        <li> {{ $error_data }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection