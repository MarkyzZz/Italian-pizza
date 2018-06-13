<div class="row">
	<img class="center-block divider img-responsive" src="{{asset('/img/divider.png')}}">
	<h1 class="text-centered big">Cart</h1>
</div>
<nav class="navbar">
    <ul class="nav navbar-nav center-block">
      <li class="small"><a href="{{url('/cart')}}">Order</a></li>
      <li class="small"><a href="{{url('/user/create')}}">Delivery</a></li>
      <li class="small"><a href="{{url('/order/create')}}">Confirmation</a></li>
    </ul>
</nav>

<script>
	$(document).ready(function () {
		var url = location.pathname;
		$('a[href*="' + url + '"]:nth-child(1)').css('color','#FFC401');
	});
</script>