@extends('templates.template')

@section('styles')
<link rel="stylesheet" type="text/css" href="/css/auth.css">
@endsection
@section('scripts')
<script>

</script>
@endsection

@section('content')

@if(count($errors->all()))
<div class="form-group text-center col-md-6 center-block">
			<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i style="padding-right: 30px;" class="fa fa-times-circle-o" aria-hidden="true"></i>Error!</strong> 
                @foreach($errors->all() as $error)
					<p style="color:red">{{$error}}</p>
					@endforeach
              </div>
	</div>
@endif

<div class="container">
	<ul class="nav nav-pills col-md-offset-5">
		<li class="active"><a class="medium" data-toggle="pill" href="#login">Login</a></li>
		<li><a class="medium" data-toggle="pill" href="#register">Register</a></li>
	</ul>

	<div class="tab-content">
		<div id="login" class="tab-pane fade in active">
			<form method="POST" action="/login" class="col-md-6 center-block">
				{{csrf_field()}}
				<div class="form-group">
					<input type="email" name="email" id="log_email" class="form-control input-lg" placeholder="Email" value="{{ old('email') }}">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="log_password" class="form-control input-lg" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-default center-block">Submit</button>
			</form>
		</div>
		<div id="register" class="tab-pane fade">
			<form method="POST" action="/register" class="col-md-7 center-block">
				{{csrf_field()}}
				@include('partials.user_creation')
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
				</div>
				<div class="form-group">
					<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Password Confirmation">
				</div>
				<button type="submit" class="btn btn-default center-block">Submit</button>
				</form>
			</div>
		</div>
	</div>
	@endsection
