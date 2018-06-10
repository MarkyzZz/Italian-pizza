<div class="form-group">
	<br>
    <input placeholder="Email" type="email" class="form-control input-lg" id="email" name="email" value="{{ old('email') }}">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="Name Surname" type="text" class="form-control input-lg" id="name" name="full_name" value="{{ old('full_name') }}">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="Phone" type="number" class="form-control input-lg" id="phone" name="phone" value="{{ old('phone') }}">
  </div>
  <div class="form-group">
	<br>
    <input placeholder="City" type="text" class="form-control input-lg" id="city" name="city" value="{{ old('city') }}">
    <br>
  </div>
  	<div class="form-group">
  	  <input placeholder="Street" type="text" class="form-control input-lg" id="street" name="street" value="{{ old('street') }}">
      <br>
  	</div>
    <div class="form-group row">
      <div class="col-xs-5">
        <input placeholder="Block Number/House Number" type="text" class="form-control input-lg" id="block" name="block_no" value="{{ old('block_no') }}">
      </div>
      <div class="col-xs-4">
        <input placeholder="Apartment number" type="text" class="form-control input-lg" id="apartment" name="apartment" value="{{ old('apartment') }}">
      </div>
      <div class="col-xs-3">
        <input placeholder="Door code" type="text" class="form-control input-lg" id="doorcode" name="doorcode" value="{{ old('doorcode') }}">
      </div>
    </div>  
  <div class="form-group">
	<br>
    <textarea placeholder="Additional information" class="form-control input-lg" id="info" name="info" value="{{ old('info') }}"></textarea>
  </div>