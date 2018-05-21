<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\User;
use App\Order;
use App\Transaction;
use Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

class OrderController extends Controller
{
    public function create()
    {
    	if(!Session::has('input')) return redirect()->back();
        if(Session::get('input')['payment_type'] == 'cash'){
            Session::forget('input.card_no');
            Session::forget('input.ccExpiryMonth');
            Session::forget('input.ccExpiryYear');
            Session::forget('input.cardCVV');
            Session::forget('input.card_owner');
        }
    	return view('summary');
    }

    public function store()
    {
        // Create a new user (parent)
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

        // Create a new transaction
        $transaction = new Transaction();
        $transaction->status = 'open';
        

        // Check if payment is cash or e-payment
        // If payment is cash just save it to Database
        // If payment is e-cash make a request to Stripe API
        
        if (Session::get('input')['payment_type'] == 'epayment') {
        $stripe = Stripe::make(env('STRIPE_SECRET'));

            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number'    => Session::get('input.card_no'),
                        'exp_month' => intval(Session::get('input.ccExpiryMonth')),
                        'exp_year'  => Session::get('input.ccExpiryYear'),
                        'cvc'       => Session::get('input.cvvNumber'),
                        'name'      => Session::get('input.card_owner')
                    ],
                ]);
                
                if (!isset($token['id'])) {
                    \Session::put('error','The Stripe Token was not generated correctly');
                    return redirect()->route('delivery_form');
                }
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'MDL',
                    'amount'   => Cart::total(),
                    'description' => 'Add in wallet',
                    'customer' => $user->id
                ]);
            } catch (Exception $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->route('delivery_form');
            } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->route('delivery_form');
            } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->route('delivery_form');
            }  
                
        }
        if((isset($charge['status']) &&  $charge['status'] == 'succeeded') || Session::get('input.payment_type') == 'cash') {
                $user->save();
                $transaction->payment_token = isset($charge['id'])? $charge['id'] : null;
                $transaction->save();
                Cart::content()->each(function($cartItem) use ($user, $transaction){
                $order = new Order();
                $order->user_id = $user->id;
                $order->transaction_id = $transaction->id;
                $order->save();
                $order->products()->attach($cartItem->id, ['quantity' => $cartItem->qty]);
                
            }); 
        } 

        Session::forget(['input','error']);
        Cart::destroy();
        return View::make('success', ['transaction_id' => $transaction->id]);   
    }
}
