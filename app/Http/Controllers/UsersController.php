<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\User;
use Cart;

class UsersController extends Controller
{
    public function create()
    {
    	return (Cart::count())? view('delivery_form') : redirect()->back();
    }

    public function store(UsersRequest $request)
    {
    	if(isset($request->validator) && $request->validator->fails()){
            return response()->json(['errors' => $request->validator->messages()]);
        }
        Session::put('input',$request->all());
        return response()->json(['success' => "Your user has been created!",
                                'request' => Input::all()
    ]);

    }
}
