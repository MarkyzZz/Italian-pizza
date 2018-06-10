@extends('templates.template')

@section('content')
	<div class="container">
		<img class="center-block divider" src="{{asset('/img/divider.png')}}">
  <h1 class="text-centered big">About us</h1>
  
  <div class="media col-md-offset-1">
    <div class="media-left">
      <img src="{{asset('img/about_us.png')}}" >
    </div>
    <div class="media-body">
      <p class="left-60">Signore Gianni Vicente, a member of an old family in the town of Maiori, Italy, was already famous in the 30s for his pizzas.</p>

	<p class="left-60">In 1932, he decided to open his first pizza place called ¨Il Pizza Italiano¨.</p>
	<p class="left-60">The pizzas were not round, but rectangular, but above all, they stood out for their exquisite tomato sauce, which is a secret recipe, from Signora María, his wife.</p>

	<p class="left-60">Some years later, due to the popularity of his pizza, and with the help of his children, he decided to open three new pizzerias in neighboring cities, such as Naples and Salerno. </p>

	<p class="left-60">At the end of 1950s, one of his sons decided to open his first pizzeria outside of Italy: New York.</p>

	<p class="left-60">Almost three generations have passed. Today "Italian Pizza" is an example of a stong family that tries to maintain the tradition and respect at all costs in the original recipe of Signore Gianni.</p>

	<p class="left-60">The source of success was and will continue to be: The quality of all its ingredients, the cooking in a clay oven And of course "the recipe and love of our grandparents"!</p>

    </div>
  </div>
</div>
@endsection