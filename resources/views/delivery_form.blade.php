@extends('templates.template')

@section('content')
@include('partials.subnav')
<form action="" class="center-block col-md-8">
  <div class="form-group">
	<br>
    <input placeholder="Email" type="email" class="form-control input-lg" id="email">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="Name Surname" type="text" class="form-control input-lg" id="Name">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="Phone" type="number" class="form-control input-lg" id="phone">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="City" type="text" class="form-control input-lg" id="city">
    <br>
  </div>
  <div class="form-inline col-md-12">
  	<div class="form-group col-md-4">
  	  <input placeholder="Street" type="text" class="form-control input-lg" id="street">
  	</div>
  	<div class="form-group col-md-4">
  	  <input placeholder="Apartment number" type="text" class="form-control input-lg" id="apartment">
  	</div>
  	<div class="form-group col-md-4">
  	  <input placeholder="Block Number" type="text" class="form-control input-lg" id="block">
  	</div>
  </div>
  <div class="form-group">
	<br>
    <input placeholder="Door code" type="text" class="form-control input-lg" id="door-code">
  </div>
  <div class="form-group">
	<br>
    <textarea placeholder="Additional information" class="form-control input-lg" id="info"></textarea>
  </div>
  <button type="submit" class="btn btn-default center-block">Submit</button>
</form>
@endsection