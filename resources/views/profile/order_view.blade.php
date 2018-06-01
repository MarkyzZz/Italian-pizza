@extends('templates.admin_')

@section('content')
<h2 class="text-center">Order Summary</h2>
<table style="margin-top:20px" class="col-md-offset-1">
	<tr>
		<td><strong>Transaction ID: </strong></td>
		<td>ITP-{{str_pad($order_info->transaction_id, 4,'0',STR_PAD_LEFT)}}</td>
		<td></td>
	</tr>
	<tr>
		<td><strong>Full name: </strong></td>
		<td>{{$order_info->full_name}}</td>
		<td></td>
	</tr>
	<tr>
		<td><strong>Payment Type: </strong></td>
		<td>
			<span class="@if($order_info->payment_type==="cash") label label-default @else label label-info @endif">{{$order_info->payment_type}}</span>
		</td>
		<td></td>
	</tr>
	<tr>
		<td><strong>Street: </strong></td>
		<td>{{$order_info->street}}</td>
		<td></td>
	</tr>
	<tr>
		<td><strong>City: </strong></td>
		<td>{{$order_info->city}}</td>
		<td></td>
	</tr>
	<tr>
		<td><strong>Status: </strong></td>
		<td><span class="label @if($order_info->status === 'open') label-success @else label-danger @endif">{{$order_info->status}}</span></td>
		<td>
		@if($order_info->status === 'open')
		<form action="/profile/order/{{$order_info->transaction_id}}/close" method="POST">
			{{csrf_field()}}
			<button type="type" class="btn btn-danger">Close</button>
		</form>
		@else
		<form action="/profile/order/{{$order_info->transaction_id}}/open" method="POST">
			{{csrf_field()}}
			<button type="type" class="btn btn-success">Reopen</button>
		</form>
		@endif

		</td>
	</tr>
	<tr>
		<td><strong>Date Ordered: </strong></td>
		<td>{{$order_info->created_at}}</td>
		<td></td>
	</tr>
	<tr>
		<td><i>Order Details:</i></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td><strong>Name (amount)</strong></td>
		<td><strong>Price</strong></td>
		<td><strong>Subtotal</strong></td>
	</tr>
	@foreach($order_details as $order)
		<tr>
			<td>{{$order->name}}&nbsp;({{$order->quantity}})</td>
			<td>{{$order->price}} MDL</td>
			<td>{{$order->total}} MDL</td>
		</tr>
	@endforeach
	<tr style="border-top: 1px solid black;">
		<td><strong>Total: </strong></td>
		<td></td>
		<td><strong>{{$total}} MDL</strong></td>
	</tr>
</table>
@endsection