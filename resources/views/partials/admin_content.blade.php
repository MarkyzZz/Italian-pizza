@extends('templates.admin_')
@section('content')
@if(Auth::user()->isAdmin())
<li>
	<a class="#" href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-calendar" aria-hidden="true"></i>   <span style="color:white;"> Users </span></a>
</li>
<li>
	<a class="#" href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-envelope" aria-hidden="true"></i>  <span style="color:white;"> Products </span></a>
</li>
<li>
	<a class="#" href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-envelope" aria-hidden="true"></i>  <span style="color:white;"> Orders </span></a>
</li>

@elseif(Auth::user()->isOperator())
<li>
	<a class="#" href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-envelope" aria-hidden="true"></i>  <span style="color:white;"> Orders </span></a>
</li>
@endif

@endsection
