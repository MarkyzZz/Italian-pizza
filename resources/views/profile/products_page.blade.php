@extends('templates.admin_')
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success text-center alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<h3><strong>Success!</strong> {{Session::get('success')}}</h3>
	</div>
@endif

@if(Session::has('fail'))
	<div class="alert alert-danger text-center alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<h3><strong>Error!</strong> {{Session::get('fail')}}</h3>
	</div>
@endif

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
					<a href="/profile/product/{{$product->id}}" class="btn btn-default">Edit</a>
				</td>
				<td>{{$product->name}}</td>
				<td>{{sprintf("%.2f",$product->price)}} MDL</td>
				<td><img width="100" height="100" style="margin-bottom: 20px" src="{{$product->image_path}}"></td>
				<td>{{$product->description}}</td>
				<td>
					<form method="POST" action="/profile/product/{{$product->id}}/delete">
							{{csrf_field()}}
						<a href="#" class="close product"><i class="fa fa-window-close-o" aria-hidden="true"></i></a></form>
				</td>
			</tr>
		@endforeach
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('.product').on('click', function(){
			if(confirm("Are you sure you want to delete that product?"))
				$(this).parent().submit();
		});
	});
</script>
@endsection