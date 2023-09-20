        <section class="product-all">
          <div class="product-header">
            <div class="product-header-name">PRODUCTS IS {{ $category->name}}</div>
            <div class="product-header-tilte">{{ $category->description}}</div>
          </div>
          <div class="product-control">
              <div class="product-control-link">
                <a href="">CATEGORY / {{ $category->name}}</a>
              </div>
              <div class="product-control-filter">
                <p>FILTER</p>
              </div>
              <div class="product-control-filter-detail">
                  <div class="filter-price filter-list">
                    <p>PRICE</p>
                    <div class="product-control-filter-detail-list">
                      <form action="#">
                      <div class="product-detail-item">
                        <input type="radio" nam="priceSort" wire:model="priceInputs" value="low-to-high"/>Low to High
                      </div>
                      <div class="product-detail-item">
                        <input type="radio" nam="priceSort" wire:model="priceInputs" value="high-to-low"/>High to Low
                      </div>
                    </form>
                  </div>
                </div>
                  <div class="filter-brand filter-list">
                    <p>BRAND</p>
                    @if($category->brands)
                    <div class="product-control-filter-detail-list">
                      <form action="#">
                      @foreach($category->brands as $brandItem)

                      <div class="product-detail-item">
                        <input type="checkbox" wire:model="brandInputs" value="{{$brandItem->name}}"/>{{$brandItem->name}}
                      </div>
                      @endforeach
                    </form>
                  </div>
                  @endif
                </div>
              </div>
          </div>
          <div class="product-content">
          @forelse($products as $key => $productItem)
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
                <div class="col-md-12 no-item-product">
                    <h6>No Product Avaliable for {{ $category->name}}</h6>
                    <a href="{{url('/collections')}}">BACK</a>
                </div>
            @endforelse
          </div>
 </section>


