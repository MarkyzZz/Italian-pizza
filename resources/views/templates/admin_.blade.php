<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Authentic Italian Pizza" />
    <meta name="author" content="Marin Cunup" />
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="shortcut icon" href={{ asset("favicon.png") }} />
    <title>Italian Pizza</title>
    <link href="{{ asset('/css/vendor.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/admin.css')}}">
    <script src="{{ asset('/js/vendor.min.js') }}"></script>
</head>
<body>
    <body>
        <div id="throbber" style="display:none; min-height:120px;"></div>
        <div id="noty-holder"></div>

        <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars" aria-hidden="true" style="color: white;"></i>
                </button>
                <div class="navbar-brand">   
                </div>
            </div>  

            <div class="items">
              <ul class="nav navbar-right top-nav">        
                <li class="editpro">
                  
                  <h5 class="pull-left login-person-head" style="margin-right:60px;">Welcome, {{Auth::user()->full_name}}</h5> 
              </li>
          </ul>
      </div>

      <div class="collapse navbar-collapse navbar-ex1-collapse" style="background-color: #616060; border:1px solid #616060;">
        <ul class="nav navbar-nav side-nav">
          <a href="/"><img class="logostyle" src="{{asset('/img/logo.png')}}" alt="LOGO"></a>
          <li>
            <a class="active" href="/profile" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-user-o" aria-hidden="true"></i>   <span style="color:white;">  Profile </span></a>
        </li>
        @if(Auth::user()->isAdmin())
        <li>
            <a class="" href="/profile/users" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-users" aria-hidden="true"></i>   <span style="color:white;"> Users </span></a>
        </li>
        <li>
            <a class="#" href="/profile/products" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-envelope" aria-hidden="true"></i>  <span style="color:white;"> Products </span></a>
        </li>
        <li>
            <a class="#" href="/profile/orders" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-first-order" aria-hidden="true"></i>  <span style="color:white;"> Orders </span></a>
        </li>

        @elseif(Auth::user()->isOperator())
        <li>
            <a class="#" href="/profile/orders" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-first-order" aria-hidden="true"></i>  <span style="color:white;"> Orders </span></a>
        </li>
        @endif
        <li>
            <a class="#" href="{{url('logout')}}" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-sign-out" aria-hidden="true"></i>  <span style="color:white;"> Log Out </span></a>
        </li>
    </ul>
</div>
</nav>

@yield('content')

</div>
</body>
<script type="text/javascript">

</script>
</body>
</html>
