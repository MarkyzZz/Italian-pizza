<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Input;
use App\User;

class UsersController extends Controller
{
    public function create()
    {
    	return view('delivery_form');
    }

    public function store(UsersRequest $request)
    {
    	if(isset($request->validator) && $request->validator->fails()){
            return response()->json(['errors' => $request->validator->messages()]);
        }
        $user = new User();
        $user->email = Input::get('email');
        $user->full_name = Input::get('name');
        $user->phone = Input::get('phone');
        $user->city = Input::get('city');
        $user->street = Input::get('street');
        $user->block_number = Input::get('block');
        $user->apartment_number = Input::get('apartment');
        $user->doorcode = Input::get('doorcode');
        $user->additional_info = Input::get('info');
        // To-do 
        // Implement to generate a random password and send it via email
        $gen_password = substr(str_shuffle(strtolower(sha1(rand() . time() . "my salt string"))),0, 6);
        $user->password = bcrypt($gen_password);
        $user->save();

        return response()->json(['success' => "Your user has been created!"]);

    }
}
