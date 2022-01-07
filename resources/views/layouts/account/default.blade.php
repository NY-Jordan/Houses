<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Spaces - My Account</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta name="title" content="Spaces - My Account" />
    <meta name="author" content="Themesberg" />
    <meta name="description"
        content="Premium Directory Listing Bootstrap 4 Template featuring 37 hand-crafted pages, a dashboard an Mapbox integration. Spaces also comes with a complete UI Kit featuring over 700 components by Themesberg." />
    <meta name="keywords"
        content="bootstrap, bootstrap 4 template, directory listing bootstrap, bootstrap 4 listing, bootstrap listing, bootstrap 4 directory listing template, vector map, leaflet js template, mapbox theme, mapbox template, dashboard, themesberg, user dashboard bootstrap, dashboard bootstrap, ui kit, bootstrap ui kit, premium bootstrap theme" />
    <link rel="canonical" href="https://themesberg.com/product/bootstrap/spaces-bootstrap-directory-listing-template" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://demo.themesberg.com/pixel-pro" />
    <meta property="og:title" content="Spaces - My Account" />
    <meta property="og:description"
        content="Premium Directory Listing Bootstrap 4 Template featuring 37 hand-crafted pages, a dashboard an Mapbox integration. Spaces also comes with a complete UI Kit featuring over 700 components by Themesberg." />
    <meta property="og:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/spaces/thumbnail.jpg" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://demo.themesberg.com/pixel-pro" />
    <meta property="twitter:title" content="Spaces - My Account" />
    <meta property="twitter:description"
        content="Premium Directory Listing Bootstrap 4 Template featuring 37 hand-crafted pages, a dashboard an Mapbox integration. Spaces also comes with a complete UI Kit featuring over 700 components by Themesberg." />
    <meta property="twitter:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/spaces/thumbnail.jpg" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}" />
    <link rel="mask-icon" href="{{ asset('assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="theme-color" content="#ffffff" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link type="text/css" href="{{ asset('assets/css/leaflet.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="  {{ asset('assets/css/jqvmap.min.css') }}" />
    <link type="text/css" href="{{ asset('assets/css/spaces.css') }}" rel="stylesheet" />
</head>

<body>
    @include('layouts/account/header')
    <main>
        <div class="preloader bg-dark flex-column justify-content-center align-items-center">
            <div class="position-relative"><img src="{{ asset('img/logo-light.png') }}" alt="Logo loader" /></div>
        </div>
        <div class="section section-lg bg-soft">
            <div class="container">
                <div class="row pt-5 pt-md-0">
                    @include('layouts/relative-header')
                    @if (session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @yield('content')

                </div>
            </div>
        </div>
    </main>
</body>

<footer class="footer py-6 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-unstyled">
                    <li class="inline-item small">
                        <a href="#" class="nav-link">Terms and Conditions</a>
                    </li>
                    <li class="inline-item small">
                        <a href="#" class="nav-link">Privacy policy</a>
                    </li>
                    <li class="inline-item small">
                        <a href="#" class="nav-link">Cslisted.com</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="small text-muted">
                    CSListed &copy;
                    <script type="text/javascript">
                        document.write(new Date().getFullYear());
                    </script> all rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/headroom.min.js') }}"></script>
<script src="{{ asset('assets/js/on-screen.umd.min.js') }}"></script>
<script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/smooth-scroll.polyfills.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/js/sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('assets/js/leaflet.js') }}"></script>
<script src="{{ asset('assets/js/chartist.min.js') }}"></script>
<script src="{{ asset('assets/js/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slideform.js') }}"></script>
<script src="{{ asset('assets/js/spaces.js') }}"></script>

<script type="text/javascript">
    new Chartist.Line('.line-chart-filled', {
        labels: [1, 2, 3, 4, 5, 6, 7, 8],
        series: [
            [5, 9, 7, 8, 5, 3, 5, 4]
        ]
    }, {
        low: 0,
        showArea: true
    });
</script>
</body>

</html>
