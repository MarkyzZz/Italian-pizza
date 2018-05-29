@extends('templates.admin_')

@section('content')

@if(Session::has('success'))
	<div class="alert alert-success text-center">
  		<h3><strong>Success!</strong> {{Session::get('success')}}</h3>
	</div>
@endif

<form action="/profile/users/" method="POST" class="form-horizontal col-md-offset-1 col-md-4" role="form">
	{{csrf_field()}}
	<div class="form-group">
		<legend style="margin-top:20px; font-size: 36px"><strong>Create User:</strong></legend>
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
		<input type="text" name="full_name" id="full_name" class="input-lg form-control" placeholder="Full Name">
	</div>
	<div class="form-group">
		<input type="email" name="email" id="email" class="input-lg form-control" placeholder="Email Address">
	</div>
	<div class="form-group">
		<input type="password" name="password" id="password" class="input-lg form-control" placeholder="Password">
	</div>
	<div class="form-group">
		<input type="password" name="password_confirmation" id="confirm-password" class="input-lg form-control" placeholder="Confirm Password">
	</div>
	<div class="form-group">
		<input type="text" name="phone" id="phone" class="input-lg form-control" placeholder="Phone">
	</div>
	<div class="form-group">
		<input type="text" name="city" id="city" class="input-lg form-control" placeholder="City">
	</div>
	<div class="form-group">
		<input type="text" name="street" id="street" class="input-lg form-control" placeholder="Street">
	</div>
	<div class="form-group">
		<input type="text" name="block_no" id="block_no" class="input-lg form-control" placeholder="Block/House №">
	</div>	
	<div class="form-group">
		<input type="text" name="apartment_no" id="apartment_no" class="form-control input-lg " placeholder="Apartment Number/House №">
	</div>	
	<div class="form-group">
		<input type="text" name="door_code" id="door_code" class="input-lg form-control" placeholder="Door Code">
	</div>
	<div class="form-group">
		<textarea name="additional_info" id="additional_info" class="input-lg form-control input-lg" placeholder="Additional Information"></textarea>
	</div>

	<div class="form-group">
		<select name="role" id="role" class="form-control input-lg">
			<option value="3">User</option>
			<option value="2">Operator</option>
			<option value="1">Administrator</option>
		</select>
	</div>

	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>
@endsection