@extends('templates.template')
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('css/menu.css')}}">
@endsection
@section('content')
	<div class="row">
      @foreach($products as $product)
        <form action="/cart/{{$product->id}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="col-md-4">
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
          </div>
        </form>
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

      $('button[type="submit"]').click(function(e){
               e.preventDefault();
               var alert = '\
                <div style="position:fixed;z-index:1" class="alert alert-success alert-dismissible">\
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\
                <strong><i style="padding-right:30px" class="fa fa-check-circle-o" aria-hidden="true"></i>Success!</strong> Product added to cart!.\
              </div>';
               jQuery.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                               });

              jQuery.ajax({
                                  url: "/cart/" + 
                                  $(this).prev('div.control').find('.amount').data('id'),
                                  method: 'post',
                                  data: {
                                    amount: $(this).prev('div.control').find('input[name="amount"]').val()
                                  },
                                  success: function(data) {
                                    $('body').prepend(alert) && $('.alert').css({
                                    "width": "100%",
                                    "text-align": "center"
                                  }).delay(4000).fadeOut('slow', function(){
                                    $(this).remove();
                                  }) && $(".badge").text(data.cart_counter)
                                  }
                        });

             });
       
    });
      
  </script>
@endsection