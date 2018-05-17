<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\User;

class OrderController extends Controller
{
    public function create()
    {
    	if(!Session::has('input')) return redirect()->back();
    	
    	return view('summary');
    }

    public function store()
    {
    	$user = new User();
        $user->email = Session::all()['input']['email'];
        $user->full_name = Session::all()['input']['name'];
        $user->phone = Session::all()['input']['phone'];
        $user->city = Session::all()['input']['city'];
        $user->street = Session::all()['input']['street'];
    }
}
