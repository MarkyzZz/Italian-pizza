@extends('templates.template')

@section('content')
@include('partials.subnav')
<form class="center-block col-md-8">
  <div class="form-group">
	<br>
    <input placeholder="Email" type="email" class="form-control input-lg" id="email" name="email">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="Name Surname" type="text" class="form-control input-lg" id="name" name="name">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="Phone" type="number" class="form-control input-lg" id="phone" name="phone">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="City" type="text" class="form-control input-lg" id="city" name="city">
    <br>
  </div>
  <div class="form-inline col-md-12">
  	<div class="form-group col-md-4">
  	  <input placeholder="Street" type="text" class="form-control input-lg" id="street" name="street">
  	</div>
    <div class="form-group col-md-4">
      <input placeholder="Block Number/House Number" type="text" class="form-control input-lg" id="block" name="block">
    </div>
  	<div class="form-group col-md-4">
  	  <input placeholder="Apartment number" type="text" class="form-control input-lg" id="apartment" name="apartment">
  	</div>
  	
  </div>
  <div class="form-group">
	<br>
    <input placeholder="Door code" type="text" class="form-control input-lg" id="doorcode" name="doorcode">
  </div>
  <div class="form-group">
	<br>
    <textarea placeholder="Additional information" class="form-control input-lg" id="info" name="info"></textarea>
  </div>
  <button type="submit" id="submit" class="btn btn-default center-block">Submit</button>
</form>

<script>
  $(document).ready(function(){
    jQuery('#submit').click(function(e){
               $('input').removeClass('error').next('p').remove();
               e.preventDefault();
               jQuery.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });
                jQuery.ajax({
                          url: "{{ url('user/store') }}",
                          method: 'post',
                          data: {
                            email: $('#email').val(),
                            name: $('#name').val(),
                            phone: $('#phone').val(),
                            city: $('#city').val(),
                            street: $('#street').val(),
                            block: $('#block').val()
                          },
                          success: function(data){
                                jQuery.each(data.errors, function(key, value){
                                    $('#' + key).addClass('error').after("<p>" + value + "</p>");
                                });
                            if('success' in data) window.location = '/order/create';
                            } 
                });
              });
  });

</script>
@endsection