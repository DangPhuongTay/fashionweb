@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Slider List
                    <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary text-white btn-sm float-end">
                        Add Slider
                    </a>
                </h3>
            </div>
            <div class="card-body">
                    <table class="table table-brodered tabke-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{$slider->id}}</td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->description}}</td>
                                    <td><img src="{{ asset("$slider->image") }}" style="width:120px;height:60px;border-radius:0;object-fit: cover" alt="ImgSlider"></td>
                                    <td>{{$slider->status=='1'?'Hidden':'Visible'}}</td>
                                    <td>
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-success">Edit</a>
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>      
            </div>
        </div>
    </div>
</div>

@endsection