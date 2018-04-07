@section('carousel')
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
@show