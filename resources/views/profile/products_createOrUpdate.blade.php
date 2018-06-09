@extends('templates.admin_')

@section('content')

@if(Session::has('success'))
	<div class="alert alert-success text-center alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<h3><strong>Success!</strong> {{Session::get('success')}}</h3>
	</div>
@endif

	<form @if(empty($product)) action="/profile/products" @else action="/profile/product/{{$product->id}}/edit" @endif method="POST" class="form-horizontal col-md-offset-1 col-md-4" enctype="multipart/form-data">
		{{csrf_field()}}
			<div class="form-group">
				<legend style="margin-top:20px; font-size: 36px">@if(empty($product))Create @else Edit @endif product:</legend>
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
		<label for="name">Product Name:</label>
		<input type="text" name="name" id="name" class="input-lg form-control" placeholder="Product Name" value="@if(!empty($product)) {{$product->name}} @endif">
	</div>
	<div class="form-group">
		<label for="description">Product Description:</label>
		<textarea type="text" name="description" id="description" class="input-lg form-control" placeholder="Product Description">@if(!empty($product)) {{$product->description}} @endif</textarea>
	</div>
	<div class="form-group">
		<label for="price">Product Price(MDL):</label>
		<input type="text" name="price" id="price" class="input-lg form-control" placeholder="Product Price In MDL" value="@if(!empty($product)) {{$product->price}} @endif">
	</div>
	<div class="form-group">
		<label for="img">Product Image: </label>
		<input type="file" name="img" id="img" class="input-lg form-control">
	</div>

	<div class="form-group">
		@if(!empty($product)) <img width="300" height="300" id="image" src="{{$product->image_path}}">
		 @endif
	</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Save Product</button>
				</div>
			</div>
	</form>

	<script type="text/javascript">
		$(document).ready(function(){
			$('input, textarea').each(function(key, value){
				$(this).val($(this).val().trim());
			});
			function readURL(input) {

				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function(e) {
						$('#image').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$("input[type='file']").change(function() {
				readURL(this);
			});

		});
	</script>
@endsection