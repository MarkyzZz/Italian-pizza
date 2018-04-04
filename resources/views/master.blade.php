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
            autoplay: false,
            autoplayHoverPause: true,
            autoplaySpeed: 3000,
            autoplayTimeout: 7000,
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
<div class="border center-block">
    <div class="owl-carousel owl-theme">
      <div class="item"><h1 class="image-description">
          Discover<br> <span class="yellow-text">Our Pizzas</span></h1><img class="img-responsive" src="{{asset('/img/carousel-img1.png')}}">
      </div>
      <div class="item"><img class="img-responsive" src="{{asset('/img/carousel-img2.png')}}"></div>
      <div class="item"><h1 class="image-description" id="slide-3">
          A taste of <br> <span class="yellow-text">Italy</span></h1><img class="img-responsive" src="{{asset('/img/carousel-img3.png')}}"></div>
      </div>

  </div>
  <div class="ingridients-container">
    <img id='coriander' src="{{asset('/img/coriander.png')}}">
    <img id='tomato' src="{{asset('/img/tomato.png')}}">
</div>
<div class="row">
    <img class="center-block divider" src="{{asset('/img/divider.png')}}">
    <h1>Welcome</h1>
    <p class="col-xs-8 col-md-8 center-block">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni illo earum incidunt veniam, qui voluptates ut neque dolore molestiae laudantium alias ad sit modi itaque animi porro cumque fugit quo.Debitis laudantium obcaecati atque, repellat quam aspernatur impedit facere fugit eum cumque voluptate praesentium quo illum perspiciatis dignissimos deleniti doloremque fuga dolorum delectus, beatae iure nisi magnam ipsam, numquam. Est!
    </p>
    <button type="button" class="col-md-3 col-xs-3 center-block btn btn-default">more about us</button>
</div>
<div class="ingridients-container">
    <img id='parmesan' src="{{asset('/img/parmesan.png')}}">
    <img id='pepper' src="{{asset('/img/pepper.png')}}">
</div>
<div class="row">
    <img class="center-block divider" src="{{asset('/img/divider.png')}}">
    <h1>Our pizza</h1>
</div>

</div> {{--end container--}}


</body>
