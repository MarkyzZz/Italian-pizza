@extends('templates.admin_')
@section('content')

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
					<a href="/profile/order/{{$order->id}}/view" class="btn btn-default">View</a>
				</td>
				<td>ITP-{{str_pad($order->transaction_id, 4,'0',STR_PAD_LEFT)}}</td>
				<td>{{$order->full_name}}</td>
				<td><span class="label @if($order->status === 'open') label-success @else label-danger @endif">{{$order->status}}</span></td>
				<td></td>
			</tr>
		@endforeach
	</table>
</div>
@endsection