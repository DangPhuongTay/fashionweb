<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}"/>

    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}"/>

    <link rel="stylesheet" href="{{ asset('assets/exzoom/jquery.exzoom.css')}}"/>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}"/>
   @livewireStyles
</head>
<body>
        <div id="app">
            @include('layouts.inc.frontend.navbar')
        <main>
            @yield('content')
        </main>
            @include('layouts.inc.frontend.footer')
        </div>
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js')}}"></script>
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