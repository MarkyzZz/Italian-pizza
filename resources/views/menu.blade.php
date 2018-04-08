@extends('templates.template')

@section('content')
	<div class="row">
		<div class="col-md-3">
      <div class="thumbnail">
          <img src="{{asset('/img/menu/al-pollo.png')}}" alt="al_pollo">
          <div class="caption">
            <p class="yellow-text">Al polo</p>
            <p class="price col-md-4">84 <span class="small">MDL</span></p>
            <div class="control col-md-8">
            	<i class="fa fa-minus-square-o yellow-text icon-medium" aria-hidden="true"></i><span class="amount">1</span>
            	<i class="fa fa-plus-square-o yellow-text icon-medium" aria-hidden="true"></i>
            </div>
            <button type="button" class="col-md-9 add-to-cart col-xs-3 center-block btn btn-default">add to cart</button>
          </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="thumbnail">
          <img src="{{asset('/img/menu/al-pollo.png')}}" alt="al_pollo">
          <div class="caption">
            <p class="yellow-text">Al polo</p>
            <p class="price col-md-4">84 <span class="small">MDL</span></p>
            <div class="control col-md-8">
            	<i class="fa fa-minus-square-o yellow-text icon-medium" aria-hidden="true"></i><span class="amount">1</span>
            	<i class="fa fa-plus-square-o yellow-text icon-medium" aria-hidden="true"></i>
            </div>
            <button type="button" class="col-md-9 add-to-cart col-xs-3 center-block btn btn-default">add to cart</button>
          </div>
      </div>
    </div>

	</div>
@endsection