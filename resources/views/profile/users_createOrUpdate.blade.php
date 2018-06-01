@extends('templates.admin_')

@section('content')

@if(Session::has('success'))
	<div class="alert alert-success text-center alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<h3><strong>Success!</strong> {{Session::get('success')}}</h3>
	</div>
@endif

<form @if(!empty($user)) action="/profile/user/{{$user->id}}/edit" @else action="/profile/users/" @endif method="POST" class="form-horizontal col-md-offset-1 col-md-4" role="form">
	{{csrf_field()}}
	<div class="form-group">
		<legend style="margin-top:20px; font-size: 36px"><strong>@if(!empty($user)) Edit @else Create @endif User:</strong></legend>
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
		<input type="text" name="full_name" id="full_name" class="input-lg form-control" placeholder="Full Name" value="@if(!empty($user)) {{trim($user->full_name)}}  @endif">
	</div>
	<div class="form-group">
		<input type="email" name="email" id="email" class="input-lg form-control" placeholder="Email Address" value="@if(!empty($user)) {{$user->email}}  @endif">
	</div>
	<div class="form-group">
		<input type="password" name="password" id="password" class="input-lg form-control" placeholder="Password" value="">
	</div>
	<div class="form-group">
		<input type="password" name="password_confirmation" id="confirm-password" class="input-lg form-control" placeholder="Confirm Password" value="">
	</div>
	<div class="form-group">
		<input type="text" name="phone" id="phone" class="input-lg form-control" placeholder="Phone" value="@if(!empty($user)) {{$user->phone}}  @endif">
	</div>
	<div class="form-group">
		<input type="text" name="city" id="city" class="input-lg form-control" placeholder="City" value="@if(!empty($user)) {{$user->city}}  @endif">
	</div>
	<div class="form-group">
		<input type="text" name="street" id="street" class="input-lg form-control" placeholder="Street" value="@if(!empty($user)) {{$user->street}}  @endif">
	</div>
	<div class="form-group">
		<input type="text" name="block_no" id="block_no" class="input-lg form-control" placeholder="Block/House №" value="@if(!empty($user)) {{$user->block_number}}  @endif">
	</div>	
	<div class="form-group">
		<input type="text" name="apartment_no" id="apartment_no" class="form-control input-lg " placeholder="Apartment Number/House №" value="@if(!empty($user->apartment_number)) {{$user->apartment_number}}  @endif">
	</div>	
	<div class="form-group">
		<input type="text" name="door_code" id="door_code" class="input-lg form-control" placeholder="Door Code" value="@if(!empty($user)) {{$user->doorcode}}  @endif">
	</div>
	<div class="form-group">
		<textarea name="additional_info" id="additional_info" class="input-lg form-control input-lg" placeholder="Additional Information">@if(!empty($user)) {{$user->additional_info}}  @endif</textarea>
	</div>

	<div class="form-group">
		<select name="role" id="role" class="form-control input-lg">
			<option value="3" @if(!empty($user) && $user->isUser()) selected="selected" @endif>User</option>
			<option value="2" @if(!empty($user) && $user->isOperator()) selected="selected"  @endif>Operator</option>
			<option value="1" @if(!empty($user) && $user->isAdmin()) selected="selected" @endif>Administrator</option>
		</select>
	</div>

	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function(){
		$('input, textarea').each(function(key, value){
			$(this).val($(this).val().trim());
		});
	});
</script>
@endsection