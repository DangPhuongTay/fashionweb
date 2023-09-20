@extends('layouts.app')

@section('content')
<div class="login-container">
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="login-right">
                <p class="login-right-title">LOGIN</p>
                <input id="email" type="email" class="login-right-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password" type="password" class="login-right-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <div class="login-right-content">
                    <p class="login-right-checkbox"><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span> Remember me</span></p>
                    <p class="login-right-link"> 
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif</p>
                </div>
                <button class="login-right-btn">LOGIN</button>
            </div>
        </form>
    </div>
@endsection
