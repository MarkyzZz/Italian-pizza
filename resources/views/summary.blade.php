@extends('templates.template')
@section('content')
@include('partials.subnav')
	<form action="/order/store" method="POST">
		{{csrf_field()}}
		<h1 class="text-center yellow-text">Contact Details</h1>
		@if(!Auth::check() && Session::has('input'))
		<div class="text-center">
			<h2>{{Session::get('input.name')}}</h2>
			<h2>{{Session::get('input.street')}}</h2>
			<h2>{{Session::get('input.city')}}</h2>
			<h2>{{Session::get('input.phone')}}</h2>
			<h2><span class="yellow-text">Payment by</span>: {{Session::get('input.payment_type')}}</h2>
		</div>
		@else
		<div class="text-center">
			<h2>{{Auth::user()->full_name}}</h2>
			<h2>{{Auth::user()->street}}</h2>
			<h2>{{Auth::user()->city}}</h2>
			<h2>{{Auth::user()->phone}}</h2>
			<h2><span class="yellow-text">Payment by</span>: {{Session::get('input.payment_type')}}</h2>
		</div>
		@endif
		<h1 class="text-center yellow-text">Order Summary</h1>
		@foreach(Cart::content() as $item)
			<h2 class="text-center">{{$item->name}}({{$item->qty}})&nbsp;&nbsp;<span>{{$item->subtotal()}} MDL</span></h2>
		@endforeach
		<hr>
		<h1 class="text-center"><span class="yellow-text">Total:&nbsp;&nbsp;</span>{{Cart::total()}} MDL</h1>
		<button type="submit" id="submit" class="btn btn-default center-block">Place order</button>
	</form>
@endsection