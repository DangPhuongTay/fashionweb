@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Update Colors
                    <a href="{{ url('admin/colors') }}" class="btn btn-primary text-white btn-sm float-end">
                        Back
                    </a>
                </h3>
            </div>
            @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
            <div class="card-body">
                <form action="{{ url('admin/colors/'.$color->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Color Name</label>
                        <input type="text" name="name" value="{{ $color->name }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Color Code</label>
                        <input type="text" name="code" value="{{ $color->code }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Status</label><br>
                        <input type="checkbox" name="status" {{$color->status == '1'? 'checked':''}} />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection