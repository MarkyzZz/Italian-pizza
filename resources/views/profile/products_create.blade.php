@extends('templates.admin_')

@section('content')

@if(Session::has('success'))
	<div class="alert alert-success text-center">
  		<h3><strong>Success!</strong> {{Session::get('success')}}</h3>
	</div>
@endif

	<form action="/profile/products" method="POST" class="form-horizontal col-md-offset-1 col-md-4" enctype="multipart/form-data">
		{{csrf_field()}}
			<div class="form-group">
				<legend style="margin-top:20px; font-size: 36px">Create new product:</legend>
			</div>

			<div class="form-group">
		<div class="row">
			<div class="col-sm-offset-1">
				@if(count($errors->all()))
				@foreach($errors->all() as $error)
				<p style="color:red">{{$error}}</p>
				@endforeach
				@endif
			</div>
		</div>
	</div>

	<div class="form-group">
		<input type="text" name="name" id="name" class="input-lg form-control" placeholder="Product Name">
	</div>
	<div class="form-group">
		<textarea type="text" name="description" id="description" class="input-lg form-control" placeholder="Product Description"></textarea>
	</div>
	<div class="form-group">
		<input type="text" name="price" id="price" class="input-lg form-control" placeholder="Product Price In MDL">
	</div>
	<div class="form-group">
		<input type="file" name="img" class="input-lg form-control">
	</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Save Product</button>
				</div>
			</div>
	</form>
@endsection