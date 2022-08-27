<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <meta name="description" content="des conseils pédiatriques gratuits pour garder votre bébé en bonne santé à la maison">
    <meta name="author" content="CSListed | Real Estate">
    <meta name="robots" content="index,follow" />
    <META NAME="Revisit-After" CONTENT="1 hours" />
    <!-- Bootstrap CSS -->
    <!-- Fonts -->
    <link rel="preconnects" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,200|Open+Sans+Condensed:700" rel="stylesheet">
    <link href="{{ asset('./css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('./css/owl.theme.default.css') }}" rel="stylesheet">
    <link href="{{ asset('./css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('./css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('./css/aos.css') }}" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDotWc44KY8Qz9acyhv4e79Z9ik_5FnM4s"></script>
{{--     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDotWc44KY8Qz9acyhv4e79Z9ik_5FnM4s&callback=initAutocomplete&libraries=places&v=weekly"defer></script>
 --}}
    <link rel="stylesheet" href="{{ asset('./css/loader.css') }}">
    <title>SListed Real Estate</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" type="image/x-icon" href="" />
    <meta itemprop="name" content="des conseils pédiatriques gratuits pour garder votre bébé en bonne santé à la maison" />
    <meta itemprop="url" content="" />
    <meta itemprop="description" content="des conseils pédiatriques gratuits pour garder votre bébé en bonne santé à la maison" />

    <meta name="twitter:title" content="Fanalex Baby Care" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="website" />
    <meta name="twitter:description" content="des conseils pédiatriques gratuits pour garder votre bébé en bonne santé à la maison" />
    <meta name="description" content="des conseils pédiatriques gratuits pour garder votre bébé en bonne santé à la maison" />

<body>
    <div class="page-header">
        @include('layouts/App/navbar')
        
        <div style="padding-top: 53px;">
            @yield('content')

        </div>
    </div>

    <footer class="pt-4 pb-3 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2>CSListed</h2>
                    <p class="text-muted">consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-3">
                    <nav class="nav flex-column">
                        <div class="nav-item text-white fw-bolder ms-3 mt-3">Accomodations</div>
                        <a class="nav-link text-muted " href="#">Real estate</a>
                        <a class="nav-link text-muted " href="#">E-commerce</a>
                        <a class="nav-link text-muted " href="#">jobs</a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <nav class="nav flex-column">
                        <div class="nav-item text-white fw-bolder ms-3 mt-3">Policies</div>
                        <a class="nav-link text-muted " href="#">Privacy</a>
                        <a class="nav-link text-muted " href="#">Terms and Conditions</a>
                        <a class="nav-link text-muted " href="#">Cookies</a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <h5>Socials</h5>

                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <p class="text-center text-muted">CSListed allrights reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('./js/popper.min.js') }}"></script>
    <script src=" {{ asset('./js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src=" {{ asset('./js/bootstrap.min.js') }}"></script>
    <script src=" {{ asset('./js/jquery.js') }}"></script>
    <script src=" {{ asset('./js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('./js/aos.js') }}"></script>
    
    <script src="{{ asset('appJs/payement.js') }}"></script>
    <script src="{{ asset('appJs/search.js') }}"></script>
   
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel();
        });
    </script>
    <script>
        feather.replace()
    </script>
    <script>
        AOS.init();
    </script>
    
    <script>
        var searchInput = 'location';
         
        $(document).ready(function () {
         var autocomplete;
         autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
          types: ['geocode'],
          /*componentRestrictions: {
           country: "USA"
          }*/
         });
          
         google.maps.event.addListener(autocomplete, 'place_changed', function () {
          var near_place = autocomplete.getPlace();
         });
        });
        </script>
</body>

</html>