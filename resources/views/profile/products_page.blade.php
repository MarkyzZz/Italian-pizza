@extends('templates.admin_')
@section('content')

<h1 class="col-sm-offset-1">Products</h1>
<div class="row">
		<a href="/profile/products/create" class="btn create-button btn-default col-sm-offset-1"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i>&nbsp; Create new product</a>
	<table class="col-md-offset-1">
		<tr>
			<td></td>
			<td><strong>Name</strong></td>
			<td><strong>Price</strong></td>
			<td><strong>Image</strong></td>
			<td><strong>Description</strong></td>
		</tr>
		@foreach($products as $product)
			<tr>
				<td>
					<a href="/profile/product/{{$product->id}}/edit" class="btn btn-default">Edit</a>
				</td>
				<td>{{$product->name}}</td>
				<td>{{sprintf("%.2f",$product->price)}} MDL</td>
				<td><img width="100" height="100" style="margin-bottom: 20px" src="{{$product->image_path}}"></td>
				<td>{{$product->description}}</td>
				<td></td>
			</tr>
		@endforeach
	</table>
</div>
@endsection