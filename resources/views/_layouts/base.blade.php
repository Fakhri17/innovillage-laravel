<html>
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="format-detection" content="telephone=no"/>
    <title>@yield('title') | Innovilage Laravel</title>
    <link rel="stylesheet" href="https://unpkg.com/@webpixels/css@1.0/dist/index.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css"/>
    @yield('style')
  </head>
  <body  style="background-color: #DAFFD3;">
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    {{--    <script src="https://www.googletagmanager.com/gtag/js?id=G-9922XFPMSX"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.8.3/dist/lazyload.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
      new LazyLoad({
        // Your custom settings go here
      });
    </script>
  </body>
</html>
