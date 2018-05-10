@extends('templates.template')
@section('content')
@include('partials.subnav')
@if(count($cart))
<form method="POST" action="/cart/update">
	{{csrf_field()}}
	@foreach($cart as $item)
	<div class="row orders">
		<img src="{{$item->options->image}}" alt="{{$item->name}}">
		<div class="header">
			<h1 class="yellow-text col-md-offset-1">{{$item->name}}</h1>
			<h2 class="yellow-text col-md-offset-6">Total:</h2>
			<div class="prices">
				<h1 class="col-md-offset-1">{{$item->price}} MDL</h1>
				<div class="controls col-md-offset-2">
					<input type="hidden" class="input_amount" name="amount[{{$item->id}}]" value="{{$item->qty}}">
					<i class="fa fa-minus-square-o yellow-text icon-medium" aria-hidden="true"></i><span class="amount">{{$item->qty}}</span>
					<i class="fa fa-plus-square-o yellow-text icon-medium" aria-hidden="true"></i>
				</div>
				<h2 class="col-md-offset-2 subtotal">{{$item->subtotal()}} MDL</h2>
				<a href="/cart/delete/{{$item->id}}"><i class="fa fa-times-circle-o yellow-text icon-medium col-md-offset-1" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
	@endforeach
	<div class="row">
			<h2 id="total" class="yellow-text pull-left col-md-offset-9">Total: {{Cart::total()}} MDL
			</h2>
			<a class="pull-right" href="/cart/destroy"><i class="fa fa-times-circle-o icon-medium" aria-hidden="true"></i></a>
	</div>
	<div class="row">
	      <button id="submit" type="submit" class="center-block btn btn-default">submit</button>
	    </div>
</form>
@else 
<h2 class="col-md-offset-5">Cart is empty.</h2>
@endif
  <script>
    $(document).ready(function(){
      $('i.fa-plus-square-o').on('click', function(){
        var amount = $(this).prev('.amount').text();
        if(amount < 100)
          $(this).prev('.amount').text(++amount) && $(this).parent().find('.input_amount').attr('value',amount);
      });
      $('i.fa-minus-square-o').on('click', function(){
        var amount = $(this).next('.amount').text();
        if(amount > 1)
          $(this).next('.amount').text(--amount) && $(this).prev('.input_amount').attr('value',amount);
      });
      $('.amount').on('DOMSubtreeModified', function(){
	      	var price = $(this).parent().prev('h1').text().slice(0,-4);
	      	var amount = $(this).text();
	      	var total = amount * price;
	      	$(this).parent().next('h2').text(total.toFixed(2) + ' MDL');
	      	var sum = 0;
				$('.subtotal').each(function(){
					sum += parseFloat($(this).text().slice(0,-4));
				});
			$('#total').text('Total: ' + sum.toFixed(2) + ' MDL');
      });
    });
  </script>
@endsection