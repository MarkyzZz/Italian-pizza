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