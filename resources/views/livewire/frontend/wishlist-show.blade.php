<section class="cart">
          <div class="cart-title">WISHLIST</div>
          <div class="cart-content wishlist">
            <div class="cart-left">
              <div class="cart-left-header">
                <div class="cart-left-header-fw">Product</div>
                    <a href="#">
                    <div class="trending-content-link"><p>Delete</p></div>
                    </a>
                </div>
            </div>
              @forelse($wishlist as $wishlistItem)
                @if($wishlistItem->product)
              <div class="cart-left-content">
                @if($wishlistItem->product->productImages)
                    <a class="cart-img" href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug)}}">
                        <img id="image-cart-item" src="{{ asset($wishlistItem->product->productImages[0]->image) }}" alt="">
                    </a>
                @else
                    No Image
                @endif
                <div class="cart-left-title">
                  <p>{{$wishlistItem->product->name}}</p>
                  @if($wishlistItem->productColor)
                    @if($wishlistItem->productColor->color)
                        <span id="color-product">- Color: {{$wishlistItem->productColor->color->name }}</span>
                    @endif
                    @endif
                </div>
                  <div class="cart-left-link">
                    <div class="product-trending-content-link-box">
                      <a href="#">
                           <div class="trending-content-link cart-left-link-text">
                            <p>
                                <button type="button" wire:loading.attr="disable" wire:click="removeWishlistItem({{$wishlistItem->id}})" >
                                    <span class="cart-btn" wire:loading.remove wire:target="removeWishlistItem({{$wishlistItem->id}})">
                                        <i class="fa fa-trash"></i> REMOVE
                                    </span>
                                    <span wire:loading wire:target="removeWishlistItem({{$wishlistItem->id}})">
                                        <i class="fa fa-trash"></i>REMOVING...
                                    </span>
                                </button>
                            </p>
                        </div>
                      </a> 
                    </div>
                  </div>
                <div class="cart-left-price">
                  <span>{{$wishlistItem->product->selling_price}}</span>   
                </div>
                </div>

                @endif
                <p class="no-item">No Cart Items available</p>
              @empty
              <p class="no-item">No Cart Items available</p>
            @endforelse
            </div>
            </div>
        </div>
    </div>
</section>

