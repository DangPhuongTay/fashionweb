@extends('layouts.app')

@section('title','Home')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
 
  <div class="carousel-inner">
    @foreach($sliders as $key => $sliderItem)
        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
            @if($sliderItem->image)
                <img id="item_image" src="{{ asset("$sliderItem->image") }}" class="d-block" style="width:100vw; height:80vh;object-fit: cover;" alt="Slider">
            @endif
            <!-- <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1 id="title_slider">
                            {{$sliderItem->title}}
                        </h1>
                        <p id="title_description">
                            {{$sliderItem->description}}
                        </p>
                        <div>
                            <a href="#" class="btn btn-slider">
                                Get Now
                            </a>
                        </div>
                    </div>
                </div> -->
        </div>
    @endforeach
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden text-dark">Next</span>
  </button>
</div>

      <section class="product-featured">
       <div class="product-featured-header-box">
        <a href="{{ url('featured-products') }}"><span class="product-featured-header">FEATURED</span></a>
       </div>

        <div class="product-featured-header-slider">
          @if($newArrivalsProduct)
          @foreach($newArrivalsProduct as $productItem)
          <div class="product-featured-header-slider-item">
            <div class="featured-header-slider-item-image">
              <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                @if($productItem->productImages->count()>0)
                  <img src="{{ asset($productItem->productImages[0]->image)}}" alt="{{ $productItem->name}}">
                @endif
              </a>
            </div>
            <div class="featured-header-slider-item-name"><p>{{ $productItem->name}}</p></div>
          </div>
          @endforeach
          @endif
        </div>
      </section>
      <section class="product-new">
        <div class="product-new-list">
          @if($newArrivalsProduct)
          @foreach($newArrivalsProduct as $productItem)
          <div class="product-new-item">
            <div class="product-new-item-img">
              @if($productItem->productImages->count()>0)
                <img src="{{ asset($productItem->productImages[0]->image)}}" alt="{{ $productItem->name}}">
              @endif
            </div>
            <div class="product-new-item-text">
              <div class="product-new-item-text-brand"><p>NEW CLOTHES</p></div>
                <div class="product-new-item-text-box">
                  <div class="product-new-item-text-name"><p>{{ $productItem->name}}</p></div>
                  <div class="product-new-item-text-link"><a href="{{ url('new-arrivals') }}">VIEW MORE NEW</a></div>
                </div>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </section>
      <section class="product-trending">
        <div class="product-trending-header">
          TRENDING
        </div>
        <div class="product-trending-container">
          <div class="product-trending-img">
            @if($trendingProducts)
            @foreach($trendingProducts as $productItem)
              <div class="img">
              <img src="{{ asset($productItem->productImages[0]->image)}}" alt="{{ $productItem->name}}">
              </div>
            @endforeach
            @endif
          </div>
          <div class="product-trending-content">
            <div class="product-trending-content-title">
              <p>FALL WINTER 2023</p>
            </div>
            <div class="product-trending-content-des">
              <p>The new campaign with Vittoria Ceretti, Aboubakar Konte, and Brando Erba.</p>
            </div>
            <div class="product-trending-content-link-box">
              <a href="{{ url('featured-products') }}">
                   <div class="trending-content-link"><p>VIEW MORE NEW</p></div>
              </a>
            </div>
          </div>
        </div>
    </section>
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