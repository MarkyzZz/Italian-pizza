@extends('templates.template')
@section('content')
@include('partials.carousel')
<div class="ingridients-container">
	<img id='coriander' src="{{asset('/img/coriander.png')}}">
	<img id='tomato' src="{{asset('/img/tomato.png')}}">
</div>
<div class="row">
	<img class="center-block divider" src="{{asset('/img/divider.png')}}">
	<h1 class="text-centered big">Welcome</h1>
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
	<h1 class="text-centered big">Our pizza</h1>
</div>
<div class="ingridients-container">
	<img id='fork' src="{{asset('/img/for2k.png')}}">
	<img id='garlic' src="{{asset('/img/garlic.png')}}">
	<p class="chalk-text">The authentic italian recipe for the pizza dough makes our crust the crunchiest crust you will ever taste.</p>
	<p class="chalk-text">We use only organic ingridients, selected from local farmers.</p>
	<img id='flour' src="{{asset('/img/flour.png')}}">
</div>
<div class="row">
	<img class="center-block divider" src="{{asset('/img/pizza-text.png')}}">
	<button type="button" class="center-block btn btn-default">menu</button>
</div>
@include('partials.contact_form')
@endsection