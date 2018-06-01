@extends('templates.template')
@section('content')
	<div class="row">
      @foreach($products as $product)
        <form method="POST" action="/cart/{{$product->id}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="col-md-3">
            <div class="thumbnail">
              <img src="{{$product->image_path}}" alt="{{$product->name}}">
              <div class="caption">
                <p class="yellow-text">{{$product->name}}</p>
                <p class="price col-md-4">{{$product->price}} <span class="small">MDL</span></p>
                <div class="control col-md-8">
                  <input type="hidden" name="amount" value="1">
                  <i class="fa fa-minus-square-o yellow-text icon-medium" aria-hidden="true"></i><span class="amount" data-id="{{$product->id}}">1</span>
                  <i class="fa fa-plus-square-o yellow-text icon-medium" aria-hidden="true"></i>
                </div>
                <button type="submit" class="col-md-9 add-to-cart col-xs-3 center-block btn btn-default">add to cart</button>
              </div>
          </div>
        </form>
      </div>
      @endforeach
	</div>
  <script>
    $(document).ready(function(){
      $('i.fa-plus-square-o').on('click', function(){
        var amount = $(this).prev('.amount').text();
        if(amount < 100)
          $(this).prev('.amount').text(++amount) && $(this).parent().find('input[name="amount"]').attr('value',amount);
      });
      $('i.fa-minus-square-o').on('click', function(){
        var amount = $(this).next('.amount').text();
        if(amount > 1)
          $(this).next('.amount').text(--amount) && $(this).prev('input[name="amount"]').attr('value',amount);
      });
    });
  </script>
@endsection