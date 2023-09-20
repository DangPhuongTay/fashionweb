@extends('layouts.app')

@section('title','Thank You for Shopping')

@section('content')

<div class="py-3 pyt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if(session('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                <div class="p-4 shadow bg-white">
                <h2>Haha</h2>
                <h4>Thank You for Shopping with us</h4>
                <a href="{{url('collection')}}" class="btn btn-primary">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection