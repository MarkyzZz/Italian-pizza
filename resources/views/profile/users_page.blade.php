@extends('templates.admin_')
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success text-center alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<h3><strong>Success!</strong> {{Session::get('success')}}</h3>
	</div>
@endif

<h1 class="col-sm-offset-1">Users</h1>
<div class="row">
		<a href="/profile/users/create" class="btn create-button btn-default col-sm-offset-1"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i>&nbsp; Create new user</a>
	<table>
		<tr>
			<td></td>
			<td><strong>ID</strong></td>
			<td><strong>Name</strong></td>
			<td><strong>E-mail</strong></td>
			<td><strong>Phone</strong></td>
			<td><strong>City</strong></td>
			<td><strong>Street</strong></td>
			<td><strong>Role</strong></td>
		</tr>
		@foreach($users as $user)
			<tr>
				<td>
					<a href="/profile/user/{{$user->id}}" class="btn btn-default">Edit</a>
				</td>
				<td>{{$user->id}}</td>
				<td>{{$user->full_name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->phone}}</td>
				<td>{{$user->city}}</td>
				<td>{{$user->street}}</td>
				<td>{{$user->toStringRole() }}</td>
				<td>
					<form method="POST" action="/profile/user/{{$user->id}}/delete">
							{{csrf_field()}}
						<a href="#" class="close user"><i class="fa fa-window-close-o" aria-hidden="true"></i></a></form>
				</td>
			</tr>
		@endforeach
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('.user').on('click', function(){
			if(confirm("Are you sure you want to delete that user?"))
				$(this).parent().submit();
		});
	});
</script>
@endsection