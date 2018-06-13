@extends('templates.template')
@section('content')
	<div class="row center-block text-center">
		<h1 class="yellow-text">Success!</h1>
		<h2 class="text-center center-block col-md-6">Your order has been placed successfully and will be delivered between 20 and 60 minutes!</h2>
		<h2>Your order ID is : <span class="yellow-text">ITP-{{str_pad($transaction_id, 4,'0',STR_PAD_LEFT)}}</span></h2>
	</div>
@endsection