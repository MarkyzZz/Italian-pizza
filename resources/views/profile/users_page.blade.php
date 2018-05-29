@extends('templates.admin_')
@section('content')

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
					<a href="/profile/user/{{$user->id}}/edit" class="btn btn-default">Edit</a>
				</td>
				<td>{{$user->id}}</td>
				<td>{{$user->full_name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->phone}}</td>
				<td>{{$user->city}}</td>
				<td>{{$user->street}}</td>
				<td>{{$user->toStringRole() }}</td>
				<td></td>
			</tr>
		@endforeach
	</table>
</div>
@endsection