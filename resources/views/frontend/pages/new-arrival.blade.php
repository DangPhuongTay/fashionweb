@extends('layouts.app')

@section('title','New Arrivals Product')

@section('content')
<section class="product-all">
          <div class="product-control">
              <div class="product-control-link">
                <H6>NEW ARRIVALS</H6>
              </div>
              <div class="product-control-link">
                <a href="{{ url('/collections') }}">VIEW MORE</a>
              </div>
          </div>
          <div class="product-content">
          @forelse($newArrivalsProduct as $key => $productItem)
                <div class="product-item">
                    <div class="product-img">
                    @if($productItem->productImages->count()>0)
                        <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                            <img src="{{ asset($productItem->productImages[0]->image)}}" alt="{{ $productItem->name}}">
                        </a>
                    @endif
                </div>
                <div class="product-name">
                    <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}" class="product-name-text">{{ $productItem->name}}</a>
                    <p class="product-name-price">${{ $productItem->selling_price}}</p>
                </div>
                <div class="product-check">
                    @if($productItem->quantity > 0)
                        <p>IN STOCK</p>
                    @else
                        <p>OUT STOCK</p>
                    @endif
                </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="p-2">
                    <h4>No Product Avaliable for {{ $category->name}}</h4>
                    </div>
                </div>
            @endforelse
          </div>
</section>          
@endsection