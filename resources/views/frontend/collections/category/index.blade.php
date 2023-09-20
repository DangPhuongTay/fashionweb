@extends('layouts.app')

@section('title','All Category')

@section('content')
<section class="category">
          <div class="category-header-box">
            <span class="category-header">CATEGORY</span>
           </div>
          <div class="category-list">
          @forelse($categories as $key => $categoryItem)
            <div class="category-item">
                <a id="link-category" href="{{url('/collections/'.$categoryItem->slug)}}">
                    <div class="category-image">
                    <img id="image-category" src="{{asset("$categoryItem->image")}}" class="w-100" alt="Laptop">
                    </div>
                    <div class="category-content">
                        <div class="category-content-name">{{$categoryItem->name}}</div>
                        <div class="category-content-link"> 
                        <a href=""><span class="category-content-link-main">DISCOVER MORE</span></a>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-md-12">
                    <h5>No Category Avaliable</h5>
                </div>
            @endforelse
          </div>
        </section>

@endsection