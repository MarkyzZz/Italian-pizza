@extends('templates.template')
@section('content')
@include('partials.subnav')

	<form action="/order/store" method="POST">
		<h1 class="text-center yellow-text">Contact Details</h1>
		<div class="text-center">
			<h2>{{Session::all()['input']['name']}}</h2>
			<h2>{{Session::all()['input']['street']}}</h2>
			<h2>{{Session::all()['input']['city']}}</h2>
			<h2>{{Session::all()['input']['phone']}}</h2>
		</div>
		<h1 class="text-center yellow-text">Order Summary</h1>
		@foreach(Cart::content() as $item)
			<h2 class="text-center">{{$item->name}}({{$item->qty}})&nbsp;&nbsp;<span>{{$item->subtotal()}}</span></h2>
		@endforeach
		<hr>
		<h1 class="text-center"><span class="yellow-text">Total:&nbsp;&nbsp;</span>{{Cart::total()}}</h1>
		<button type="submit" id="submit" class="btn btn-default center-block">Place order</button>
	</form>
@endsection