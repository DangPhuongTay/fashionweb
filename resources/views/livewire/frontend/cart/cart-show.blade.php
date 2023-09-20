<section class="cart">
          <div class="cart-title">Your Cart</div>
          <div class="cart-content">
            <div class="cart-left">
              <div class="cart-left-header">
                <div class="cart-left-header-fw">Product</div>
                <a href="#">
                  <div class="trending-content-link"><p>Delete</p></div>
                </a>
              </div>
              @forelse($cart as $cartItem)
            @if($cartItem->product)
              <div class="cart-left-content">
                @if($cartItem->product->productImages)
                    <a class="cart-img" href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug)}}">
                        <img id="image-cart-item" src="{{ asset($cartItem->product->productImages[0]->image) }}" alt="">
                    </a>
                @else
                    No Image
                @endif
                <div class="cart-left-title">
                  <p>{{$cartItem->product->name}}</p>
                  @if($cartItem->productColor)
                    @if($cartItem->productColor->color)
                        <span id="color-product">- Color: {{$cartItem->productColor->color->name }}</span>
                    @endif
                @endif
                  <div class="cart-left-link">
                    <div class="product-trending-content-link-box">
                      <a href="#">
                           <div class="trending-content-link cart-left-link-text">
                            <p>
                                <button type="button" wire:loading.attr="disable" wire:click="removeCartItem({{$cartItem->id}})" >
                                    <span class="cart-btn" wire:loading.remove wire:target="removeCartItem({{$cartItem->id}})">
                                        <i class="fa fa-trash"></i> REMOVE
                                    </span>
                                    <span wire:loading wire:target="removeCartItem({{$cartItem->id}})">
                                        <i class="fa fa-trash"></i>REMOVING...
                                    </span>
                                </button>
                            </p>
                        </div>
                      </a> | 
                      <a href="#">
                           <div class="trending-content-link cart-left-link-text"><p>                        
                            <p  wire:click= "addToWishList({{ $cartItem->id}})">
                            <span class="cart-btn" wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i>
                                    FAVORITE
                                 </span>
                                 <span wire:loading wire:target="addToWishList">
                                    ADDING...
                                 </span>
                                 </p>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="cart-left-wantity">
                <div class="number-input">
                            <button wire:loading.attr="disable" wire:click="decrementQuantity({{$cartItem->id}})"></button>
                            <input id="quantity-product" type="number" value="{{$cartItem->quantity}}" class="input-quantity" />
                            <button wire:loading.attr="disable" class="plus" wire:click="incrementQuantity({{$cartItem->id}})"></button>
                        </div>
                </div>
                <div class="cart-left-price">
                  <span>{{$cartItem->product->selling_price * $cartItem->quantity}}</span>
                  @php $totalPrice += $cartItem->product->selling_price * $cartItem->quantity @endphp
                </div>
              </div>

              @endif
                    @empty
                    <div class="no-item-cart">No Cart Items available</div>
            @endforelse

            </div>
            <div class="cart-right">
              <form action="" class="cart-right-from">
                <div class="cart-right-header">
                  <p>Oder Summary</p>
                </div>
                <div class="cart-right-body">

               
                </div>
              <div class="cart-right-content">
                <p>Total</p>
                <p class="cart-right-content-fw">${{$totalPrice}}</p>
            </div>
              <div class="cart-right-content-link"><a href="{{ url('/checkout') }}">CHECKOUT</a></div>
              </form>
            </div>
          </div>
        </section>

