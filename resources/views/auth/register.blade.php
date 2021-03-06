<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Spaces - My Account</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta name="title" content="Spaces - My Account" />
    <meta name="author" content="Themesberg" />
    <meta name="description" content="Premium Directory Listing Bootstrap 4 Template featuring 37 hand-crafted pages, a dashboard an Mapbox integration. Spaces also comes with a complete UI Kit featuring over 700 components by Themesberg." />
    <meta name="keywords" content="bootstrap, bootstrap 4 template, directory listing bootstrap, bootstrap 4 listing, bootstrap listing, bootstrap 4 directory listing template, vector map, leaflet js template, mapbox theme, mapbox template, dashboard, themesberg, user dashboard bootstrap, dashboard bootstrap, ui kit, bootstrap ui kit, premium bootstrap theme" />

    <link rel="canonical" href="https://themesberg.com/product/bootstrap/spaces-bootstrap-directory-listing-template" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://demo.themesberg.com/pixel-pro" />
    <meta property="og:title" content="Spaces - My Account" />
    <meta property="og:description" content="Premium Directory Listing Bootstrap 4 Template featuring 37 hand-crafted pages, a dashboard an Mapbox integration. Spaces also comes with a complete UI Kit featuring over 700 components by Themesberg." />
    <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/spaces/thumbnail.jpg" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://demo.themesberg.com/pixel-pro" />
    <meta property="twitter:title" content="Spaces - My Account" />
    <meta property="twitter:description" content="Premium Directory Listing Bootstrap 4 Template featuring 37 hand-crafted pages, a dashboard an Mapbox integration. Spaces also comes with a complete UI Kit featuring over 700 components by Themesberg." />
    <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/spaces/thumbnail.jpg" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}" />
    <link rel="mask-icon" href="{{ asset('assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="theme-color" content="#ffffff" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link type="text/css" href="{{ asset('assets/css/leaflet.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="  {{ asset('assets/css/jqvmap.min.css') }}" />
    <link type="text/css" href="{{ asset('assets/css/spaces.css') }}" rel="stylesheet" />
</head>

<body style="background-color:#630d82;">


    <main>
        <section class="pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="text-center text-md-center mb-5 mt-md-0 text-white">
                            <h1 class="mb-0 h3">Sign up to our platform</h1>
                        </div>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="signin-inner mt-3 mt-lg-0 bg-white shadow-soft border rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger ">{{ $error }}</div>
                            @endforeach
                            @endif
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <div class="input-group mb-4">
                                        <input class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="Your Name" type="text" aria-label="email address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Your email</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fas fa-envelope">
                                                </span>
                                            </span>
                                        </div>
                                        <input class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Enter your email" type="email" aria-label="email address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fas fa-unlock-alt"></span></span>
                                            </div>
                                            <input class="form-control" id="password" name="password" placeholder="{{ __('password') }} " type="password" aria-label="Enter your password" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Confirm Password</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fas fa-unlock-alt"></span></span>
                                            </div>
                                            <input class="form-control" id="password" name="password_confirmation" placeholder=" {{ __('Confirm Password') }} " type="password" aria-label="Password" required="">
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-block btn-secondary">Sign up</button>
                            </form>
                            <div class="d-block d-sm-flex justify-content-center align-items-center mt-4">
                                <span class="font-weight-normal"> registered? <a href="{{  route('login')  }}" class="font-weight-bold">Sign in</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <footer class="footer text-white" style="padding-top:10rem;">
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
    </section>
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