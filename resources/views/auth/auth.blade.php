<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="/css/auth.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="/login" method="post" role="form" style="display: block;">
									{{csrf_field()}}
									<div class="form-group">
										<input type="text" name="email" id="email" class="form-control" placeholder="User Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" class="form-control" placeholder="Password">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
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
								</form>
								<form id="register-form" action="/register" method="post" role="form" style="display: none;">
									{{csrf_field()}}
									<div class="form-group">
										<input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="password_confirmation" id="confirm-password" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
									</div>
									<div class="form-group">
										<input type="text" name="city" id="city" class="form-control" placeholder="City">
									</div>
									<div class="form-group">
										<input type="text" name="street" id="street" class="form-control" placeholder="Street">
									</div>
									<div class="form-group">
										<input type="text" name="block_no" id="block_no" class="form-control" placeholder="Block/House №">
									</div>	
									<div class="form-group">
										<input type="text" name="apartment_no" id="apartment_no" class="form-control" placeholder="Apartment Number/House №">
									</div>	
									<div class="form-group">
										<input type="text" name="door_code" id="door_code" class="form-control" placeholder="Door Code">
									</div>
									<div class="form-group">
										<textarea name="additional_info" id="additional_info" class="form-control input-lg" placeholder="Additional Information"></textarea>
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
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" class="form-control btn btn-register">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	$(document).ready(function(){
		$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

	});
</script>
</html>