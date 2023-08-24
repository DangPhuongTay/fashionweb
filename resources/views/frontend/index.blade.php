@extends('layouts.app');

@section('title','Home')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
 
  <div class="carousel-inner">
    @foreach($sliders as $key => $sliderItem)
        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
            @if($sliderItem->image)
                <img src="{{ asset("$sliderItem->image") }}" class="d-block" style="width:100vw; height:80vh;object-fit: cover;" alt="Slider">
            @endif
            <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            {{$sliderItem->title}}
                        </h1>
                        <p>
                            {{$sliderItem->description}}
                        </p>
                        <div>
                            <a href="#" class="btn btn-slider">
                                Get Now
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="py-5 bg-white">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h4>Wellcome</h4>
        <div class="underline">
        </div>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil voluptas illum dolore, sunt eveniet architecto dignissimos. Esse provident ipsa illum excepturi quasi repellat eum neque, dolores autem. Quod, saepe perferendis?
          </p>
       
      </div>
    </div>
  </div>
</div>
<div class="py-5 bg-white">
  <div class="container">
    <div class="row ">
      <div class="col-md-12">
        <h4>Trending Products<a href="{{ url('featured-products') }}" class="btn btn-warning float-end">View More</a></h4>
        <div class="underline"></div>
      </div>
      @if($trendingProducts)
      <div class="col-md-12">
      <div class="owl-carousel owl-theme four-carousel">
               @foreach($trendingProducts as $productItem)

              <div class="item">
              <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-danger">New</label>

                            @if($productItem->productImages->count()>0)
                            <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                <img src="{{ asset($productItem->productImages[0]->image)}}" alt="{{ $productItem->name}}"> -->

                              </a>
                            
                            @endif
                           
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">  {{ $productItem->brand}}</p>
                            <h5 class="product-name">
                               <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                {{ $productItem->name}}
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{ $productItem->selling_price}} VND</span>
                                <span class="original-price">{{ $productItem->original_price}} VND</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                    </div>
                </div>
              @else
                <div class="col-md-12">
                    <div class="p-2">
                    <h4>No Product Avaliable for</h4>
                    </div>
                </div>
              @endif
      </div>
    </div>
  </div>
</div>
<div class="py-5 bg-white">
  <div class="container">
    <div class="row ">
      <div class="col-md-12">
        <h4>New Arrivals<a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">View More</a></h4>
        
        <div class="underline"></div>
      </div>
      @if($newArrivalsProduct)
      <div class="col-md-12">
      <div class="owl-carousel owl-theme four-carousel">
               @foreach($newArrivalsProduct as $productItem)

              <div class="item">
              <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-danger">New</label>

                            @if($productItem->productImages->count()>0)
                            <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                <img src="{{ asset($productItem->productImages[0]->image)}}" alt="{{ $productItem->name}}"> -->

                              </a>
                            
                            @endif
                           
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">  {{ $productItem->brand}}</p>
                            <h5 class="product-name">
                               <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                {{ $productItem->name}}
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{ $productItem->selling_price}} VND</span>
                                <span class="original-price">{{ $productItem->original_price}} VND</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                    </div>
                </div>
              @else
                <div class="col-md-12">
                    <div class="p-2">
                    <h4>No Product Avaliable for</h4>
                    </div>
                </div>
              @endif
      </div>
    </div>
  </div>
</div>
<div class="py-5 bg-white">
  <div class="container">
    <div class="row ">
      <div class="col-md-12">
        <h4>Featured products<a href="{{ url('featured-products') }}" class="btn btn-warning float-end">View More</a></h4>
        
        <div class="underline"></div>
      </div>
      @if($featuredProduct)
      <div class="col-md-12">
      <div class="owl-carousel owl-theme four-carousel">
               @foreach($featuredProduct as $productItem)

              <div class="item">
              <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-danger">New</label>

                            @if($productItem->productImages->count()>0)
                            <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                <img src="{{ asset($productItem->productImages[0]->image)}}" alt="{{ $productItem->name}}"> -->

                              </a>
                            
                            @endif
                           
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">  {{ $productItem->brand}}</p>
                            <h5 class="product-name">
                               <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                {{ $productItem->name}}
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{ $productItem->selling_price}} VND</span>
                                <span class="original-price">{{ $productItem->original_price}} VND</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                    </div>
                </div>
              @else
                <div class="col-md-12">
                    <div class="p-2">
                    <h4>No Product Avaliable for</h4>
                    </div>
                </div>
              @endif
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $('.four-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection