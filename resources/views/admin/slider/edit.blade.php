@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Edit Slider
                    <a href="{{ url('admin/sliders') }}" class="btn btn-primary text-white btn-sm float-end">
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
                <form action="{{ url('admin/sliders/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value='{{ $slider->title }}' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea type="text" name="description" rows="3" class="form-control">{{ $slider->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label><br>
                        <input type="file" name="image"  class="form-control"/>
                        <img src="{{ asset("$slider->image") }}" style="width:120px;height:60px;border-radius:0;object-fit: cover" alt="ImgSlider">
                    </div>
                    <div class="mb-3">
                        <label>Status</label><br>
                        <input type="checkbox" name="status" {{$slider -> status == '1'?'checked':''}} />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection