<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\User;
use App\Role;

class AuthentificationController extends Controller
{
    public function authPage()
    {
    	return view('auth.auth');
    }

    public function login(LoginRequest $request)
    {
    	if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return redirect()->intended()->with(['success' => "You have successfully logged in!"]);
        }
        return redirect()->back()->withErrors('The provided credentials do not match our records. Try again!');
    }

    public function logout()
    {
        if (Auth::user()) Auth::logout();

    	return redirect()->route('home');
    }

    public function register(RegistrationRequest $request)
    {

    	$user = new User([
            'email' =>    $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'full_name' => $request->get('full_name'),
            'phone' => $request->get('phone'),
            'city' => $request->get('city'),
            'street' => $request->get('street'),
            'block_number' => $request->get('block_no'),
            'apartment_number' => $request->get('apartment_no'),
            'doorcode' => $request->get('door_code'),
            'additional_info' => $request->get('additional_info'),
            'role_id' => Role::where('name', 'User')->pluck('id')->first()       
        ]);

        $user->save();

        Auth::login($user);

        return redirect()->route('home')->with(['success' => "User have been created successfully!"]);

    }
}
