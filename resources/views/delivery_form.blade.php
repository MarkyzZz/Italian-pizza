@extends('templates.template')

@section('content')
@include('partials.subnav')
<form class="center-block col-md-8">
  <div class="form-group">
	<br>
    <input placeholder="Email" type="email" class="form-control input-lg" id="email" name="email" value="@if(Session::has('input.email')) {{Session::get('input.email')}}  @endif">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="Name Surname" type="text" class="form-control input-lg" id="name" name="name" value="@if(Session::has('input.name')) {{Session::get('input.name')}}  @endif">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="Phone" type="number" class="form-control input-lg" id="phone" name="phone" value="@if(Session::has('input.phone')) {{Session::get('input.phone')}}  @endif">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="City" type="text" class="form-control input-lg" id="city" name="city" value="@if(Session::has('input.city')) {{Session::get('input.city')}}  @endif">
    <br>
  </div>
  <div class="form-inline col-md-12">
  	<div class="form-group col-md-4">
  	  <input placeholder="Street" type="text" class="form-control input-lg" id="street" name="street" value="@if(Session::has('input.street')) {{Session::get('input.street')}}  @endif">
  	</div>
    <div class="form-group col-md-4">
      <input placeholder="Block Number/House Number" type="text" class="form-control input-lg" id="block" name="block" value="@if(Session::has('input.block')) {{Session::get('input.block')}}  @endif">
    </div>
  	<div class="form-group col-md-4">
  	  <input placeholder="Apartment number" type="text" class="form-control input-lg" id="apartment" name="apartment" value="@if(Session::has('input.apartment')) {{Session::get('input.apartment')}}  @endif">
  	</div>
  	
  </div>
  <div class="form-group">
	<br>
    <input placeholder="Door code" type="text" class="form-control input-lg" id="doorcode" name="doorcode" value="@if(Session::has('input.doorcode')) {{Session::get('input.doorcode')}}  @endif">
  </div>
  <div class="form-group">
	<br>
    <textarea placeholder="Additional information" class="form-control input-lg" id="info" name="info" value="@if(Session::has('input.info')) {{Session::get('input.info')}}  @endif"></textarea>
  </div>
   <div class="row">
    @if(Session::has('error'))
        <h2 class=" text-center yellow-text">{{Session::get('error')}}</h2>
      @endif
      <h2 class="yellow-text text-center">Payment type:</h2>
       <label class="col-md-offset-4" for="payment_cash"><input type="radio" id="payment_cash" class="radio" name="payment_type" value="cash">Cash</label>
       <label class="col-md-offset-2" for="epayment"><input type="radio" id="epayment" class="radio" name="payment_type" value="epayment">e-Payment</label>
   </div>
   <div class="epayment">
     <div class="form-group">
      <label for="card_no">Card Details:</label>
      <input placeholder="16 Digit Card Number" type="number" class="form-control input-lg" id="card_no" name="card_no">

       </div>
       <br>
       <div class="row">
      <div class="form-group col-md-4">
          <input placeholder="Expiry Month" type="number" class="form-control input-lg" id="ccExpiryMonth" name="ccExpiryMonth">
      </div>
      <div class="form-group col-md-4">
          <input placeholder="Expiry Year" type="number" class="form-control input-lg" id="ccExpiryYear" name="ccExpiryYear">
      </div>
      <div class="form-group col-md-4">
          <input placeholder="CVC/CVV" type="number" class="form-control input-lg" id="cardCVV" name="cardCVV">
      </div>
       </div>
       <br>
       <div class="form-group">
      <input placeholder="Firstname Lastname" type="text" class="form-control input-lg" id="card_owner" name="card_owner">
       </div>
   </div>
  <button type="submit" id="submit" class="btn btn-default center-block">Submit</button>

  
</form>

<script>
  $(document).ready(function(){
    $('.epayment').hide();
    $('input[name="payment_type"]').on('change', function(){
        $('input[name="payment_type"]:checked').val() == 'epayment' && 
         $('.epayment').show() || $('.epayment').hide();
    });
    $('#email,#name,#phone,#city,#street,#block,#apartment,#doorcode,#info,    .radio').on('focus',function(){
        if ($(this).hasClass('radio')) $('.radio').removeClass('error').next().remove() && $('#submit').prev('p').remove();
        $(this).removeClass('error').next().remove();
    });
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
                            block: $('#block').val(),
                            apartment: $('#apartment').val(),
                            doorcode: $('#doorcode').val(),
                            info: $('#info').val(),
                            payment_type: $('input[name="payment_type"]:checked').val(),
                            card_no: $('#card_no').val(),
                            ccExpiryMonth: $('#ccExpiryMonth').val(),
                            ccExpiryYear: $('#ccExpiryYear').val(),
                            cardCVV: $('#cardCVV').val(),
                            card_owner: $('#card_owner').val()
                          },
                          success: function(data){
                                jQuery.each(data.errors, function(key, value){
                                    $('#' + key).addClass('error').after("<p>" + value + "</p>");
                                    console.log(key + ": " + value);
                                  if (key == 'payment_type') $('.radio').addClass('error') && $('#submit').before("<p class='text-center'>" + value + "</p>");
                                });
                            if('success' in data) window.location = '/order/create';
                            } 
                });
              });
  });

</script>
@endsection