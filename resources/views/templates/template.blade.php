<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Authentic Italian Pizza" />
    <meta name="author" content="Marin Cunup" />
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="shortcut icon" href={{ asset("favicon.png") }} />
    <title>Italian Pizza</title>
    <link href="{{ asset('/css/vendor.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/template.css')}}">
    @yield('styles')
    @yield('scripts')
    <script src="{{ asset('/js/vendor.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
    <script>
        $(document).ready(function(){
          $(document).scrollTop(500);
          $('.owl-carousel').owlCarousel({
            loop: true,
            responsiveClass: true,
            responsive:{
                1024:{
                    items: 1,
                },
                768:{
                    items: 1,
                },
                425:{
                    items: 1,
                },
                375:{
                    items: 1,
                },
                320:{
                    items: 1,
                }
            },
            margin: 300,
            autoplay: true,
            autoplayHoverPause: true,
            autoplaySpeed: 1000,
            dots: false,
            nav: true,
            dotsContainer: '#carousel-custom-dots',
            navText : ['<i class="fa fa-caret-left" aria-hidden="true"></i>', '<i class="fa fa-caret-right" aria-hidden="true"></i>']
        });
          $('.fa-circle-o').click(function () {
            $('.owl-carousel').trigger('to.owl.carousel', [$(this).index(), 300]);
        });
      });
  </script>
</head>
<body>
    <div class="container relative">
    @section('logo')
        <img id='logo' alt="logo" class="center-block col-xs-6 col-sm-4 col-md-3 img-responsive" src="{{ asset('/img/logo.png') }}">
        <a href="{{ url('/cart') }}"><img id='cart' class="img-responsive" alt="cart" src="{{ asset('/img/cart.png') }}"></a>
        @if(Auth::check())
            <a href="{{ url('/profile') }}"><img id='profile' class="img-responsive" alt="profile" src="{{ asset('/img/profile.png') }}"></a>
            <a href="{{ url('/logout') }}"><img id="logout" src="{{asset('/img/logout.png')}}"></a>
        @else 
             <a href="{{ url('/auth') }}"><img id='auth' class="img-responsive" id="login" alt="auth" src="{{ asset('/img/login.png') }}"></a>
        @endif
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav_collapsed">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
            </div>
            <div class="collapse navbar-collapse" id="nav_collapsed">
              <ul class="nav navbar-nav">
                <li class="nav-item"><a href="{{ url('/') }}"><p class="item-text">Home</p></a></li>
                <li class="nav-item"><a href="{{ url('/menu') }}"><p class="item-text">Menu</p></a></li>
                <li class="nav-item"><a href="{{ url('/about_us') }}"><p class="item-text">About us</p></a></li>
                <li class="nav-item"><a href="{{ url('/contacts') }}"><p class="item-text">Contacts</p></a></li>
            </ul>
        </div>
    </div>
</nav>
@show
@yield('content')
</div>
@section('footer')
<footer>
  <img class="center-block" src="{{ asset('/img/logo2.png') }}">
  <p>Copyright &copy; 2018, AUTHENTIC ITALIAN PIZZA</p>
</footer>
@show
</body>