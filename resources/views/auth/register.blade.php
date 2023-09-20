@extends('layouts.app')

@section('content')
<div class="register-container">
        <form  method="POST" action="{{ route('register') }}">
            @csrf
            <div class="register-right">
                <p class="register-right-title">Create Account</p>
                <input placeholder="Name" id="name" type="text" class="register-right-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input placeholder="Email Address" id="email" type="email" class="register-right-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <input  placeholder="Password" id="password" type="password" class="register-right-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input placeholder="Confirm Password"x class="register-right-input" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <button type="submit" class="register-right-btn">
                                    {{ __('Register') }}
                                </button>
                <div class="register-right-bottom">
                    <a href="#">Already have an account?</a>
                    <a href="#" class="register-right-footer">Login</a>
                </div>
            </div>
        </form>
    </div>
@endsection
