<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Authentic Italian Pizza" />
    <meta name="author" content="Marin Cunup" />
    <link rel="shortcut icon" href={{ asset("favicon.png") }} />
    <title>Italian Pizza</title>
    <link href="{{ asset('/css/vendor.min.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/vendor.min.js') }}"></script>
    <script>
        $(document).ready(function(){
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
            }
          });
        });
    </script>
</head>
<body>
    <div class="container">
        <img id='logo' alt="logo" class="center-block col-xs-6 col-sm-4 col-md-3 img-responsive" src="{{ asset('/img/logo.png') }}">
        <img id='cart' class="img-responsive" alt="cart" src="{{ asset('/img/cart.png') }}">
            <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav_collapsed">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="#">Italian Pizza</a>
            </div>
            <div class="collapse navbar-collapse" id="nav_collapsed">
              <ul class="nav navbar-nav">
                <li class="nav-item"><a href="#"><p class="item-text">Home</p></a></li>
                <li class="nav-item"><a href="#"><p class="item-text">Menu</p></a></li>
                <li class="nav-item"><a href="#"><p class="item-text">About us</p></a></li>
                <li class="nav-item"><a href="#"><p class="item-text">Contacts</p></a></li>
              </ul>
            </div>
        </div>
    </nav>
    </div>




    <div class="owl-carousel owl-theme">
      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 center-block"><img class="img-responsive" src="{{asset('/img/carousel-img1.png')}}"></div>
      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 center-block"><img class="img-responsive" src="{{asset('/img/carousel-img2.png')}}"></div>
      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 center-block"><img class="img-responsive" src="{{asset('/img/carousel-img3.png')}}"></div>
    </div>
</body>
