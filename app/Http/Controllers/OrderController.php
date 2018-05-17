<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Order;
use App\Transaction;
use Cart;

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
        $user->block_number = Session::all()['input']['block'];
        $user->apartment_number = Session::all()['input']['apartment'];
        $user->doorcode = Session::all()['input']['doorcode'];
        $user->additional_info = Session::all()['input']['info'];
        $user->password = random_password();
        $user->save();

        $transaction = new Transaction();
        $transaction->status = 'open';
        $transaction->save();

        Cart::content()->each(function($cartItem) use ($user, $transaction){
            $order = new Order();
            $order->user_id = $user->id;
            $user->orders()->save($order);
            $transaction->orders()->save($order);
            $order->products()->attach($cartItem->id, ['quantity' => $cartItem->qty]);
        }); 

        
        
        Session::forget('input');
        Cart::destroy();
        return redirect()->route('home');
        
    }
}
