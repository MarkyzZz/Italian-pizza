@extends('templates.admin_')
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success text-center alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<h3><strong>Success!</strong> {{Session::get('success')}}</h3>
	</div>
@endif

@if($orders->count()>0)
<h1 class="col-sm-offset-1">Orders</h1>
<div class="row">
	
	<table>
		<tr>
			<td></td>
			<td><strong>Transaction №</strong></td>
			<td><strong>User</strong></td>
			<td><strong>Status</strong></td>
		</tr>
		@foreach($orders as $order)
			<tr>
				<td>
					<a href="/profile/order/{{$order->transaction_id}}/" class="btn btn-default">View</a>
				</td>
				<td>ITP-{{str_pad($order->transaction_id, 4,'0',STR_PAD_LEFT)}}</td>
				<td>{{$order->full_name}}</td>
				<td><span class="label @if($order->status === 'open') label-success @else label-danger @endif">{{$order->status}}</span></td>
				<td></td>
			</tr>
		@endforeach
	</table>
@else 
	<h2 class="text-center" style="margin-top:200px;">No orders have been made yet! HOLD UP!</h2>
@endif
</div>
@endsection