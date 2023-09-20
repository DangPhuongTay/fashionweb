
    <header>
      <div class="header-logo">
       <a href="{{ url('/') }}"><img src="{{ asset('assets/imgs/logo.png')}}" alt="logo"></a>
      </div>
      <div class="header-navbar">
        <ul class="header-list-link-page">

          <li class="header-link-page"><a href="/">HOME</a></li>
          <li class="header-link-page"><a href="{{ url('/collections') }}">All CATEGORY</a></li>
          <li class="header-link-page"><a href="{{ url('/new-arrivals') }}">NEW ARRIVALS</a></li>
          <li class="header-link-page"><a href="{{ url('/featured-products') }}">FUTURE PRODUCT</a></li>
          <li class="header-link-page"><a href="{{ url('/wishlist') }}">WISHLIST</a></li>
          <li class="header-link-page"><a href="{{ url('/cart') }}">CART</a></li>
          <li class="header-link-page"><a href="#">CONTACT</a></li>
          @if (Route::has('login'))
                                <li class="header-link-page">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="header-link-page">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                </li>
            @endif
          <li class="header-link-page" >
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
               <i class="fa fa-sign-out"></i> {{ __('LOGOUT') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
         
        </ul>
      </div>
      <div class="header-list-control">
        <div class="header-control">
            <form action="{{ url('search')}}" method="GET" role="search">
            <input name="search" value="{{ Request::get('search')}}" class="search" type="search" placeholder="Enter ...">
            <button type="submit">
               <ion-icon name="search-outline"></ion-icon>
            </button>
          </form>
        </div>
        <div class="header-control">
          <a href="{{ url('/cart') }}"><ion-icon name="bag-outline"></ion-icon></a>
        </div>
        <div class="header-control">
          <a href="{{ url('/wishlist') }}"><ion-icon name="heart-outline"></ion-icon></a>
        </div>


        <button id="burger-main">
          <div class="body-blur"></div>
          <div class="burger-box">
            <div class="burger"></div>
          </div>
        </button>
      </div>

      
      <a class="subscribe" href="{{ url('/profile') }}">
          <ion-icon name="person-circle-outline"></ion-icon>
          PROFILE
      </a>

    </header>
  