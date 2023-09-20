<section class="product-detail">
        @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="product-detail-container">
                <div class="product-detail-image " wire:ignore>
                @if($product->productImages)
                    <div class="exzoom" id="exzoom" style="background-color: #fff;">
                        <!-- Images -->
                        <div class="exzoom_img_box ">
                            <ul class='exzoom_img_ul'>
                            @foreach ($product->productImages as $itemImg)
                                <li><img id="image-product"  src="{{ asset($itemImg->image)}}"/></li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                        </div> 
                        @else
                            No Image Added
                        @endif
                    </div>
                <div class="product-detail-content">
                 <div class="product-detail-info">
                    <div class="product-detail-header">
                        <div class="product-detail-header-link">HOME / {{$product->category->name}} / {{ $product->name}}</div>
                        <div class="product-detail-header-back"><a href="{{url('/collections/'.$category->slug)}}">BACK</a></div>
                    </div>
                    <div class="product-detail-content-name">{{ $product->name }}</div>
                    <div class="product-detail-content-brand"><p>{{$product->category->name}}</p></div>
                    <div class="product-detail-content-small-des">{{ $product->small_description}}</div>
                    <div class="product-detail-content-price">
                        <div class="product-detail-content-price-original">{{ $product->original_price}}$</div>
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                        <div class="product-detail-content-price-seling">{{ $product->selling_price}}$</div>
                    </div>
                    <div class="product-detail-content-color">
                    @if($product->productColors->count()>0)
                                @if($product->productColors)
                                    @foreach($product->productColors as $colorItem)
                                        <!-- <input type="radio" name="colorSelection" value="{{ $colorItem->id }}">{{ $colorItem->color->name }} -->
                                        <label id="color-product" class="btn-sm colorSelectionLable text-white" style="background-color: {{$colorItem->color->code}}"
                                            wire:click="colorSelected({{$colorItem->id}})">
                                            {{$colorItem->color->name}}
                                        </label>
                                    @endforeach
                                @endif
                                <div>
                                <div></div>
                                @if($this -> prodColorSelectedQuantity == 'outOfStock')
                                    <label class="btn-sm label-stock py-1 mt-2 text-dark bg-dark">OUT STOCK</label>
                                @elseif($this -> prodColorSelectedQuantity > 0)
                                    <label class="btn-sm label-stock py-1 mt-2 text-dark bg-light">IN STOCK</label>
                                @endif
                                </div>
                            @else
                                @if($product->quantity)
                                    <label class="btn-sm label-stock py-1 mt-2 text-dark bg-light">IN STOCK</label>
                                @else
                                    <label class="btn-sm label-stock py-1 mt-2 text-light bg-dark">OUT STOCK</label>
                                @endif
                            @endif
                    </div>
                    <div class="product-detail-content-quanity">
                        <div class="number-input">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown() " wire:click="decrementQuantity"></button>
                            <input class="quantity" min="0" name="quantity" value="1" type="number" wire:model="quantityCount" value="{{$this->quantityCount}}" readonly>
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus" wire:click="incrementQuantity"></button>
                        </div>
                        </div>
                    </div>

                    <div class="product-detail-btn">
                        <div class="product-detail-btn-cart" type="button" wire:click="addToCart({{$product->id}})">
                            ADD TO CART
                        </div>
                        <div class="product-detail-btn-wish" wire:click= "addToWishList({{ $product->id}})">
                            
                            <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i>
                                    ADD TO WISHLIST
                                 </span>
                                 <span wire:loading wire:target="addToWishList">
                                    ADDING...
                                 </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="product-detail-content-des">
              <div class="product-detail-content-des-header-box">
                <p class="product-detail-content-des-header">DESCRIPTION</p>
              </div>
                <span>
                    {{ $product->description}}

                </span>
            </div>
        </section>
    @push('scripts')
    <script>
        $(function(){
            
        $("#exzoom").exzoom({
        "navWidth": 60,
        "navHeight": 60,
        "navItemNum": 5,
        "navItemMargin": 7,
        "navBorder": 1,
        "autoPlay": false,
        "autoPlayTimeout": 2000
        
        });
        });
    </script>

@endpush