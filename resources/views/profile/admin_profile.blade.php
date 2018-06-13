@extends('templates.admin_')
@section('content')
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-md-12 dashhead">
            <h1> Benvenuti Amici {{Auth::user()->full_name}}</h1>
        </div>
    </div>
</div>

@endsection
