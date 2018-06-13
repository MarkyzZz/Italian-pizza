<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\User;
use Cart;

class UsersController extends Controller
{
    public function create()
    {
    	return (Cart::count())? view('delivery_form') : back();
    }

    public function store(UsersRequest $request)
    {
    	if(isset($request->validator) && $request->validator->fails()){
            return response()->json(['errors' => $request->validator->messages()]);
        }
            if(!Auth::check()){
                Session::put('input', [
                    'email' => Input::get('email'),
                    'name' => Input::get('name'),
                    'phone' => Input::get('phone'),
                    'city' => Input::get('city'),
                    'street' => Input::get('street'),
                    'block' => Input::get('block'),
                    'apartment' => Input::get('apartment'),
                    'doorcode' => Input::get('doorcode'),
                    'info' => Input::get('info'),
                ]);
            }
            Session::put([
                'input.payment_type' => Input::get('payment_type'),
                'input.card_no' => Input::get('card_no'),
                'input.ccExpiryMonth' => Input::get('ccExpiryMonth'),
                'input.ccExpiryYear' => Input::get('ccExpiryYear'),
                'input.cvvNumber' => Input::get('cardCVV'),
                'input.card_owner' => Input::get('card_owner')
            ]);
            return response()->json([
                'success' => "Your user has been created!",
                'request' => Session::get('input')    
            ]);

    }
}
