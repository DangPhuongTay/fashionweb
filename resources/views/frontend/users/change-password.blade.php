@extends('layouts.app')

@section('title','Change Password')

@section('content')
    <section class="profile">
                <div class="profile-container main">
                    <div class="profile-right">
                        <div class="profile-change-pass">
                            <div class="profile-header">CHANGE PASSWORD</div><a href="{{ url('profile') }}">BACK</a>
                        </div>
                        <div class="profile-info">
                            <form action="{{ url('change-password') }}" method="POST">
                            @csrf
                                <div class="profile-item-cp">
                                    <input type="text" placeholder="Old Password" name="current_password">
                                </div>
                                <div class="profile-item-cp">
                                    <input type="text" placeholder="New Password" name="password">
                                </div>
                                <div class="profile-item-cp">
                                    <input type="text" placeholder="Conform Password"name="password_confirmation">
                                </div>
                                <div class="profile-item">
                                    <input type="submit" value="SAVE">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </section>
@endsection