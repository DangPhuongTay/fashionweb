<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}"/>

    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}"/>

    <link rel="stylesheet" href="{{ asset('assets/exzoom/jquery.exzoom.css')}}"/>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/category.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/all-product.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/detail-product.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/user.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/checkout.css')}}"/>
   @livewireStyles
</head>
<body>
        <div id="app">
            @include('layouts.inc.frontend.navbar')
        <main>
            @yield('content')
            <a href="/" class="bottom-btn">
                <ion-icon name="chevron-up-outline"></ion-icon>
                </a>
        </main>
            @include('layouts.inc.frontend.footer')
        </div>
        
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        window.addEventListener('message', event => {
            if(event.detail){
                alertify.set('notifier','position','top-right');
                alertify.notify(event.detail.text, event.detail.type);
            }
        });
    </script>
    <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/exzoom/jquery.exzoom.js')}}"></script>
    @yield('script')
    @livewireScripts
    @stack('scripts')
</body>
</html>