@extends('templates.template')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{asset('css/contacts.css')}}">
@endsection
	@section('content')
		@include('partials.contact_form')
	@endsection


