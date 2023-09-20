@extends('layouts.app')

@section('title','Search Product')

@section('content')
    <section class="profile">   
            <div class="profile-container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if($errors->any())
            <ul class="alert alert-warning">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
                <div class="profile-left">
                    <div class="profile-image">
                        <img src="https://picsum.photos/300" alt="">
                    </div>
                    <div class="profile-name">
                        <p>Lê Minh Tiến</p>
                    </div>
                </div>
                <div class="profile-right">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if($errors->any())
                    <ul class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="profile-change-pass">
                      <div class="profile-header">ACCOUNT SETTING</div>
                      <a href="{{ url('change-password') }}">Change password</a>
                    </div>
                    <div class="profile-info">
                        <form  action="{{ url('profile') }}" method="POST">
                        @csrf
                            <div class="profile-item">
                                <input type="text" name="name" placeholder="User Name" value="{{Auth::user()->name}}" >
                                <input type="text" name="email" placeholder="Email Address" value="{{Auth::user()->email}}">
                            </div>
                            <div class="profile-item">
                                <input type="text" name="phone" placeholder="Phone Number" value="{{Auth::user()->userDetail->phone ?? ''}}">
                                <input type="text" name="pin_code" placeholder="Pin Code" value="{{Auth::user()->userDetail->pin_code ?? ''}}">
                            </div>
                            <div class="profile-item item-3">
                            <textarea type="text" name="address" 
                                row="7" >{{Auth::user()->userDetail->address ?? ''}}
                                </textarea>
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